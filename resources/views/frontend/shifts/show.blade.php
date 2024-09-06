@extends('layouts.frontend')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.shift.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.shifts.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shift.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $shift->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shift.fields.user') }}
                                    </th>
                                    <td>
                                        {{ $shift->user->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.shift.fields.operating_status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Shift::OPERATING_STATUS_SELECT[$shift->operating_status] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.order.title') }}
                                    </th>
                                    <td>
                                        {{ count($shift->shiftOrders)  }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.messageGeneration.title') }}
                                    </th>
                                    <td>
                                        {{ count($shift->shiftMessageGenerations)  }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Tokens
                                    </th>
                                    <td>
                                        {{ $shift->shiftMessageGenerations->sum('tokens')   }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.shifts.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ trans('global.relatedData') }}
                </div>
                <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#shift_orders" role="tab" data-toggle="tab">
                            {{ trans('cruds.order.title') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#shift_message_generations" role="tab" data-toggle="tab">
                            {{ trans('cruds.messageGeneration.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="shift_orders">
                        @includeIf('frontend.shifts.relationships.shiftOrders', [
                            'orders' => $shift->shiftOrders,
                        ])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="shift_message_generations">
                        @includeIf('frontend.shifts.relationships.shiftMessageGenerations', ['messageGenerations' => $shift->shiftMessageGenerations])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
