@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Dashboard
                </div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="{{ $settings1['column_class'] }}">
                            <div class="card text-white bg-info">
                                <div class="card-body pb-0">
                                    <div class="text-value">{{ number_format($settings1['total_number']) }}</div>
                                    <div>{{ $settings1['chart_title'] }}</div>
                                    <br />
                                </div>
                            </div>
                        </div>
                        <div class="{{ $settings2['column_class'] }}">
                            <div class="card text-white bg-success">
                                <div class="card-body pb-0">
                                    <div class="text-value">{{ number_format($settings2['total_number']) }}</div>
                                    <div>{{ $settings2['chart_title'] }}</div>
                                    <br />
                                </div>
                            </div>
                        </div>
                        @php
                            global $used_tokens,$remaining_tokens;
                            $used_tokens = 0;
                            $remaining_tokens = 0;
                            App\Models\Tenant::all()->runForEach(function () {
                                $GLOBALS['used_tokens'] += \App\Models\MessageGeneration::sum('tokens');
                                $GLOBALS['remaining_tokens'] += tenant('tokens');
                            });
                        @endphp
                        <div class="col-md-3">
                            <div class="card text-white bg-warning">
                                <div class="card-body pb-0">
                                    <div class="text-value">
                                        {{ number_format($GLOBALS['used_tokens']) }} 
                                    </div>
                                    <div>Used Tokens</div>
                                    <br />
                                </div>
                            </div>
                        </div> 
                        <div class="col-md-3">
                            <div class="card text-white bg-danger">
                                <div class="card-body pb-0">
                                    <div class="text-value"> 
                                        {{ number_format($GLOBALS['remaining_tokens']) }}
                                    </div>
                                    <div>Remaining Tokens</div>
                                    <br />
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
@endsection