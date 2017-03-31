<!DOCTYPE html>
<html lang="en">
<head>
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
                <h5><strong>INVOICES/ CREDITS/ DEBITS REPORTS</strong></h5>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6">
            <p style="font-size: 8px;">Printed on: {{ \Carbon\Carbon::now()->toDateString() }}<br>
            Printed by: {{ Auth::user()->username }}</p>
        </div>
    </div>
    <div class="row">
        <table class="table table-condensed">
            <thead>
            <tr>
                <td width="10%">Invoice</td>
                <td width="5%">Type</td>
                <td width="10%">File Number</td>
                <td width="10%">Hawb/ Hbl</td>
                <td width="15%">Date</td>
                <td width="25%">Shipper/ Consignee</td>
                <td width="10%">Weight</td>
                <td width="10%">Bill Amt</td>
                <td width="5%">Status</td>
            </tr>
            </thead>
            <tbody>
            <?php $sum_report=0; ?>
                @foreach($invoice as $detail)
                    <tr>
                        <td>{{ $detail->code }}</td>
                        <td>{{ $detail->type }}</td>
                        <td>{{ strtoupper($detail->shipment_code) }}</td>
                        <td>{{ strtoupper($detail->house_code) }}</td>
                        <td>{{ $detail->date }}</td>
                        <td>{{ $detail->shipper_id > 0 ? strtoupper($detail->shipper->name) : "" }} / {{ $detail->consignee_id > 0 ? strtoupper($detail->consignee->name) : "" }}</td>
                        <td>{{ $detail->total_gross_weight }}</td>
                        <td>{{ $detail->total_bill }}</td>
                        <td>{{ $detail->status }}</td>
                        <?php $sum_report += $detail->total_bill; ?>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="7" align="right"><p style="font-size: 8px;"><strong>REPORT TOTALS: </strong></p></td>
                    <td colspan="2" align="left"><p style="font-size: 8px;"><strong>{{ $sum_report }}</strong></p></td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

</body>

</html>
