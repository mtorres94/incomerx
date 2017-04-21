<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ strtoupper($airway_bill->booking_code) }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 3.3.5 -->
{!! Html::style('css/metro-bootstrap.min.css') !!}

<!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Custom CSS -->
{!! Html::style('css/pdf.css') !!}

<!-- Font Awesome -->
{!! Html::style('css/font-awesome.min.css') !!}

<!-- Ionicons -->
    {!! Html::style('css/ionicons.min.css') !!}
</head>

<body>
<div class="container-fluid">
    <div class="row row-padding">
        <div class="col-xs-6">
            <div class="company-info">
                <h5><strong>VECO LOGISTICS MIAMI INC.</strong></h5>
                <p>7270 NW 35 TERRACE</p>
                <p>MIAMI, FLORIDA 33122</p>
                <p>Phone: 305-5992703 / Fax: 305-5992925</p>
                <br/>
                <p>Printed on: {{ \Carbon\Carbon::now()->toDateString() }}</p>
                <p>Printed by: {{ Auth::user()->username }}</p>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="row">
                <div class="document-info pull-right">
                    <h5><strong>CREDIT MEMO</strong></h5>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <table class="table resume-table" >
                <tr>
                    <td colspan="2" width="50%"><h5>MAWB NUMBER</h5></td>
                    <td colspan="2" width="50%"><h5>MANIFEST NUMBER</h5></td>
                </tr>
                <tr>
                    <td colspan="2" style="border-bottom: 1px solid;" >{{ strtoupper($airway_bill->booking_code) }}</td>
                    <td colspan="2" style="border-bottom: 1px solid;" >{{ $airway_bill->shipment_id > 0 ? strtoupper($airway_bill->shipment->code) : "" }}</td>
                </tr>
                <tr>
                    <td width="15%"><strong>AGENT</strong></td>
                    <td>{{ $airway_bill->agent_id > 0 ? strtoupper($airway_bill->agent->code) : "" }}</td>
                    <td width="15%"><strong>AIRLINE</strong></td>
                    <td>{{ $airway_bill->carrier_id > 0 ? strtoupper($airway_bill->carrier->name) : "" }}</td>
                </tr>
                <tr>
                    <td colspan="2">{{ $airway_bill->agent_id > 0 ? strtoupper( $airway_bill->agent->name) : "" }}</td>
                    <td><strong>DEPARTURE DATE:</strong></td>
                    <td>{{ $airway_bill->departure_date }}</td>
                </tr>
                <tr>
                    <td colspan="2">{{ $airway_bill->agent_id > 0 ? strtoupper($airway_bill->agent->address) : "" }}</td>
                    <td><strong>FLIGHT:</strong></td>
                    <td>{{ $airway_bill->flight}}</td>
                </tr>
                <tr>
                    <td><strong>Contact:</strong></td>
                    <td></td>
                    <td><strong>ORIGIN:</strong></td>
                    <td>{{ $airway_bill->origin_id >0 ? strtoupper($airway_bill->origin->code) : "" }}</td>
                </tr>
                <tr>
                    <td><strong>Phone:</strong></td>
                    <td>{{ $airway_bill->agent_id > 0 ? $airway_bill->agent->phone : ""  }}</td>
                    <td><strong>DESTINATION:</strong></td>
                    <td>{{ $airway_bill->destination_id >0 ? strtoupper($airway_bill->destination->code) : "" }}</td>
                </tr>
                <tr>
                    <td><strong>Fax:</strong></td>
                    <td>{{ $airway_bill->agent_id > 0 ? $airway_bill->agent->fax : ""  }}</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <table class="table resume-table">
                <thead>
                <tr>
                    <th width="15%">Hawb Number</th>
                    <th width="30%">Shipper/ Consignee</th>
                    <th width="15%">Freight Revenue</th>
                    <th width="10%">Freight Cost</th>
                    <th width="10%">Net Profit</th>
                    <th width="10%">Perc</th>
                    <th width="10%">Commission</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{ $airway_bill->code }}</td>
                    <td>{{ $airway_bill->shipper_id > 0 ? strtoupper($airway_bill->shipper->name) : "" }}<br>
                    {{ $airway_bill->consignee_id > 0 ? strtoupper($airway_bill->consignee->name) : "" }}</td>
                    <td>{{ $airway_bill->sum_bill }}</td>
                    <td>0.00</td>
                    <td>{{ $airway_bill->sum_profit }}</td>
                    <td>{{ $airway_bill->sum_profit_p }}</td>
                    <td>{{ $airway_bill->commission }}</td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="2"></td>
                    <td>{{ $airway_bill->sum_bill }}</td>
                    <td>0.00</td>
                    <td>{{ $airway_bill->sum_profit }}</td>
                    <td></td>
                    <td>{{ $airway_bill->commission }}</td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12">
            <table class="resume-table" width="30%" align="center">
                <tr>
                    <td width="50%"><strong>PROFIT SHARE:</strong></td>
                    <td></td>
                </tr>
                <tr>
                    <td><strong>CREDIT MASTER:</strong></td>
                    <td style="border-bottom: 1px solid;"></td>
                </tr>
                <tr>
                    <td><strong>TOTALS:</strong></td>
                    <td></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <p class="resume-table"><strong>COMMENTS</strong></p><br>
            <p class="resume-table"></p>
        </div>
    </div>

</div>
</body>

</html>