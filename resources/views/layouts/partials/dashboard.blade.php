@extends('layouts._tab')

@section('content')

    <div class="col-md-6">
        <div id="map" style="width: 420px; height: 400px; background-color: white" class="vector-map"></div>
        <div id="heat-fill"></div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-6">{!!  Form::bsSelect('col-md-2', 'col-md-6', 'Year', 'year_destination', $year, null, 'body', false) !!}</div>
                </div>
            </div>
            <div class="panel-body">
                <div id="warehouse_destination"></div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-6">{!!  Form::bsSelect('col-md-2', 'col-md-6', 'Year', 'year', $year, null, 'body', false) !!}</div>
                    <div class="col-md-6">{!! Form::bsSelect('col-md-3', 'col-md-6', 'Warehouse', 'status', array(
                '0' => 'All', '1' => 'Open', '2' => 'Hold', '3' => 'In Process', '4' => 'Closed'), null) !!}</div>
                </div>
            </div>
            <div class="panel-body" style="height:430px;">

                <div class="row" id="graph-container" align="center">
                    <div id="warehouse_status"  style="width: 85%; height: 85%;"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading"><strong>EXPORT OCEAN NEAR TO ARRIVE</strong></div>
            <div class="panel-body">
                <div id="calendar" style="max-width: 100%; margin:0"></div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-6">{!!  Form::bsSelect('col-md-2', 'col-md-6', 'Year', 'year_airway_bill', $year, null, 'body', false) !!}</div>
                </div>
            </div>
            <div class="panel-body">
                <div id="airway_bill_details"></div>
            </div>
        </div>
    </div>
   <div class="col-md-6">
       <div class="panel panel-default">
           <div class="panel-heading"><strong>WAREHOUSE BY USERS</strong></div>
           <div class="panel-body">
               <div id="warehouse_users" style="width: 100%; height: 100%; align-content: center;"></div>
           </div>
       </div>
   </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>Warehouse on expire date</strong>
                </div>
                <div class="panel-body">
                    <table id="expire_date" class="table table-responsive">
                        <thead>
                        <tr>
                            <th width="15%">Code</th>
                            <th width="10%">Status</th>
                            <th width="25%">Shipper</th>
                            <th width="25%">Consignee</th>
                            <th width="15%">Expire Date</th>
                            <th width="10%">Total Days</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
<script type="text/javascript">

    window.onload = (function () {
        $("#year").val(0).change();
        $("#year_destination").val(0).change();
        $("#year_airway_bill").val(0).change();

        $('#expire_date').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('dashboard.table_expire_date') }}',
            columns: [
                {data: 0, name: 'code'},
                {data: 1, name: 'status'},
                {data: 2, name: 'shipper_name'},
                {data: 3, name: 'consignee_name'},
                {data: 4, name: 'expire_date'},
                {data: 5, name: 'total'}
            ]
        });

    });
    var date = new Date();

    $.ajax({
        type: 'GET',
        url: "{{ route('dashboard.dashboard_values') }}",
        success: function (r) {
            /*======= WAREHOUSE DESTINATION ======*/
            $('#map').vectorMap({
                map: 'world_mill',
                series: {
                    regions: [{
                        values: r[0],
                        scale: ['#C8EEFF', '#0071A4'],
                        normalizeFunction: 'polynomial'
                    }]
                },
                onRegionTipShow: function(e, el, code){
                    el.html(el.html() + ' (WR: '+ (r[0][code] != undefined ? r[0][code] : 0) + ')');
                }
            });
            /*======= FILE CALENDAR======*/
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'listDay,listWeek,month'
                },
                views: {
                    listDay: { buttonText: 'list day' },
                    listWeek: { buttonText: 'list week' }
                },
                contentHeight: 450,
                defaultView: 'month',
                defaultDate: date,
                navLinks: true,
                editable: true,
                eventLimit: true,
                events: []
            });
            $.each(r[1], function (i, item) {
                ctitle = item.title;
                cstart = item.end;
                cend = item.end;
                var eventObject = {
                    title: ctitle,
                    start: cstart,
                    end: cend,
                    allDay: true
                };
                $('#calendar').fullCalendar('renderEvent', eventObject, true);
            });

            /*========WAREHOUSE USERS =======*/
            Highcharts.chart('warehouse_users', {
                chart: {
                    type: 'bar',
                    height: (9 / 13 * 100) + '%' // 16:9 ratio
                },
                title: {
                    text: 'Warehouse Receipts by Users'
                },
                xAxis: {
                    categories: ['Users'],
                    title: {
                        text: null
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Warehouses #',
                        align: 'high'
                    },
                    labels: {
                        overflow: 'justify'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.0f} </b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: r[2]
            });
            //=================================


        }
    });
    //WAREHOUSE-STATUS
    function createChart (year, status){
    $.ajax({
        type: 'GET',
        url: "{{ route('dashboard.warehouse_status') }}",
        data: { year: year, status: status},
        success: function(e) {
            Highcharts.chart('warehouse_status', {
                chart: {
                    type: 'column',
                    options3d: {
                        enabled: true,
                        alpha: 10,
                        beta: 25,
                        depth: 70
                    }
                },

                title: {
                    text: 'Warehouse Receipts by Status'
                },
                xAxis: {
                    categories: e[1]
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Warehouses #'
                    }
                },
                plotOptions: {
                    column: {
                        depth: 25
                    }
                },
                series: e[0]
            });

        }
    });
}

    $("#year").change(function(){
        var year= $("#year option:selected").text();
        var status= $("#status").val();
        createChart(year, status);
    });

    $("#status").change(function(){
        var year= $("#year option:selected").text();
        var status= $("#status").val();
        createChart(year, status);
    });


    /*========= WAREHOUSES BARS BY COUNTRY=========*/
    $("#year_destination").change(function(){
        var year = $("#year_destination option:selected").text();
        $.ajax({
            type: 'GET',
            data: {year: year},
            url: "{{ route('dashboard.table_warehouses') }}",
            success: function (e) {
                console.log(e[0], e[1]);
                Highcharts.chart('warehouse_destination', {
                    chart: {
                        type: 'column',
                        height: (9 / 15 * 100) + '%' // 16:9 ratio
                    },
                    title: {
                        text: 'Warehouse by Destination'
                    },
                    xAxis: {
                        categories: e[1]
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'Warehouses #'
                        }
                    },
                    tooltip: {
                        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y:.0f} </b></td></tr>',
                        footerFormat: '</table>',
                        shared: true,
                        useHTML: true
                    },
                    plotOptions: {
                        column: {
                            pointPadding: 0.2,
                            borderWidth: 0
                        }
                    },
                    series: e[0]
                });
            }
        });
    });

    $("#year_airway_bill").change(function(){
        var year = $("#year_airway_bill option:selected").text();

        $.ajax({
            type: 'GET',
            data: {year: year},
            url: "{{ route('dashboard.airway_bill_details') }}",
            success: function (e) {
            console.log(e[0], e[1], e[2]);
                Highcharts.chart('airway_bill_details', {
                    chart: {
                        zoomType: 'xy'
                    },
                    title: {
                        text: 'Total Pieces and Weight on File'
                    },
                    subtitle: {
                        text: 'Year: '+ year
                    },
                    xAxis: [{
                        categories: e[2],
                        crosshair: true
                    }],
                    yAxis: [{ // Primary yAxis
                        labels: {
                            style: {
                                color: Highcharts.getOptions().colors[1]
                            }
                        },
                        title: {
                            text: 'Total Pieces',
                            style: {
                                color: Highcharts.getOptions().colors[1]
                            }
                        }
                    }, { // Secondary yAxis
                        title: {
                            text: 'Total Weight',
                            style: {
                                color: Highcharts.getOptions().colors[0]
                            }
                        },
                        labels: {
                            style: {
                                color: Highcharts.getOptions().colors[0]
                            }
                        },
                        opposite: true
                    }],
                    tooltip: {
                        shared: true
                    },
                    legend: {
                        layout: 'vertical',
                        align: 'left',
                        x: 120,
                        verticalAlign: 'top',
                        y: 100,
                        floating: true,
                        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
                    },
                    series: [{
                        name: 'Pieces',
                        type: 'column',
                        yAxis: 1,
                        data: e[0]
                    }, {
                        name: 'Weight',
                        type: 'spline',
                        data: e[1]

                    }]
                });
            }
        });
    });



</script>
@endsection
