<script>
    $(function() {
        let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
        @can($permission_name)
            let deleteButtonTrans = 'تحويل الطلبات'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('frontend.orders.massUpdateStages') }}",
                className: 'btn-warning',
                action: function(e, dt, node, config) {
                    var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
                        return entry.id
                    });
                    
                    if (ids.length === 0) {
                        alert('{{ trans('global.datatables.zero_selected') }}')

                        return
                    }

                    if (confirm('{{ trans('global.areYouSure') }}')) {
                        $.ajax({
                                headers: {
                                    'x-csrf-token': _token
                                },
                                method: 'POST',
                                url: config.url,
                                data: {
                                    ids: ids, 
                                    stage: '{{$stage}}'
                                }
                            })
                            .done(function() {
                                location.reload()
                            })
                    }
                }
            }
            dtButtons.push(deleteButton)
        @endcan
        let dtOverrideGlobals = {
            buttons: dtButtons,
            processing: true,
            serverSide: true,
            retrieve: true,
            aaSorting: [],
            ajax: "{{ $route }}",
            columns: [{
                    data: 'placeholder',
                    name: 'placeholder'
                },
                {
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'phone_number',
                    name: 'phone_number'
                },
                {
                    data: 'phone_number_2',
                    name: 'phone_number_2'
                },
                {
                    data: 'shipping_address',
                    name: 'shipping_address'
                },
                {
                    data: 'total_cost',
                    name: 'total_cost'
                },
                {
                    data: 'operating_status',
                    name: 'operating_status'
                },
                {
                    data: 'shift_id',
                    name: 'shift.id'
                },
                {
                    data: 'actions',
                    name: '{{ trans('global.actions') }}'
                }
            ],
            orderCellsTop: true,
            order: [
                [1, 'desc']
            ],
            pageLength: 25,
        };
        let table = $('.datatable-Order').DataTable(dtOverrideGlobals);
        $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust();
        });

    });
</script>
