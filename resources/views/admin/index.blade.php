@extends('layouts.dashboard')

{{-- Title --}}
@section('title')
    {{ config('app.name') }}
@endsection

{{-- Css --}}
@push('css')
@endpush

@push('page-js')
    <script src="{{ asset('dashboard_assets/app-assets/js/scripts/pages/custom-datatable.js') }}"></script>
    <script src="{{ asset('dashboard_assets/app-assets/vendors/js/charts/apexcharts.min.js') }}"></script>
@endpush

{{-- Menu Active --}}
@section('dashboard')
    active
@endsection

{{-- Breadcrumb --}}
@section('breadcrumb')
    <h2 class="content-header-title float-left mb-0">Admin Dashboard</h2>
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">Home</a>
            </li>
        </ol>
    </div>
@endsection


{{-- Content --}}
@section('content')
    <section id="dashboard-analytics">
        <div class="row match-height"> 
            <!-- Subscribers Chart Card starts -->
            <div class="col-sm-3 col-12">
                <div class="card">
                    <div class="card-header flex-column align-items-start pb-0">
                        <div class="avatar bg-light-primary p-50 m-0">
                            <div class="avatar-content"> 
                                <i data-feather='message-square'  class="font-medium-5"></i>
                            </div>
                        </div>
                        <h2 class="font-weight-bolder mt-1">{{ Auth::user()->total_sms }}</h2>
                        <p class="card-text">Total SMS</p>
                    </div>
                    {{-- <div id="gained-chart"></div> --}}
                </div>
            </div>
            <!-- Subscribers Chart Card ends -->

            <!-- Orders Chart Card starts -->
            <div class="col-sm-3 col-12">
                <div class="card">
                    <div class="card-header flex-column align-items-start pb-0">
                        <div class="avatar bg-light-primary p-50 m-0">
                            <div class="avatar-content">
                                <i data-feather='send' class="font-medium-5"></i>
                            </div>
                        </div>
                        <h2 class="font-weight-bolder mt-1">{{ Auth::user()->send_message }}</h2>
                        <p class="card-text">Total Sent SMS</p>
                    </div>
                    {{-- <div id="order-chart2"></div> --}}
                </div>
            </div>

            <div class="col-sm-3 col-12">
                <div class="card">
                    <div class="card-header flex-column align-items-start pb-0">
                        <div class="avatar bg-light-warning p-50 m-0">
                            <div class="avatar-content">
                                <i data-feather="file" class="font-medium-5"></i>
                            </div>
                        </div>
                        <h2 class="font-weight-bolder mt-1">{{ Auth::user()->total_sms - Auth::user()->send_message }}</h2>
                        <p class="card-text">Total Remaining SMS</p>
                    </div>
                    {{-- <div id="order-chart"></div> --}}
                </div>
            </div> 
            <div class="col-sm-3 col-12">
                <div class="card">
                    <div class="card-header flex-column align-items-start pb-0">
                        <div class="avatar bg-light-warning p-50 m-0">
                            <div class="avatar-content">
                                <span class="font-medium-5"> € </span>
                            </div>
                        </div>
                        <h2 class="font-weight-bolder mt-1">{{ Auth::user()->amount }}</h2>
                        <p class="card-text">Total Invest</p>
                    </div>
                    {{-- <div id="order-chart"></div> --}}
                </div>
            </div> 

            <div class="col-lg-4 col-sm-6 col-12">
                <div class="card">
                    <div class="card-header d-flex flex-sm-row flex-column justify-content-md-between align-items-start justify-content-start border-bottom mb-2">
                        <h4 class="card-title mb-sm-0 mb-1">Last 7 Days</h4>
                    </div>
                    <div class="card-body"> 
                        <div id="lead-stats-bar-chart"></div>
                    </div>
                </div>
            </div> 
            <div class="col-lg-8 col-12">
                <div class="card">
                    <div class="card-header border-bottom mb-2">
                        <h4 class="card-title">Yearly Stats</h4>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex justify-content-start mb-3">
                            <div class="mr-2">
                                <p class="card-text">This Year</p>
                                <h3 class="font-weight-bolder">
                                    <sup class="font-medium-1 font-weight-bold">
                                        <span class=>{{ $this_year_total }}</span>
                                    </sup>
                                </h3>
                            </div>
                            <div>
                                <p class="card-text">Last year</p>
                                <h3 class="font-weight-bolder">
                                    <sup class="font-medium-1 font-weight-bold">
                                        <span>{{ $last_year_total }}</span>
                                    </sup>
                                </h3>
                            </div>
                        </div>
                        <div id="compatability-project-stats-chart" class="mt-auto"></div>
                    </div>
                </div>
            </div> 
        </div>  
    </section>
    <section>
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h3 class="card-title">SMS Logs</h3>
                        @if($histories->count() > 0)
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#clearLog">Clear Log</button>
                        @endif
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered datatable">
                            <thead>
                                <th>No</th>
                                <th>Number</th>
                                <th>Group</th>
                                <th>Title</th>
                                <th>Body</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                            @forelse($histories as $historie)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $historie->number }}</td>
                                    <td><span class="badge badge-light-{{ $historie->getGroup ? 'info':'secondary' }}">{{ $historie->getGroup->name ?? 'No Group' }}</span></td>
                                    <td>{{ $historie->title }}</td>
                                    <td>{{ $historie->body }}</td>
                                    <td>
                                        <span class="badge rounded-pill badge-success">{{ $historie->status }}</span>
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($historie->created_at)->locale('fr')->translatedFormat('F j, Y H:i:s A') }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-icon btn-outline-secondary dropdown-toggle hide-arrow" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="{{ route('histories.destroy', $historie->id) }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash me-50"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                                    <span>Delete</span>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="100">
                                        <div class="alert alert-danger mb-0">
                                            <div class="alert-body">No Data Found</div>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="clearLog" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="py-1">
                        <div class="modal-body text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" style="font-size: 100px" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle text-danger">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="8" x2="12" y2="12"></line>
                                <line x1="12" y1="16" x2="12.01" y2="16"></line>
                            </svg>
                            <h2 class="font-weight-normal mt-1">{{ __('Are you sure') }}?</h2>
                            <h4 class="font-weight-light mb-0">{{ __("You won't be able to revert this!") }}</h4>
                        </div>
                        <div class="modal-footer border-top-0 justify-content-center">
                            <button type="button" class="btn btn-outline-secondary waves-effect" data-dismiss="modal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                                {{ __('Close') }}
                            </button>
                            <a href="{{ route('histories_all.destroy') }}" class="btn btn-danger waves-effect waves-float waves-light">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
                                    <polyline points="3 6 5 6 21 6"></polyline>
                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                </svg>
                                {{ __('Delete') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
<script>
    
    var flatPicker = $('.flat-picker'),
         isRtl = $('html').attr('data-textdirection') === 'rtl',
         chartColors = {
         column: {
             series1: '#826af9',
             series2: '#d2b0ff',
             bg: '#f8d3ff'
         },
         success: {
             shade_100: '#7eefc7',
             shade_200: '#06774f'
         },
         donut: {
             series1: '#ffe700',
             series2: '#00d4bd',
             series3: '#826bf8',
             series4: '#2b9bf4',
             series5: '#FFA1A1'
         },
         area: {
             series3: '#a4f8cd',
             series2: '#60f2ca',
             series1: '#2bdac7'
         }
         };
 
     // heat chart data generator
     function generateDataHeat(count, yrange) {
         var i = 0;
         var series = [];
         while (i < count) {
         var x = 'w' + (i + 1).toString();
         var y = Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;
 
         series.push({
             x: x,
             y: y
         });
         i++;
         }
         return series;
     }
 
     // Init flatpicker
     if (flatPicker.length) {
         var date = new Date();
         flatPicker.each(function () {
         $(this).flatpickr({
             mode: 'range',
             defaultDate: ['2019-05-01', '2019-05-10']
         });
         });
     }
 
     var barChartEl = document.querySelector('#lead-stats-bar-chart'),
         barChartConfig = {
         chart: {
             height: 400,
             type: 'bar',
             parentHeightOffset: 0,
             toolbar: {
             show: false
             }
         },
         plotOptions: {
             bar: {
             horizontal: true,
             barHeight: '30%',
             endingShape: 'rounded'
             }
         },
         grid: {
             xaxis: {
             lines: {
                 show: false
             }
             },
             padding: {
             top: -15,
             bottom: -10
             }
         },
         colors: ["#67cdff", "#fe275e", "#5b5bd7", "#28C76F", "#ff9d1f", "#ff3329"],
         dataLabels: {
             enabled: true
         },
         series: [
             {
             name:"Total",
             data: @json($last_week_send_messge),
             }
         ],
         xaxis: {
             categories: @json($days),
         },
         yaxis: {
             opposite: isRtl
         }
         };
     if (typeof barChartEl !== undefined && barChartEl !== null) {
         var barChart = new ApexCharts(barChartEl, barChartConfig);
         barChart.render();
     }
 
 </script>

<script>
    var $textMutedColor = '#b9b9c3';
    var $labelColor = '#313c50';
</script>
<script>
    var $compatabilityRevenueChart = document.querySelector('#compatability-project-stats-chart');
    var compatabilityRevenueChartOptions;
    var compatabilityRevenueChart;

    compatabilityRevenueChartOptions = {
        chart: {
            height: 240,
            toolbar: { show: false },
            zoom: { enabled: false },
            type: 'line',
            offsetX: -10,
        },
        stroke: {
            curve: 'smooth',
            dashArray: [0, 8],
            width: [4, 3],
        },
        grid: {
            borderColor: $labelColor
        },
        legend: {
            show: false
        },
        colors: ["#35cbe2", "#d172f2"],
        markers: {
            size: 0,
            hover: {
                size: 5,
            },
        },
        xaxis: {
            labels: {
                style: {
                    colors: $textMutedColor,
                    fontSize: '1rem',
                },
            },
            axisTicks: {
                show: false,
            },
            categories: ["{{ _('Jan') }}", "{{ _('Feb') }}", "{{ _('Mar') }}", "{{ _('Apr') }}", "{{ _('May') }}", "{{ _('Jun') }}", "{{ _('Jul') }}", "{{ _('Aug') }}", "{{ _('Sep') }}", "{{ _('Oct') }}", "{{ _('Nov') }}", "{{ _('Dec') }}"],
            axisBorder: {
                show: false,
            },
            tickPlacement: 'on',
        },
        yaxis: {
            tickAmount: 5,
            labels: {
                style: {
                    colors: $textMutedColor,
                    fontSize: '1rem',
                },
                formatter: function (val) {
                    return val > 999 ? (val / 1000).toFixed(0) + 'k' : val;
                }
            }
        },
        grid: {
            padding: {
                top: -20,
                bottom: -10,
                left: 20
            }
        },
        tooltip: {
            x: { show: false }
        },
        series: [
            {
                name: "{{ __('This Year') }}",
                data: @json($this_year)
            },
            {
                name: "{{ __('Last Year') }}",
                data: @json($last_year)
            }
        ],
    };

    compatabilityRevenueChart = new ApexCharts($compatabilityRevenueChart, compatabilityRevenueChartOptions);
    compatabilityRevenueChart.render();
</script>
@endpush
