<!DOCTYPE html>
<html lang="en">
<head>
    <title>FILE- {{ strtoupper($shipment_entry->code) }}</title>
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
    <style type="text/css">
        .page {
            overflow: hidden;
            page-break-after: always;
        }
    </style>
</head>

<body>
@foreach($shipment_entry->booking as $booking)


<div class="page">
    <div class="row row-padding">
        <div class="col-xs-12">
            <div align="center" class="company-info">
                <h5><strong>VECO LOGISTICS MIAMI INC.</strong></h5>
                <p>7270 NW 35 TERRACE</p>
                <p>MIAMI, FLORIDA 33122</p>
                <p>Phone: 305-5992703 / Fax: 305-5992925</p>
                <p>www.vecologistics.com</p>
                <br/>
                <p>Printed on: {{ \Carbon\Carbon::now()->toDateString() }}</p>
                <p>Printed by: {{ Auth::user()->username }}</p>
                <h5><strong>CONTAINER RELEASE</strong></h5>
            </div>
        </div>
    </div>
    <hr>
    <div class="row" >
        <div class="col-xs-12" >
                <table class="table header-table" align="center">
                    <tr>
                        <td width="20%"><strong>DELIVERING CARRIER: </strong></td>
                        <td align="left">{{ strtoupper($shipment_entry->carrier_id >0 ? $shipment_entry->carrier->name : "")  }}</td>

                    </tr>
                    <tr>
                        <td><strong>DELIVER TO: </strong></td>
                        <td><p>{{ strtoupper($shipment_entry->port_loading_id >0 ? $shipment_entry->port_loading->name : "")  }}</p></td>

                    </tr>
                    <tr>
                        <td><strong>CARRIER PHONE: </strong></td>
                        <td><p>{{ strtoupper($shipment_entry->carrier_id >0 ? $shipment_entry->carrier->phone : "")  }}</p></td>
                    </tr>
                    <tr>
                        <td><strong>CARRIER FAX: </strong></td>
                        <td><p>{{ strtoupper($shipment_entry->carrier_id >0 ? $shipment_entry->carrier->fax : "")  }}</p></td>
                    </tr>
                </table>
        </div>
    </div>
    <div class="row" align="center">
        <div class="col-xs-12">
            <h5>BOOKING # {{ strtoupper($booking->code) }}</h5>
        </div>

    </div>
    <hr>
    <div class="row">
        <div class="col-xs-6">
            <table class="table header-table">
                <tr>
                    <td><strong>FILE #: </strong></td>
                    <td> {{ strtoupper($shipment_entry->code) }}</td>
                </tr>
                <tr>
                    <td><strong>FILE TYPE: </strong></td>
                    <td> {{ strtoupper($shipment_entry->shipment_type) }}</td>
                </tr>
                <tr>
                    <td><strong>SHIPPER: </strong></td>
                    <td>{{ strtoupper($shipment_entry->shipper_id > 0 ?  $shipment_entry->shipper->name : "") }} </td>
                </tr>
                <tr>
                    <td></td>
                    <td>{{ strtoupper($shipment_entry->shipper_address) }} </td>
                </tr>
                <tr>
                    <td></td>
                    <td>{{ strtoupper($shipment_entry->shipper_city) }} {{ strtoupper($shipment_entry->shipper_state_id > 0 ? ", ".$shipment_entry->shipper_state->code : "") }} {{ strtoupper($shipment_entry->shipper_zip_code_id > 0 ? $shipment_entry->shipper_zip_code->code : "") }} </td>
                </tr>
                <tr>
                    <td><strong>CONTACT: </strong></td>
                    <td> Fernando Puga</td>
                </tr>
                <tr>
                    <td><strong>PHONE: </strong></td>
                    <td> 3055992703</td>
                </tr>
            </table>

        </div>
        <div class="col-xs-6">
            <table class="table header-table">
                <tr>
                    <td  width="20%"><strong>VESSEL : </strong></td>
                    <td> {{ strtoupper($shipment_entry->vessel_name) }}</td>
                </tr>
                <tr>
                    <td><strong>VOYAGE : </strong></td>
                    <td> {{ strtoupper($shipment_entry->voyage_name) }}</td>
                </tr>
                <tr>
                    <td><strong>CONSIGNEE: </strong></td>
                    <td>{{ strtoupper($shipment_entry->consignee_id > 0 ?  $shipment_entry->consignee->name : "") }} </td>
                </tr>
                <tr>
                    <td></td>
                    <td>{{ strtoupper($shipment_entry->consignee_address) }} </td>
                </tr>
                <tr>
                    <td></td>
                    <td>{{ strtoupper($shipment_entry->consignee_city) }} {{ strtoupper($shipment_entry->consignee_state_id > 0 ? ", ".$shipment_entry->consignee_state->code : "") }} {{ strtoupper($shipment_entry->consignee_zip_code_id > 0 ? $shipment_entry->consignee_zip_code->code : "") }} </td>
                </tr>
            </table>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-xs-12">
            <table class="table table-condensed">
                <thead>
                <tr>
                    <th width="15%">TYPE</th>
                    <th width="20%">EQUIPMENT NUMBER</th>
                    <th width="10%">SEAL # 1</th>
                    <th width="10%">SEAL # 2</th>
                    <th width="25%">DRAYAGE BY</th>
                    <th width="10%">SPOT DATE</th>
                </tr>
                </thead>
                <tbody>
                @foreach($booking->container as $detail)
                    <tr>
                        <td>{{ ($detail->equipment_type_id >0 ? $detail->equipment_type->code : "") }}</td>
                        <td>{{ strtoupper($detail->container_number) }}</td>
                        <td>{{ strtoupper($detail->container_seal_number ) }}</td>
                        <td>{{ strtoupper($detail->container_seal_number2) }} </td>
                        <td>{{ strtoupper(($detail->carrier_id >0 ? $detail->carrier->name : "")) }}</td>
                        <td>{{ $detail->spotting_date }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-xs-12">
            <table class="table table-condensed">
                <thead>
                <tr>
                    <th width="15%"></th>
                    <th width="10%">QUANTITY</th>
                    <th width="10%">UNIT</th>
                    <th width="15%">TOTAL WEIGHT</th>
                    <th width="10%">TOTAL CUBIC</th>
                    <th width="20%">CARGO TYPE</th>
                    <th width="20%">COMMODITY</th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td><strong>TOTALS: </strong></td>
                    <td>{{ $shipment_entry->total_quantity }}</td>
                    <td>{{ ($shipment_entry->total_unit_weight == "L") ? "LBS" : "KGS" }}</td>
                    <td>{{ ($shipment_entry->total_unit_weight == 'K' ? round($shipment_entry->total_weight  , 3) : round($shipment_entry->total_weight * 0.453592, 3) ) }} Kgs</td>
                    <td>{{ ($shipment_entry->total_unit_weight == 'K' ? round($shipment_entry->total_cubic , 3) : round($shipment_entry->total_cubic * 0.453592, 3) ) }} CBM</td>
                    <td>{{ $shipment_entry->total_cargo_type_id > 0 ?  $shipment_entry->total_cargo_type->code : "" }}</td>
                    <td>{{ $shipment_entry->total_commodity_name }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>{{ ($shipment_entry->total_unit_weight == 'K' ? round($shipment_entry->total_weight * 2.2, 3) : round($shipment_entry->total_weight, 3) ) }} Lbs</td>
                    <td>{{ ($shipment_entry->total_unit_weight == 'K' ? round($shipment_entry->total_cubic * 2.2, 3) : round($shipment_entry->total_cubic, 3) ) }} CFT</td>
                    <td></td>
                    <td></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <td><strong>HAZARDOUS</strong></td>
                        <td><strong>DESCRIPTION</strong></td>
                        <td><strong>NOTES</strong></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($booking->hazardous as $detail)
                        <tr>
                            <td>{{ strtoupper($detail->hzd_uns_id > 0 ?  $detail->hzd_uns->code : "")}}</td>
                            <td>{{ strtoupper($detail->hzd_uns_desc ) }}</td>
                            <td>{{ strtoupper($detail->hzd_uns_note ) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-xs-6">
            <table class="table header-table">
            <tr>
                <td width="15%"><strong>INSTRUCTIONS:</strong></td>
                <td width="35%"> {{ strtoupper($shipment_entry->shipment_comments) }}</td>

            </tr>
            </table>
        </div>
        <div class="col-xs-6">
            <table class="table header-table">
                <tr>
                    <td width="15%"><strong>DRIVER: </strong></td>
                    <td width="35%"> {{ strtoupper($shipment_entry->inland_driver_id > 0 ? $shipment_entry->inland_driver->name : "") }}</td>
                </tr>
                <tr>
                    <td width="15%"><strong>LICENSE/ID: </strong></td>
                    <td width="35%"> {{ strtoupper($shipment_entry->inland_lic_number) }}</td>
                </tr>
            </table>
        </div>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br>
    <div class="row">
        <div class="col-xs-12">
            <table class="table header-table">
                <tr>
                    <td colspan="5"><strong>Received in Good Order</strong></td>
                </tr>
                <tr>
                    <td width="5%"><strong>By: </strong></td>
                    <td width="30%" style="border-bottom: 1px solid #000"></td>
                    <td width="10%" align="right"><strong>Date: </strong></td>
                    <td width="15%" style="border-bottom: 1px solid #000"></td>
                    <td align="right" width="40%"><strong>DELIVERY CLERK: DELIVER TO CARRIER SHOWN ABOVE</strong></td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endforeach
</body>

</html>