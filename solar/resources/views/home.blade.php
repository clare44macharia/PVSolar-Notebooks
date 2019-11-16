@extends('layouts.admin')


@section('content')


    <div class="main-panel">
@include('layouts.header')
        <!-- End Navbar -->
        <!-- <div class="panel-header panel-header-lg">

    <canvas id="bigDashboardChart"></canvas>


  </div> -->
        <div class="content">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5 col-md-4">
                                    <div class="icon-big text-center icon-warning">
                                        <i class="nc-icon nc-globe text-warning"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-md-8">
                                    <div class="numbers">
                                        <p class="card-category"> Average Production</p>
                                            {{ $showAvgs}}
{{--                                        <p class="card-title" id = "mean_production">2000kW--}}
                                        <p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <hr>
                            <div class="stats">
                                <i class="fa fa-refresh"></i> Entries
                                {{ $showCounts}}

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5 col-md-4">
                                    <div class="icon-big text-center icon-warning">
                                        <i class="nc-icon nc-money-coins text-success"></i>
                                    </div>
                                </div>

                                <div class="col-7 col-md-8">
                                    <div class="numbers">
                                        <p class="card-category">Highest Production</p>
                                            {{ $showMax}}

{{--                                        <p class="card-title">$ 15--}}
                                        <p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <hr>
                            <div class="stats">
                                <i class="fa fa-calendar-o"></i>

                             </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5 col-md-4">
                                    <div class="icon-big text-center icon-warning">
                                        <i class="nc-icon nc-vector text-danger"></i>
                                    </div>
                                </div>
                                <div class="col-7 col-md-8">
                                    <div class="numbers">
                                        <p class="card-category">Least Production</p>
                                                  {{ $showMin}}

                                        <p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <hr>
                            <div class="stats">
                                <i class="fa fa-clock-o"></i> Entries

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5 col-md-4">
                                    <div class="icon-big text-center icon-warning">
 n                                      </div>
                                </div>
                                <div class="col-7 col-md-8">
                                    <div class="numbers">
                                        <p class="card-category">Entries</p>
                                                  {{ $showCounts}}
                                        <p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <hr>
                            <div class="stats">

                                <i class="fa fa-refresh"></i> Last Update:
                                 @php
                                 $mytime = Carbon\Carbon::now();
                                 echo $mytime->toDateTimeString();
                                 @endphp
                            </div>
                        </div>
            </div>

{{--            <div class="row">--}}
{{--                <div class="col-md-12">--}}
{{--                    <div class="card ">--}}
{{--                        <div class="card-header ">--}}
{{--                            <h5 class="card-title">Plant Behavior</h5>--}}
{{--                            <p class="card-category">Performance Trends</p>--}}
{{--                        </div>--}}
{{--                        <div class="card-body " id="home">--}}
{{--<!--                            --><?// Lava::render("ColumnChart","lava","home");?>--}}
{{--                        </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
{{--            <div class="row">--}}
{{--                <div class="col-md-4">--}}
{{--                    <div class="card ">--}}
{{--                        <div class="card-header ">--}}
{{--                            <h5 class="card-title">Email Statistics</h5>--}}
{{--                            <p class="card-category">Last Campaign Performance</p>--}}
{{--                        </div>--}}
{{--                        <div class="card-body ">--}}
{{--                            <canvas id="chartEmail"></canvas>--}}
{{--                        </div>--}}
{{--                        <div class="card-footer ">--}}
{{--                            <div class="legend">--}}
{{--                                <i class="fa fa-circle text-primary"></i> Opened--}}
{{--                                <i class="fa fa-circle text-warning"></i> Read--}}
{{--                                <i class="fa fa-circle text-danger"></i> Deleted--}}
{{--                                <i class="fa fa-circle text-gray"></i> Unopened--}}
{{--                            </div>--}}
{{--                            <hr>--}}
{{--                            <div class="stats">--}}
{{--                                <i class="fa fa-calendar"></i> Number of emails sent--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
                <div class="col-md-8">
                    <div class="card card-chart">
                        <div class="card-header">
                            <h5 class="card-title">Prformance Trends</h5>
                            <p class="card-category">Line Chart </p>
                        </div>
                        <div class="card-body">
                            <canvas id="speedChart" width="400" height="100"></canvas>
                        </div>
                        <div class="card-footer">
                            <div class="chart-legend">
{{--                                <i class="fa fa-circle text-info"></i> Tesla Model S--}}
{{--                                <i class="fa fa-circle text-warning"></i> BMW 5 Series--}}
                            </div>
                            <hr/>
                            <div class="card-stats">
                                <i class="fa fa-check"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




    <script src="{{asset('../assets/img/logo-small.png../assets/js/core/jquery.min.js')}}"}></script>
    <script src="{{asset('../assets/js/core/popper.min.js')}}"></script>
    <script src="{{asset('../assets/js/core/bootstrap.min.js')}}"></script>
    <script src="{{asset('../assets/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
    <!--  Google Maps Plugin    -->
    <script src="{{asset('https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE')}}"></script>
    <!-- Chart JS -->
    <script src="{{asset('../assets/js/plugins/chartjs.min.js')}}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{asset('../assets/js/plugins/bootstrap-notify.js')}}"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{asset('../assets/js/paper-dashboard.min.js?v=2.0.0')}}" type="text/javascript"></script>
    <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="{{asset('../assets/demo/demo.js')}}"></script>

    <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
            demo.initChartsPages();
        });
    </script>


@endsection