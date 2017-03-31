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
                    <h5><strong>INVOICE</strong></h5>
                    <p class="code-bar">{{ $invoice->code }}</p>
                    <p class="document_number"> {{ $invoice->code }}</p>
                    <p class="document_number">Invoice date: {{ $invoice->date }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-1"><p style="font-size: 7px;"><strong>BILL TO</strong></p></div>
        <div class="col-xs-5">
           <div class="panel panel-default">
               <div class="panel-body" style="height:70px;">
                   <p>{{ $invoice->bill_to_id >0 ? strtoupper($invoice->bill_to->name) : "" }}</p>
                   <p>{{ strtoupper($invoice->bill_to_address) }}</p>
                   <p>{{ strtoupper($invoice->bill_to_city) }}</p>
               </div>
           </div>
       </div>
        <div class="col-xs-1"><p style="font-size: 7px;"><strong>SHIPPER</strong></p></div>
        <div class="col-xs-5">
            <div class="panel panel-default">
                <div class="panel-body" style="height:70px;">
                    <p>{{ $invoice->shipper_id >0 ? strtoupper($invoice->shipper->name) : "" }}</p>
                    <p>{{ strtoupper($invoice->shipper_address) }}</p>
                    <p>{{ strtoupper( $invoice->shipper_city) }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6">
            <table class="table header-table">
                <tr>
                    <td width="30%"><strong>FILE #:</strong></td>
                    <td>{{ $invoice->shipment_code }}</td>
                </tr>
                <tr>
                    <td><strong>MAWB/ MBL #:</strong></td>
                    <td>{{ $invoice->master_code }}</td>
                </tr>
                <tr>
                    <td><strong>HAWB/ HBL #:</strong></td>
                    <td>{{ $invoice->house_code }}</td>
                </tr>
                <tr>
                    <td><strong>CARRIER:</strong></td>
                    <td>{{ $invoice->carrier_id > 0 ? strtoupper($invoice->carrier->name) : "" }}</td>
                </tr>
                <tr>
                    <td><strong>VESSEL:</strong></td>
                    <td>{{ $invoice->vessel_name }}</td>
                </tr>
                <tr>
                    <td><strong>FLIGHT/ VOYAGE:</strong></td>
                    <td>{{ $invoice->voyage_name }}</td>
                </tr>
            </table>

        </div>
        <div class="col-xs-1"><p style="font-size: 7px;"><strong>CONSIGNEE</strong></p></div>
        <div class="col-xs-5" >
            <div class="panel panel-default">
                <div class="panel-body" style="height:70px;">
                    <p>{{ $invoice->consignee_id >0 ? strtoupper($invoice->consignee->name) : "" }}</p>
                    <p>{{ strtoupper($invoice->consignee_address) }}</p>
                    <p>{{ strtoupper($invoice->consignee_city) }}</p>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-xs-12">
            <table class="table header-table">
            <tr>
                <td width="15%"><strong>ORIGIN:</strong></td>
                <td width="15%">{{ $invoice->origin_id > 0 ? strtoupper($invoice->origin->code) : "" }}</td>
                <td width="15%"><strong>ETD:</strong></td>
                <td width="15%">{{ $invoice->departure_date }}</td>
                <td width="15%"><strong>PIECES:</strong></td>
                <td width="10%">{{ $invoice->total_pieces }}</td>
                <td width="15%"></td>
            </tr>
            <tr>
                <td><strong>DESTINATION:</strong></td>
                <td>{{ $invoice->destination_id >0 ? strtoupper($invoice->destination->code) : "" }}</td>
                <td><strong>ETA:</strong></td>
                <td>{{ $invoice->arrival_date}}</td>
                <td><strong>GROSS WEIGHT:</strong></td>
                <td>{{ $invoice->total_gross_weight }}  {{ $invoice->total_weight_unit }}</td>
                <td></td>
            </tr>
            <tr>
                <td><strong>CUST REF:</strong></td>
                <td colspan="2">{{ $invoice->customer_reference }}</td>
                <td></td>
                <td><strong>CHARGE WEIGHT:</strong></td>
                <td>{{ $invoice->total_charge_weight }}  {{ $invoice->total_weight_unit }}</td>
            </tr>
        </table>
        </div>
    </div>
    <div class="row" style="height:400px;">
        <div class="col-xs-12">
            <table class="table table-condensed">
            <thead>
            <tr>
                <td width="50%">DESCRIPTION</td>
                <td width="10%">QTY</td>
                <td width="10%">UNIT</td>
                <td width="15%">RATE</td>
                <td width="15%">AMOUNT</td>
            </tr>
            </thead>
                <tbody  >
                    @foreach($invoice->charge_details as $detail)
                        <tr>
                            <td>{{ $detail->billing_id > 0 ? strtoupper( $detail->billing->name) : "" }}</td>
                            <td>{{ $detail->billing_quantity }}</td>
                            <td>{{ $detail->billing_unit_id > 0 ? strtoupper($detail->billing_unit->code) : ""}}</td>
                            <td>{{ $detail->billing_rate}}</td>
                            <td>{{ $detail->billing_amount}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <table class="table header-table">
                <tfoot>
                <tr>
                    <td align="right" width="80%"><strong>TOTAL {{ $invoice->currency_id > 0 ? strtoupper($invoice->currency->code) : "" }}:</strong></td>
                    <td width="20%">{{ $invoice->total_bill }}</td>
                </tr>
                </tfoot>
        </table>
        </div>
    </div>
    <div class="row" style="height: 40px;">
        <div class="col-xs-12">
            <table class="table header-table">
            <tr>
                <td width="10%"><p><strong>COMMENTS</strong></p></td>
                <td><p>{{ $invoice->invoice_comments }}</p></td>
            </tr>
        </table>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <table class="table header-table">
            <tr>
                <td rowspan="2" width="45%">
                    <p><strong> Return Portion</strong><br>
                    VECO LOGISTICS MIAMI INC.<br>
                    7270 NW 35 TERRACE<br>
                    MIAMI, FLORIDA 33122<br>
                    Phone: 305-5992703 / Fax: 305-5992925<br>
                    www.vecologistics.com<br><br>
                    To ensure proper credit, please return this portion with your<br> payment to: VECO LOGISTICS MIAMI <br><br>
                    Please make your check payable to:<br>
                    <strong>VECO LOGISTICS MIAMI</strong></p>
                </td>
                <td width="55%">
                    <table class="table resume-table" border="1">
                        <tr>
                            <td width="40%"><p><strong>Invoice Number</strong></p></td>
                            <td width="60%">{{ substr($invoice->code, 4) }}</td>
                        </tr>
                        <tr>
                            <td><p><strong> Customer Name</strong></p></td>
                            <td>VECO LOGISTICS MIAMI</td>
                        </tr>
                        <tr>
                            <td><p><strong> Amount Due $</strong></p></td>
                            <td>{{ $invoice->total_bill }}</td>
                        </tr>
                        <tr>
                            <td><p><strong>Invoices Date</strong></p></td>
                            <td>{{ $invoice->date }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <p align="center"><strong>SHIPPER’S CONSENT TO SCREEN CARGO</strong></p>
                    <p style="font-size: 6px;">In accordance with TSA Regulations, this letter authorizes: Veco Logistics Miami Inc., and/or each of their offices<br>or branches to screen all cargo tendered by our company from the date of this notification forward until revoked in<br>writing.<br>We are also aware that a physical inspection may be required, in which case we do not hold Veco Logistics Miami<br>
                        Inc accountable for any damage or delay due to the opening of any cargo, repackaging or any impact on transit<br>
                        times associated with this screening.<br>
                        We understand that Veco Logistics Miami Inc. must refuse to offer our cargo for transportation by air (passenger<br>
                        or freighter aircraft) should we not consent to the cargo Screened per TSA Regulations.</p>
                </td>
            </tr>
        </table>
        </div>
    </div>
</div>

</body>

</html>
