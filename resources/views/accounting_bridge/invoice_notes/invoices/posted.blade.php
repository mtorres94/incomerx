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
                <h5><strong>A/B Invoice Posting</strong></h5>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="company-info">
                <p>Printed on: {{ \Carbon\Carbon::now()->toDateString() }}</p>
                <p>Printed by: {{ Auth::user()->username }}</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div align="center" class="company-info"><p><strong>Accounts Receivable Posting Details</strong></p></div>
        <table class="table table-condensed">
            <thead>
                <tr>
                    <td width="15%">Invoice#</td>
                    <td width="5%">Type</td>
                    <td width="10%">Date</td>
                    <td width="15%">Reference</td>
                    <td width="10%">Customer ID</td>
                    <td width="30%">Customer Name</td>
                    <td width="15%">Amount</td>
                </tr>
            </thead>
            <tbody>
                @if(isset($invoice))
                        <tr>
                            <td>{{ $invoice->code }}</td>
                            <td>{{ $invoice->type }}</td>
                            <td>{{ $invoice->date }}</td>
                            <td>{{ $invoice->shipment_code }}</td>
                            <td>{{ $invoice->bill_to_id > 0 ? strtoupper($invoice->bill_to->code ): ""}}</td>
                            <td>{{ $invoice->bill_to_id > 0 ? strtoupper($invoice->bill_to->name) : ""}}</td>
                            <td>{{ $invoice->total_bill }}</td>
                        </tr>
                @endif
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="6" align="right"><strong>TOTALS</strong></td>
                    <td>{{ $invoice->total_bill}}</td>
                </tr>
            </tfoot>
        </table>
    </div>
    <br>
    <div class="row">
        <div align="center" class="company-info"><p><strong>Accounts Payable Posting Details</strong></p></div>
        <table class="table table-condensed">
            <thead>
            <tr>
                <td width="15%">Invoice#</td>
                <td width="5%">Type</td>
                <td width="10%">Date</td>
                <td width="15%">Reference</td>
                <td width="10%">Vendor</td>
                <td width="30%">Vendor Name</td>
                <td width="15%">Amount</td>
            </tr>
            </thead>
            <tbody>
            @foreach($invoice->charge_details as $detail)
                @if($detail->cost_amount > 0)
                    <tr>
                        <td>{{ $detail->cost_invoice }}</td>
                        <td>{{ $invoice->type }}</td>
                        <td>{{ $detail->cost_date }}</td>
                        <td>{{ $detail->cost_reference }}</td>
                        <td>{{ $detail->vendor_id > 0 ? strtoupper($detail->billing_vendor->code) : ""}}</td>
                        <td>{{ $detail->vendor_id > 0 ? strtoupper($detail->billing_vendor->name) : ""}}</td>
                        <td>{{ $detail->cost_amount }}</td>
                    </tr>
                @endif
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <td colspan="6" align="right"><strong>TOTALS</strong></td>
                <td>{{ $invoice->total_cost }}</td>
            </tr>
            </tfoot>
        </table>
    </div>


</div>

</body>

</html>
