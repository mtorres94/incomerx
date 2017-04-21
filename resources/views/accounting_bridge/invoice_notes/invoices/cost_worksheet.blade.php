<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ $invoice->code }}</title>
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
        <div class="col-xs-12" align="center">
            <div class="company-info">
                <h5><strong>VECO LOGISTICS MIAMI INC.</strong></h5>
                <h5><strong>COST WORKSHEET</strong></h5>
            </div>
        </div>
    </div>
    <div class="row">
        <p style="font-size: 8px;">Printed on: {{ \Carbon\Carbon::now()->toDateString() }}<br>
       Printed by: {{ Auth::user()->username }}</p><br>
    </div>
    <div class="row">
        <table class="table header-table">
            <tr>
                <td><strong>File Number: </strong></td>
                <td>{{ $invoice->shipment_code }}</td>
                <td><strong>User</strong></td>
                <td>{{ $invoice->user_create_id > 0 ? strtoupper($invoice->user_create->username) : "" }}</td>
            </tr>
            <tr>
                <td><strong>Carrier: </strong></td>
                <td>{{ $invoice->carrier_id > 0 ? strtoupper($invoice->carrier->name) : "" }}</td>
                <td><strong> Departure: </strong></td>
                <td>{{ $invoice->departure_date }}</td>
            </tr>
            <tr>
                <td><strong>Awb#: </strong></td>
                <td>{{ $invoice->master_code }}</td>
                <td><strong> Arrival: </strong></td>
                <td>{{ $invoice->arrival_date }}</td>
            </tr>
            <tr>
                <td><strong>Origin: </strong></td>
                <td>{{ $invoice->origin_id > 0 ? strtoupper( $invoice->origin->name) : ""}}</td>
                <td><strong> Destination: </strong></td>
                <td>{{ $invoice->destination_id > 0 ? strtoupper($invoice->destination->name) : "" }}</td>
            </tr>
        </table>
    </div>

<hr>
    <div class="row">
        <div align="center" class="company-info"><p><strong>{{ $invoice->invoice_bill == 'P' ? 'PREPAID' : 'COLLECTED' }} CHARGES</strong></p></div>
        <br>
        <table class="table table-condensed">
            <thead>
            <tr>
                <td width="10%">Code</td>
                <td width="15%">Description</td>
                <td width="20%">Bill to</td>
                <td width="10%">Rate</td>
                <td width="10%">Amount</td>
                <td width="10%">Cost</td>
                <td width="10%">Vendor</td>
                <td width="15%">Reference</td>
            </tr>
            </thead>
            <tbody>
               @foreach($invoice->charge_details as $detail)
                   <tr>
                       <td>{{ $detail->billing_id > 0 ? strtoupper($detail->billing->code)  : ""}}</td>
                       <td>{{ strtoupper($detail->billing_description) }}</td>
                       <td>{{ $detail->billing_customer_id > 0 ? strtoupper($detail->billing_customer->name) : "" }}</td>
                       <td>{{ $detail->billing_rate }}</td>
                       <td>{{ round($detail->billing_amount, 3) }}</td>
                       <td>{{ $invoice->class == 'MI' ? $detail->cost_amount : 0.00}}</td>
                       <td>{{ $detail->vendor_id > 0 ? strtoupper($detail->billing_vendor->code) : "" }}</td>
                       <td>{{ $detail->cost_reference}}</td>
                   </tr>
               @endforeach
            </tbody>
            <tfoot>
            <tr>
                <td colspan="4" align="right"><strong>{{ $invoice->invoice_bill == 'P' ? 'PREPAID' : 'COLLECTED'}} CHARGES TOTALS: </strong></td>
                <td><strong>{{ $invoice->total_bill }}</strong></td>
                <td><strong>{{ $invoice->total_cost }}</strong></td>
                <td></td>
                <td></td>
            </tr>
            </tfoot>
        </table>
    </div>
</div>

</body>

</html>
