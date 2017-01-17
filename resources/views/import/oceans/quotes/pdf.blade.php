<!DOCTYPE html>
<html lang="en">
<head>
    <title>Quote {{ $quote->code }}</title>
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
                    <h5><strong>QUOTE</strong></h5>
                    <p class="document_number">{{ $quote->code }}</p>
                </div>
            </div>
        </div>
    </div>

        <div class="col-xs-6">
            <div class="row row-padding">
            <table  class="table header-table">
                <tr>
                    <td><strong>Para:</strong></td>
                    <td>{{ strtoupper((isset($quote) and ($quote->consignee_id > 0))? $quote->consignee->name : "") }}</td>
                </tr>
                <tr>
                    <td><strong>Atte:</strong></td>
                    <td>{{ strtoupper(isset($quote) ? $quote->consignee_contact : "") }}</td>
                </tr>
                <tr>
                    <td><strong>Telf/ Fax:</strong></td>
                    <td>{{ (isset($quote) ? $quote->consignee_phone. "/ ". $quote->consignee_fax  : "") }}</td>
                </tr>
                <tr>
                    <td><strong>Email:</strong></td>
                    <td>{{ (isset($quote) ? $quote->consignee_email : "" )}}</td>
                </tr>
            </table>
        </div>
    </div>
    <div align="center" class="row">
        <div class="col-xs-12">
            <p><strong> Cotizaci&oacute;n de Importaci&oacute;n Mar&iacute;tima</strong></p>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6">
            <table  class="table header-table">
                <tr>
                    <td><strong>Condici&oacute;n:</strong></td>
                    <td>Embarque mar&iacute;timo - OCEAN</td>
                </tr>
                <tr>
                    <td><strong>Producto:</strong></td>
                    @foreach($quote->cargo as $detail)
                        <td>{{ strtoupper( $detail->marks ) }}</td>
                    @endforeach
                </tr>
                <tr>
                    <td><strong>Servicios:</strong></td>
                    <td>{{ strtoupper((isset($quote) and ($quote->service_id >0 ))? $quote->service->name   : "") }}</td>
                </tr>
                <tr>
                    <td><strong>Tipo de Equipo: </strong></td>
                    <td>{{ strtoupper((isset($quote) and ($quote->total_cargo_type_id > 0)) ? $quote->total_cargo_type->code : "" )}}</td>
                </tr>
                <tr>
                    <td><strong>Naviera: </strong></td>
                    <td>{{ strtoupper((isset($quote) and ($quote->carrier_id > 0)) ? $quote->carrier->name : "" )}}</td>
                </tr>
            </table>
        </div>
        <div class="col-xs-6">
            <table  class="table header-table">
                <tr>
                    <td><strong>Origen:</strong></td>
                    <td>{{ strtoupper((isset($quote) and ($quote->place_receipt_id > 0)) ? $quote->place_receipt->name : "" )}}</td>
                </tr>
                <tr>
                    <td><strong>Destino:</strong></td>
                    <td> {{ strtoupper((isset($quote) and ($quote->place_delivery_id > 0)) ? $quote->place_delivery->name : "" )}}</td>
                </tr>
            </table>
        </div>
    </div>
    <div align="left" class="row">
        <div class="col-xs-12">
            <p><strong> ORIGIN CHARGES</strong></p>
        </div>
    </div>
    <div class="row row padding">
        <div class="col-xs-12">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <td><strong>BILLING CODE</strong></td>
                        <td><strong>TYPE</strong></td>
                        <td><strong>QTY.</strong></td>
                        <td><strong>UNIT</strong></td>
                        <td><strong>RATE</strong></td>
                        <td><strong>CURRENCY</strong></td>
                        <td><strong>AMOUNT</strong></td>
                        <td><strong>NOTE</strong></td>
                    </tr>
                </thead>
                <tbody>
                @foreach($quote->origin_charge as $detail)

                    <tr>
                        <td width="30%">{{ strtoupper($detail->billing_id > 0 ? $detail->billing->name : "") }}</td>
                        <td width="10%">{{ ($detail->bill_type == "C" ? "COLLECTED" : "PREPAID") }}</td>
                        <td width="10%">{{ $detail->billing_quantity }}</td>
                        <td width="10%">{{ ($detail->billing_unit_id > 0 ? $detail->billing_unit->code : "") }}</td>
                        <td width="10%">{{ $detail->billing_rate }}</td>
                        <td width="10%">{{ ($detail->billing_currency_type > 0 ? $detail->billing_currency->code : "") }}</td>
                        <td width="10%">{{ $detail->billing_amount }}</td>
                        <td width="20%">{{ $detail->billing_notes }}</td>

                    </tr>

                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="6" style="text-align: right"><strong>TOTAL (USD):</strong> </td>
                    <td colspan="2"><strong>{{  $quote->sum_bill  }}</strong></td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6">
            <table class="table header-table">
                <tr>
                    <td><strong>Tr&aacute;nsito: </strong></td>
                    <td >{{ $quote->transit_day }} d&iacute;as aproximadamente</td>
                </tr>
                <tr>
                    <td width="15%"><strong>Vigencia: </strong></td>
                    <td width="35%">{{ $quote->valid_date  }}</td>
                </tr>
            </table>
        </div>
        <div class="col-xs-6">
            <table class="table header-table">
                <tr>
                    <td width="15%"><strong>Frecuencia: </strong></td>
                    <td width="35%">{{ ($quote->frequency == "1"? "DAILY" : ($quote->frequency == "2")? "WEEKLY" : ($quote->frequency == "3" ? "BIWEEKLY" :  ($quote->frequency == "4"? "MONTHLY" : "ANNUALLY")) ) }}</td>
                </tr>
            </table>
        </div>
    </div>
    <div align="left" class="row">
        <div class="col-xs-12">
            <p><strong> DESTINATION CHARGES</strong></p>
        </div>
    </div>
    <div class="row row padding">
        <div class="col-xs-12">
            <table class="table table-condensed">
                <thead>
                <tr>
                    <td><strong>BILLING CODE</strong></td>
                    <td><strong>TYPE</strong></td>
                    <td><strong>QTY.</strong></td>
                    <td><strong>UNIT</strong></td>
                    <td><strong>RATE</strong></td>
                    <td><strong>CURRENCY</strong></td>
                    <td><strong>AMOUNT</strong></td>
                    <td><strong>NOTE</strong></td>
                </tr>
                </thead>
                <tbody>
                @foreach($quote->destination_charge as $detail)

                    <tr>
                        <td width="30%">{{ strtoupper($detail->billing_id > 0 ? $detail->billing->name : "") }}</td>
                        <td width="10%">{{ ($detail->bill_type == "C" ? "COLLECTED" : "PREPAID") }}</td>
                        <td width="10%">{{ $detail->billing_quantity }}</td>
                        <td width="10%">{{ ($detail->billing_unit_id > 0 ? $detail->billing_unit->code : "") }}</td>
                        <td width="10%">{{ $detail->billing_rate }}</td>
                        <td width="10%">{{ ($detail->billing_currency_type > 0 ? $detail->billing_currency->code : "") }}</td>
                        <td width="10%">{{ $detail->billing_amount }}</td>
                        <td width="20%">{{ $detail->billing_notes }}</td>
                    </tr>

                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="6" style="text-align: right"><strong>TOTAL (USD):</strong> </td>
                    <td colspan="2"><strong>{{  $quote->dest_sum_bill  }}</strong></td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
</body>

</html>
