<!DOCTYPE html>
<html lang="en">
<head>
    <title>DO- {{ strtoupper($bill_of_lading->booking_code) }}</title>
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
                    <h5><strong>DELIVERY ORDER</strong></h5>
                    <p class="document_number"><strong>BOOKING # {{ strtoupper($bill_of_lading->booking_code) }}</strong></p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-6">
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">DELIVERY CARRIER</div>
                        <div class="panel-body" style="height:100px;">
                            <table class="table resume-table">
                                <tr>
                                    <td width="20%">
                                        <p> {{ strtoupper($bill_of_lading->carrier_id > 0 ? $bill_of_lading->carrier->name : "") }}</p>
                                        <p> {{ strtoupper($bill_of_lading->port_loading_id > 0 ? $bill_of_lading->loading->name : "") }}</p>

                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">CONSIGNEE</div>
                        <div class="panel-body" style="height:100px;">
                            <table class="table resume-table">
                                <tr><td width="20%"><strong>Name:</strong></td><td>{{ strtoupper($bill_of_lading->consignee_id >0 ? $bill_of_lading->consignee->name : "")  }}</td>
                                <tr><td width="20%"><strong>Address:</strong></td><td>{{ strtoupper($bill_of_lading->consignee_id >0 ? $bill_of_lading->consignee->address : "")  }}</td>
                                <tr><td width="20%"><strong>City:</strong></td><td>{{ strtoupper($bill_of_lading->consignee_id >0 ? $bill_of_lading->consignee->city : "")  }}</td>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-6">
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">SHIPPER</div>
                        <div class="panel-body" style="height:100px;">
                            <p>{{ strtoupper(($bill_of_lading->shipper_id >0 ? $bill_of_lading->shipper->name : "")) }}</p>
                            <p>{{ strtoupper(($bill_of_lading->shipper_id >0 ? $bill_of_lading->shipper->address : "")) }}</p>
                            <p>{{ strtoupper(($bill_of_lading->shipper_id >0 ? $bill_of_lading->shipper->city : "")) }} </p>
                            <p>{{ ($bill_of_lading->shipper_state_id > 0) ? strtoupper($bill_of_lading->shipper_state->name) : "" }} {{ ($bill_of_lading->shipper_zip_code_id > 0) ? $bill_of_lading->shipper_zip_code->code : "" }}</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default" style="height:120px;">
                        <table class="table resume-table" >
                            <tr><td width="20%"><strong>FILE: </strong></td><td>{{ strtoupper($bill_of_lading->shipment_id > 0 ? $bill_of_lading->shipment->code : "")}}</td></tr>
                            <tr><td width="25%"><strong>MBL# / HBL#: </strong></td><td>{{ strtoupper($bill_of_lading-> code) }}</td></tr>
                            <tr><td width="20%"><strong>VESSEL: </strong></td><td>{{ strtoupper($bill_of_lading->vessel_name )}}</td></tr>
                            <tr><td width="20%"><strong>VOYAGE: </strong></td><td>{{ strtoupper($bill_of_lading->voyage_name )}}</td></tr>
                            <tr>
                                <td width="20%"><strong>ORIGIN: </strong></td>
                                <td>{{ strtoupper(($bill_of_lading->port_loading_id >0 ? $bill_of_lading->loading->code : ""))}}</td>
                                <td width="20%"><strong>DEST: </strong></td>
                                <td>{{ strtoupper(($bill_of_lading->port_unloading_id >0 ? $bill_of_lading->unloading->code: ""))}}</td></tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>

    <br>
    <div class="row">
        <div class="col-xs-12">
            <table class="table table-condensed">
                <thead>
                <tr>
                    <th width="20%">MARKS / NUMBERS</th>
                    <th width="10%">PCS</th>
                    <th width="40%">DESCRIPTION OF COMMODITIES</th>
                    <th width="15%">WEIGHT</th>
                    <th width="15%">CUBIC</th>
                </tr>
                </thead>
                <tbody>
                @foreach($bill_of_lading->cargo as $detail)
                    <tr>
                        <td  height="100px" >
                            <?php echo nl2br(str_replace("-", "\n", strtoupper($detail->cargo_marks))); ?>
                        </td>
                        <td align="right" >{{ $detail->cargo_pieces }}</td>

                        <td align="left" >
                            @if($bill_of_lading->bl_class == 3)
                                <?php echo nl2br(str_replace(",", "\n",strtoupper( $detail->cargo_description))); ?>
                            @else
                                @for ($x =0; $x < count($result); $x++)
                                    <?php  echo nl2br($result[$x]['warehouse_code']." ". $result[$x]['detail']."\n"); ?>
                                @endfor
                            @endif
                        </td>
                        <td align="right">
                            {{ $detail->cargo_weight_k}} &nbsp; Kgs<br>{{ $detail->cargo_gross_weight}}&nbsp;Lbs
                        </td>
                        <td align="right">
                            {{ $detail->cargo_cubic_k}} &nbsp; Cbm<br>{{ $detail->cargo_cubic}}&nbsp;Cft
                        </td>
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
                <tbody>
                <tr>
                    <td width="20%"><strong>TOTALS: </strong></td>
                    <td width="10%" align="right">{{ $bill_of_lading->total_pieces }}</td>
                    <td width="40%"></td>
                    <td width="15%" align="right">{{ round($bill_of_lading->total_gross_weight* 0.453592, 3)}} Kgs</td>
                    <td width="15%" align="right">{{ round ($bill_of_lading->total_cubic* 0.0283168, 3)}} Cbm</td>
                </tr>
                <tr>
                    <td width="20%"></td>
                    <td width="10%"></td>
                    <td width="40%"></td>
                    <td width="15%" align="right">{{ $bill_of_lading->total_gross_weight}} Lbs</td>
                    <td width="15%" align="right">{{ $bill_of_lading->total_cubic}} Cft</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel-body">
                <p><strong>COMMENTS: </strong></p>
                <p> {{ $bill_of_lading->bl_comments }}</p>
            </div>
        </div>
    </div>
    <br> <br> <br> <br>
    <br> <br> <br> <br>
    <div class="col-xs-12">
        <table class="table header-table">
            @if($type == "14")
                <tr>
                    <td colspan="2"><strong>Carrier/Driver Instruction</strong></td>
                </tr>
                <tr>
                    <td height="20px"></td>
                </tr>
                <tr>
                    <td width="10%"><strong>Pickup By:</strong></td>
                    <td colspan="2" style="border-bottom:1px solid;"></td>
                </tr>
                <tr>
                    <td height="15px"></td>
                </tr>
                <tr>
                    <td width="10%"><strong>Date:</strong></td>
                    <td width="20%" style="border-bottom:1px solid;"></td>
                    <td width="20%"></td>
                    <td width="15%"><strong>Signature:</strong></td>
                    <td width="35%" style="border-bottom:1px solid;"></td>

                </tr>
            @else
                <tr>
                    <td colspan="3" width="10%"><strong>Shipline Agent Note: </strong></td>
                    <td colspan="2" style="font-size:12px; "><strong> Delivering {{ ($type == '8'?  " Documents and Freight": ($type == "12" ? "Documents Only": "Freight Only" ) )}}</strong></td>
                </tr>

                <tr>
                    <td height="20px" colspan="5"><strong>The Goods Here in Described Are Accepted Apparently in Good Order and Condition</strong></td>
                </tr>
                <tr>
                    <td height="10px"></td>
                </tr>
                <tr>
                    <td width="10%" colspan="2"><strong>Received By: </strong></td>
                    <td colspan="2" width="20%"  style="border-bottom: 1px solid; "></td>
                </tr>
                <tr>
                    <td height="10px"></td>
                </tr>
                <tr>
                    <td width="5%"><strong>Date: </strong></td>
                    <td colspan="3" width="15%" style="border-bottom: 1px solid; "></td>
                    <td width="30%"></td>
                </tr>
            @endif


        </table>
    </div>
</div>
</body>

</html>