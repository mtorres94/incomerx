<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ $routing_order->code }}</title>
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
                    <h5><strong>ROUTING ORDER</strong></h5>
                    <p class="document_number">{{ $routing_order->code }}</p>
                </div>
            </div>
        </div>
    </div>

    <div align="center" class="row">
        <p class="document_number"><strong> ROUTING ORDER / SHIPPING INSTRUCTIONS</strong></p>
    </div>
    <div class="row row-padding">
        <div class="col-xs-12">
            <table  class="table table-bordered"  width="100%">
                <tr>
                    <td width="30%"><strong>TO - ORIGIN AGENT NAME</strong></td>
                    <td  width="70%">{{ strtoupper($routing_order->origin_id >0 ? $routing_order->origin->name : "") }}</td>
                </tr>
                <tr>
                    <td><strong>COUNTRY:</strong></td>
                    <td>{{ strtoupper($routing_order->origin_country_id >0 ? $routing_order->origin_country->name : "") }}</td>
                </tr>
                <tr>
                    <td><strong>ATTENTION:</strong></td>
                    <td>{{ strtoupper($routing_order->origin_contact) }}</td>
                </tr>
                <tr>
                    <td width="25%"><strong>FROM - DESTINATION AGENT NAME</strong></td>
                    <td  width="75%">{{ strtoupper($routing_order->destination_id >0 ? $routing_order->destination->name : "") }}</td>
                </tr>
                <tr>
                    <td><strong>COUNTRY:</strong></td>
                    <td>{{ strtoupper($routing_order->destination_country_id >0 ? $routing_order->destination_country->name : "") }}</td>
                </tr>
                <tr>
                    <td><strong>ATTENTION:</strong></td>
                    <td>{{ strtoupper($routing_order->destination_contact) }}</td>
                </tr>
                <tr>
                    <td><strong>EMAIL:</strong></td>
                    <td>{{ strtoupper($routing_order->destination_email) }}</td>
                </tr>
                <tr>
                    <td><strong>PHONE:</strong></td>
                    <td>{{ strtoupper($routing_order->destination_phone) }}</td>
                </tr>
                <tr>
                    <td><strong>FAX:</strong></td>
                    <td>{{ strtoupper($routing_order->destination_fax) }}</td>
                </tr>
            </table>
        </div>
    </div>
    <div align="center" class="row">
        <p class="document_number"><strong> PLEASE FOLLOW THESE INSTRUCTIONS</strong></p>
    </div>
    <div class="row row-padding">
        <div class="col-xs-12">
            <table  class="table table-bordered"  width="100%">
                <tr>
                    <td width="30%"><strong>ORIGIN</strong></td>
                    <td  width="70%">{{ strtoupper($routing_order->place_receipt_id >0 ? $routing_order->place_receipt->name : "") }}</td>
                </tr>
                <tr>
                    <td width="30%"><strong>FINAL DESTINATION</strong></td>
                    <td  width="70%">{{ strtoupper($routing_order->place_delivery_id >0 ? $routing_order->place_delivery->name : "") }}</td>
                </tr>
                <tr>
                    <td width="30%"><strong>TYPE OF SERVICE</strong></td>
                    <td  width="70%">{{ strtoupper($routing_order->service_id >0 ? $routing_order->service->name : "") }}</td>
                </tr>
                <tr>
                    <td width="30%"><strong>LCL OCEAN TO (or via) MIAMI</strong></td>
                    <td  width="70%">{{ strtoupper($routing_order->lcl_instruction) }}</td>
                </tr>
                <tr>
                    <td width="30%"><strong>AIR AIR VIA MIAMI</strong></td>
                    <td  width="70%">{{ strtoupper($routing_order->air_air_to_miami) }}</td>
                </tr>
                <tr>
                    <td width="30%"><strong>SEA/AIR VIA LA</strong></td>
                    <td  width="70%">{{ strtoupper($routing_order->air_air_to_la) }}</td>
                </tr>
                <tr>
                    <td width="30%"><strong>SEA/AIR VIA MIAMI</strong></td>
                    <td  width="70%">{{ strtoupper($routing_order->sea_air_to_miami) }}</td>
                </tr>
                <tr>
                    <td width="30%"><strong>AIR/SEA VIA MIAMI</strong></td>
                    <td  width="70%">{{ strtoupper($routing_order->air_sea_to_miami) }}</td>
                </tr>
                <tr>
                    <td width="30%"><strong>OTHER ADDITIONAL</strong></td>
                    <td  width="70%">{{ strtoupper($routing_order->other) }}</td>
                </tr>
            </table>
        </div>
    </div>
    <div align="center" class="row">
        <p class="document_number"><strong> CONSIGNEE ON HOUSE BILL OF LADING</strong></p>
    </div>
    <div class="row row-padding">
        <div class="col-xs-12">
            <table  class="table table-bordered"  width="100%">
                <tr>
                    <td width="30%"><strong>COMPANY NAME</strong></td>
                    <td  width="70%">{{ strtoupper($routing_order->consignee_id >0 ? $routing_order->consignee->name : "") }}</td>
                </tr>
                <tr>
                    <td width="30%"><strong>CONTACT NAME</strong></td>
                    <td  width="70%">{{ strtoupper($routing_order->consignee_contact) }}</td>
                </tr>
                <tr>
                    <td width="30%"><strong>ADDRESS</strong></td>
                    <td  width="70%">{{ strtoupper($routing_order->consignee_address) }}</td>
                </tr>
                <tr>
                    <td width="30%"><strong>PHONE</strong></td>
                    <td  width="70%">{{ strtoupper($routing_order->consignee_phone) }}</td>
                </tr>
                <tr>
                    <td width="30%"><strong>FAX</strong></td>
                    <td  width="70%">{{ strtoupper($routing_order->consignee_fax) }}</td>
                </tr>
                <tr>
                    <td width="30%"><strong>EMAIL</strong></td>
                    <td  width="70%">{{ strtoupper($routing_order->consignee_email) }}</td>
                </tr>

            </table>
        </div>
    </div>
    <div align="center" class="row">
        <p class="document_number"><strong> SHIPPER ON HOUSE BILL OF LADING</strong></p>
    </div>
    <div class="row row-padding">
        <div class="col-xs-12">
            <table  class="table table-bordered"  width="100%">
                <tr>
                    <td width="30%"><strong>COMPANY NAME</strong></td>
                    <td  width="70%">{{ strtoupper($routing_order->shipper_id >0 ? $routing_order->shipper->name : "") }}</td>
                </tr>
                <tr>
                    <td width="30%"><strong>CONTACT NAME</strong></td>
                    <td  width="70%">{{ strtoupper($routing_order->shipper_contact) }}</td>
                </tr>
                <tr>
                    <td width="30%"><strong>ADDRESS</strong></td>
                    <td  width="70%">{{ strtoupper($routing_order->shipper_address) }}</td>
                </tr>
                <tr>
                    <td width="30%"><strong>PHONE</strong></td>
                    <td  width="70%">{{ strtoupper($routing_order->shipper_phone) }}</td>
                </tr>
                <tr>
                    <td width="30%"><strong>FAX</strong></td>
                    <td  width="70%">{{ strtoupper($routing_order->shipper_fax) }}</td>
                </tr>
                <tr>
                    <td width="30%"><strong>EMAIL</strong></td>
                    <td  width="70%">{{ strtoupper($routing_order->shipper_email) }}</td>
                </tr>
            </table>
        </div>
    </div>
    <div align="center" class="row">
        <p class="document_number"><strong> SELLING RATE</strong></p>
    </div>
    <div class="row row-padding">
        <div class="col-xs-12">
            <table  class="table table-bordered"  width="100%">
                @foreach ($routing_order->charge as $detail)
                <tr>
                    <td width="30%"><strong>{{ strtoupper( $detail->billing_id > 0 ? $detail->billing->code : "") }}/ AMOUNT</strong></td>
                    <td width="60%">{{ strtoupper($detail->billing_description) }}<br>{{ strtoupper($detail->billing_notes) }}</td>
                    <td width="10%">{{ $detail->billing_amount }}</td>
                </tr>
             @endforeach
            </table>
        </div>
    </div>
    <div align="center" class="row">
        <p class="document_number"><strong> SPECIAL INSTRUCTIONS</strong></p>
    </div>
    <div class="row row-padding">
        <div class="col-xs-12">
            <table  class="table table-bordered"  width="100%">
                    <tr >
                        <td width="30%"><strong>SPECIAL INSTRUCTIONS</strong></td>
                        <td width="70%">{{ strtoupper($routing_order->instructions) }}</td>
                    </tr>
            </table>
        </div>
    </div>
</div>
</body>

</html>
