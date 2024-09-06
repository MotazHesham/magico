<div class="card">
    <div class="card-header">
        {{ $title }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Order">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.order.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.order.fields.name') }}
                    </th>
                    <th>
                        {{ trans('cruds.order.fields.phone_number') }}
                    </th>
                    <th>
                        {{ trans('cruds.order.fields.phone_number_2') }}
                    </th>
                    <th>
                        {{ trans('cruds.order.fields.shipping_address') }}
                    </th>
                    <th>
                        {{ trans('cruds.order.fields.total_cost') }}
                    </th>
                    <th>
                        {{ trans('cruds.order.fields.operating_status') }}
                    </th>
                    <th>
                        {{ trans('cruds.order.fields.shift') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
            </thead>
        </table>
    </div>
</div> 
