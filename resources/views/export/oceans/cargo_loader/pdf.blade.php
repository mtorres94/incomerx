<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cargo Loader {{ $cargo_loader->code }}</title>
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
                    <h5><strong>LOADING PLAN</strong></h5>
                    <p class="code-bar">{{ $cargo_loader->code }}</p>
                    <p class="document_number"><strong>CARGO LOADER # {{ $cargo_loader->code }}</strong></p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">

            <table class="table resume-table">
                <tr>
                    <td><p><strong>FILE #: </strong></p></td>
                    <td><p>{{ strtoupper($cargo_loader->shipment_id >0 ? $cargo_loader->shipment->code: "") }} </p></td>
                    <td><p><strong>ORIGIN: </strong></p></td>
                    <td><p> {{ strtoupper($cargo_loader->port_loading_id >0 ? $cargo_loader->loading->name : "") }}</p></td>
                    <td><p><strong>DATE: </strong></p></td>
                    <td><p> {{ $cargo_loader->date_today }}</p></td>
                </tr>
                <tr>
                    <td><p><strong>BOOKING #: </strong></p></td>
                    <td><p> {{ strtoupper($cargo_loader->booking_code)}}</p></td>
                    <td><p><strong>DEST: </strong></p></td>
                    <td><p> {{ strtoupper($cargo_loader->port_unloading_id >0 ? $cargo_loader->unloading->name : "") }}</p></td>
                    <td><p><strong>ETD: </strong></p></td>
                    <td><p> {{ $cargo_loader->departure_date }} </p></td>
                </tr>
                <tr>
                    <td><p><strong>CARRIER #: </strong></p></td>
                    <td><p> {{ strtoupper($cargo_loader->carrier_id>0 ? $cargo_loader->carrier->name : "") }} </p></td>
                    <td><p><strong>VIA: </strong></p></td>
                    <td><p> {{strtoupper($cargo_loader->place_delivery_id >0 ? $cargo_loader->delivery->name : "")}}</p></td>
                    <td><p><strong>ETA: </strong></p></td>
                    <td><p> {{$cargo_loader->arrival_date}} </p></td>
                </tr>
                <tr>
                    <td><p><strong>VESSEL: </strong></p></td>
                    <td><p> {{strtoupper($cargo_loader->vessel_name) }} </p></td>
                    <td><p><strong>VOYAGE: </strong></p></td>
                    <td><p> {{ strtoupper($cargo_loader->voyage_name) }}</p></td>
                    <td><p><strong>CUT OFF: </strong></p></td>
                    <td><p> {{ $cargo_loader->cut_off_date }}</p></td>
                </tr>
            </table>


               @foreach($cargo_loader->pivote as $pivot)
                <table class="table table-condensed">
                    <thead>
                        <th width="5%" valign="bottom"><strong>WR#</strong></th>
                        <td width="10%" valign="bottom">{{ $pivot->receipt_entry->code }}</td>
                        <th width="10%" valign="bottom"><strong> WR LOC</strong></th>
                        <td width="10%" valign="bottom">{{ strtoupper($pivot->receipt_entry->location_origin_id > 0? $pivot->receipt_entry->origin->name : "") }}</td>
                        <th width="10%" valign="bottom"><strong>SHIPPER: </strong></th>
                        <td width="20%" valign="bottom"> {{ strtoupper($pivot->receipt_entry->shipper_id >0 ? $pivot->receipt_entry->shipper->name : "")}}</td>
                        <th width="10%" valign="bottom"><strong>CONSIGNEE: </strong></th>
                        <td width="20%" valign="bottom"> {{ strtoupper($pivot->receipt_entry->consignee_id >0 ? $pivot->receipt_entry->consignee->name : "")}}</td>
                    </thead>
                   <tbody>
                   <table class="table table-condensed">
                       <thead>
                       <th width="10%">PCS/ TYPE</th>
                       <th width="10%">DIMS</th>
                       <th width="10%">WEIGHT</th>
                       <th width="10%">CUBIC</th>
                       <th width="15%">LOCATION</th>
                       <th width="15%">BIN</th>
                       <th width="10%">PICKED</th>
                       <th width="10%">LOADED</th>
                       <th width="10%">POSITION</th>
                       <th width="5%">HZ</th>
                       </thead>
                       <tbody>
                       @foreach( $pivot->receipt_entry->cargo_details as $cargo_detail)
                           <tr>
                               <td width="10%">{{ $cargo_detail->pieces  }}/ {{ strtoupper($cargo_detail->cargo_type_id >0 ? $cargo_detail->cargo_type->code : "") }}</td>
                               <td width="10%">{{ round($cargo_detail->length)  }}x {{ round($cargo_detail->width)  }}x {{ round($cargo_detail->height)  }}</td>
                               <td width="10%">{{ $cargo_detail->total_weight  }}</td>
                               <td width="10%">{{ $cargo_detail->cubic  }}</td>
                               <td width="15%">{{ strtoupper($cargo_detail->location_id >0 ? $cargo_detail->location->name : "") }}</td>
                               <td width="15%">{{ strtoupper($cargo_detail->location_bin_id >0 ? $cargo_detail->bin->name : "") }}</td>
                               <td width="10%"></td>
                               <td width="10%"></td>
                               <td width="10%"></td>
                               <td width="5%"></td>

                           </tr>
                       @endforeach
                       </tbody>
                   </table>

                   </tbody>

                </table>
                   <table class="table table-condensed">
                       <thead>
                           <th width="10%">{{ $pivot->receipt_entry->sum_pieces }}</th>
                           <th width="10%"></th>
                           <th width="10%">{{ $pivot->receipt_entry->sum_weight}}</th>
                           <th width="10%">{{ $pivot->receipt_entry->sum_cubic}}</th>
                           <td width="15%"></td>
                           <td width="15%"></td>
                           <td width="10%"></td>
                           <td width="10%"></td>
                           <td width="10%"></td>
                           <td width="5%"></td>

                       </thead>
                   </table>
                @endforeach



        </div>
    </div>

</div>
</body>

</html>