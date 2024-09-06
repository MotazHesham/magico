<div class="card">
    <div class="card-header">
        {{ trans('cruds.messageGeneration.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-shiftMessageGenerations">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.messageGeneration.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.messageGeneration.fields.full_message') }}
                        </th> 
                        <th>
                            {{ trans('cruds.messageGeneration.fields.tokens') }}
                        </th> 
                        <th>
                            {{ trans('cruds.messageGeneration.fields.order') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($messageGenerations as $key => $messageGeneration)
                        <tr data-entry-id="{{ $messageGeneration->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $messageGeneration->id ?? '' }}
                            </td>
                            <td>
                                {{ $messageGeneration->full_message ?? '' }}
                            </td> 
                            <td>
                                {{ $messageGeneration->tokens ?? '' }}
                            </td> 
                            <td> 
                                {{ $messageGeneration->order->id ?? '' }}
                            </td>
                            <td>
                                @can('message_generation_show')
                                    <a class="btn btn-xs btn-primary"
                                        href="{{ route('frontend.message-generations.show', $messageGeneration->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan 

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@section('scripts')
    @parent
    <script>
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons) 

            $.extend(true, $.fn.dataTable.defaults, {
                orderCellsTop: true,
                order: [
                    [1, 'desc']
                ],
                pageLength: 25,
            });
            let table = $('.datatable-shiftMessageGenerations:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })
    </script>
@endsection
