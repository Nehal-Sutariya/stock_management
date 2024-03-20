@extends('layout')

@section('title', 'Home')

@section('content')
<div class="row">
    <div class="col-4">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Investment</p>
                            <h5 class="font-weight-bolder mb-0 text-success">
                                {{ $totalAll }}
                                <!-- <span class="text-success text-sm font-weight-bolder">+55%</span> -->
                            </h5>
                        </div>
                    </div>
                    <div class="col-4 text-end">
                        <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                            <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-capitalize font-weight-bold">Today Investment</p>
                            <h5 class="font-weight-bolder mb-0">
                                {{ $totalToday }}
                                <!-- <span class="text-success text-sm font-weight-bolder">+3%</span> -->
                            </h5>
                        </div>
                    </div>
                    <div class="col-4 text-end">
                        <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                            <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            <div class="numbers">
                                <!-- Button trigger modal -->
                                New stock create
                                <p class="text-sm mb-0 text-capitalize font-weight-bold">Create</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-4 text-end">
                        <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                            <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-4">
    <div class="col-lg-12 mb-lg-0 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-lg-12" style="height:700px;">
                        <div class="d-flex flex-column h-100">
                            <p class="mb-1 pt-2 text-bold">Built by developers</p>
                            <!-- TradingView Widget BEGIN -->
                            <div class="tradingview-widget-container" style="height:100%;width:100%">
                                <div class="tradingview-widget-container__widget" style="height:calc(100% - 32px);width:100%"></div>
                                <div class="tradingview-widget-copyright"><a href="https://in.tradingview.com/" rel="noopener nofollow" target="_blank"><span class="blue-text">Track all markets on TradingView</span></a></div>
                                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-advanced-chart.js" async>
                                    {
                                    "autosize": true,
                                    "symbol": "NASDAQ:AAPL",
                                    "interval": "D",
                                    "timezone": "Etc/UTC",
                                    "theme": "light",
                                    "style": "1",
                                    "locale": "in",
                                    "enable_publishing": false,
                                    "withdateranges": true,
                                    "hide_side_toolbar": false,
                                    "allow_symbol_change": true,
                                    "details": true,
                                    "hotlist": true,
                                    "calendar": true,
                                    "support_host": "https://www.tradingview.com"
                                    }
                                </script>
                            </div>
                            <!-- TradingView Widget END -->
                            <a class="text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="javascript:;">
                            Read More
                            <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection