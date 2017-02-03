<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ $bill_of_lading->code }}</title>
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
                    <h5><strong>ARRIVAL NOTICE / FREIGHT INVOICE</strong></h5>
                    <p class="code-bar">{{ $bill_of_lading->code }}</p>
                    <p class="document_number">{{ $bill_of_lading->code }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <table class="table" >
                <tr>
                    <td width="50%" rowspan="2">
                        <table class="table header-table">
                            <tr><td><strong>SHIPPER</strong></td></tr>
                            <tr><td>{{ strtoupper($bill_of_lading->shipper_id > 0? $bill_of_lading->shipper->name : "") }}</td></tr>
                            <tr><td>{{ strtoupper($bill_of_lading->shipper_id > 0? $bill_of_lading->shipper_address : "") }}</td></tr>
                            <tr><td>{{ strtoupper($bill_of_lading->shipper_id > 0? $bill_of_lading->shipper_city : "") }}</td></tr>
                            <tr><td>{{ strtoupper($bill_of_lading->shipper_state_id > 0? $bill_of_lading->shipper_state->code : "")}}   {{ ($bill_of_lading->shipper_zip_code_id > 0? $bill_of_lading->shipper_zip_code->code : "")  }} </td></tr>
                            <tr><td><strong>Phone: </strong>{{($bill_of_lading->shipper_id > 0? $bill_of_lading->shipper_phone : "") }}</td></tr>

                        </table>
                    </td>
                    <td width="25%">
                        <table class="table header-table">
                            <tr><td><strong>OUR REFERENCE </strong></td></tr>
                            <tr><td> {{ $bill_of_lading->our_reference  }}</td></tr>
                        </table>
                    </td>
                    <td width="25%" colspan="2">
                        <table class="table header-table">
                            <tr><td><strong>DATE </strong></td></tr>
                            <tr><td> {{ $bill_of_lading->date_today  }}</td></tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td width="25%">
                        <table class="table header-table">
                            <tr><td><strong>MASTER BL NO </strong></td></tr>
                            <tr><td> {{ $bill_of_lading->mbl_number  }}</td></tr>
                        </table>
                    </td>
                    <td width="25%" colspan="2">
                        <table class="table header-table">
                            <tr><td><strong>PREPARED BY </strong></td></tr>
                            <tr><td> {{ Auth::user()->username }} </td></tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td width="50%" rowspan="2">
                        <table class="table header-table">
                            <tr><td><strong>CONSIGNEE</strong></td></tr>
                            <tr><td>{{ strtoupper($bill_of_lading->consignee_id > 0? $bill_of_lading->consignee->name : "") }}</td></tr>
                            <tr><td>{{ strtoupper($bill_of_lading->consignee_id > 0? $bill_of_lading->consignee_address : "") }}</td></tr>
                            <tr><td>{{ strtoupper($bill_of_lading->consignee_id > 0? $bill_of_lading->consignee_city : "") }}</td></tr>
                            <tr><td>{{ strtoupper($bill_of_lading->consignee_state_id > 0? $bill_of_lading->consignee_state->code : "")}}   {{ ($bill_of_lading->consignee_zip_code_id > 0? $bill_of_lading->consignee_zip_code->code : "")  }} </td></tr>
                            <tr><td><strong>Phone: </strong>{{($bill_of_lading->consignee_id > 0? $bill_of_lading->consignee_phone : "") }}</td></tr>

                        </table>
                    </td>
                    <td width="25%">
                        <table class="table header-table">
                            <tr><td><strong>CUSTOMER REF NO. </strong></td></tr>
                            <tr><td> {{ $bill_of_lading->customer_reference  }}</td></tr>
                        </table>
                    </td>
                    <td width="25%" colspan="2">
                        <table class="table header-table">
                            <tr><td><strong>HOUSE BL NO. </strong></td></tr>
                            <tr><td> {{ $bill_of_lading->code  }}</td></tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td width="25%">
                        <table class="table header-table">
                            <tr><td><strong>AMS BL NO </strong></td></tr>
                            <tr><td> {{ $bill_of_lading->code  }}</td></tr>
                        </table>
                    </td>
                    <td width="25%" colspan="2">
                        <table class="table header-table">
                            <tr><td><strong>FILE NUMBER </strong></td></tr>
                            <tr><td> {{ Auth::user()->shipment_code }} </td></tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td width="50%" >
                        <table class="table header-table">
                            <tr><td><strong>NOTIFY PARTY</strong></td></tr>
                            <tr><td>{{ strtoupper($bill_of_lading->notify_id > 0? $bill_of_lading->notify->name : "") }}</td></tr>
                            <tr><td>{{ strtoupper($bill_of_lading->notify_id > 0? $bill_of_lading->notify_address : "") }}</td></tr>
                            <tr><td>{{ strtoupper($bill_of_lading->notify_id > 0? $bill_of_lading->notify_city : "") }}</td></tr>
                            <tr><td>{{ strtoupper($bill_of_lading->notify_state_id > 0? $bill_of_lading->notify_state->code : "")}}   {{ ($bill_of_lading->notify_zip_code_id > 0? $bill_of_lading->notify_zip_code->code : "")  }} </td></tr>
                            <tr><td><strong>Phone: </strong>{{($bill_of_lading->notify_id > 0? $bill_of_lading->notify_phone : "") }}</td></tr>

                        </table>
                    </td>
                    <td width="25%" colspan="2">
                        <table class="table header-table">
                            <tr><td><strong>VESSEL </strong></td></tr>
                            <tr><td> {{ $bill_of_lading->vessel_name  }}</td></tr>
                        </table>
                    </td>
                    <td width="25%">
                        <table class="table header-table">
                            <tr><td><strong>VOYAGE </strong></td></tr>
                            <tr><td> {{ $bill_of_lading->voyage_name  }}</td></tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td width="50%" rowspan="2">
                        <table class="table header-table">
                            <tr><td><strong>BROKER</strong></td></tr>
                            <tr><td>{{ strtoupper($bill_of_lading->broker_id > 0? $bill_of_lading->broker->name : "") }}</td></tr>
                            <tr><td>{{ strtoupper($bill_of_lading->broker_id > 0? $bill_of_lading->broker->address : "") }}</td></tr>
                            <tr><td>{{ strtoupper($bill_of_lading->broker_id > 0? $bill_of_lading->broker->city : "") }}</td></tr>

                            <tr><td><strong>Contact: </strong>{{($bill_of_lading->broker_id > 0? $bill_of_lading->broker->contact : "") }}</td></tr>
                            <tr><td><strong>Phone: </strong>{{($bill_of_lading->broker_id > 0? $bill_of_lading->broker_phone : "") }}</td></tr>
                            <tr><td><strong>Fax: </strong>{{($bill_of_lading->broker_id > 0? $bill_of_lading->broker->fax : "") }}</td></tr>

                        </table>
                    </td>
                    <td width="25%" colspan="2">
                        <table class="table header-table">
                            <tr><td><strong>PORT OF LOADING </strong></td></tr>
                            <tr><td> {{ strtoupper($bill_of_lading->port_loading_id > 0 ? $bill_of_lading->port_loading_name->name : "")  }}</td></tr>
                        </table>
                    </td>
                    <td width="25%">
                        <table class="table header-table">
                            <tr><td><strong>ETD </strong></td></tr>
                            <tr><td> {{ $bill_of_lading->departure_date  }}</td></tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td width="25%" colspan="2">
                        <table class="table header-table">
                            <tr><td><strong>PORT OF DISCHARGE </strong></td></tr>
                            <tr><td>{{ strtoupper($bill_of_lading->port_unloading_id > 0 ? $bill_of_lading->port_unloading_name->name : "")  }}</td></tr>
                        </table>
                    </td>
                    <td width="25%">
                        <table class="table header-table">
                            <tr><td><strong>ETA </strong></td></tr>
                            <tr><td> {{ $bill_of_lading->arrival_date }} </td></tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td width="50%" rowspan="2">
                        <table class="table header-table">
                            <tr><td><strong>FREIGHT LOCATION</strong></td></tr>
                            <tr><td>{{ strtoupper($bill_of_lading->location_id > 0? $bill_of_lading->location->name : "") }}</td></tr>
                            <tr><td>{{ strtoupper($bill_of_lading->location_id > 0? $bill_of_lading->location_address : "") }}</td></tr>
                            <tr><td>{{ strtoupper($bill_of_lading->location_id > 0? $bill_of_lading->location_city : "") }}</td></tr>
                            <tr><td>{{ strtoupper($bill_of_lading->location_state_id > 0? $bill_of_lading->location_state->code : "")}}   {{ ($bill_of_lading->location_zip_code_id > 0? $bill_of_lading->location_zip_code->code : "")  }} </td></tr>
                            <tr><td><strong>Contact: </strong>{{ strtoupper($bill_of_lading->location_id > 0? $bill_of_lading->location->contact : "") }}</td></tr>
                            <tr><td><strong>Phone: </strong>{{($bill_of_lading->location_id > 0? $bill_of_lading->location_phone : "") }}</td></tr>
                            <tr><td><strong>Fax: </strong>{{($bill_of_lading->location_id > 0? $bill_of_lading->location->fax : "") }}</td></tr>
                        </table>
                    </td>
                    <td  colspan="3">
                        <table class="table header-table">
                            <tr><td><strong>PLACE OF DELIVERY </strong></td></tr>
                            <tr><td> {{ strtoupper($bill_of_lading->place_delivery_id > 0 ? $bill_of_lading->place_delivery_name->name : "")  }}</td></tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td width="25%" colspan="2">
                        <table class="table header-table">
                            <tr><td><strong>FINAL DESTINATION </strong></td></tr>
                            <tr><td>{{ strtoupper($bill_of_lading->destiny_country_id > 0 ? $bill_of_lading->destiny_country->name : "")  }}</td></tr>
                        </table>
                    </td>
                    <td width="25%">
                        <table class="table header-table">
                            <tr><td><strong>ETA </strong></td></tr>
                            <tr><td> {{ $bill_of_lading->arrival_date }} </td></tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td width="50%" rowspan="2">
                        <table class="table header-table">
                            <tr><td><strong>CONTAINER RETURN LOCATION</strong></td></tr>
                            <tr><td></td></tr>
                            <tr><td></td></tr>
                            <tr><td></td></tr>
                            <tr><td> </td></tr>
                            <tr><td><strong>Contact: </strong></td></tr>
                            <tr><td><strong>Phone: </strong></td></tr>
                            <tr><td><strong>Fax: </strong></td></tr>
                        </table>
                    </td>
                    <td width="17%">
                        <table class="table header-table">
                            <tr><td><strong>GO DATE </strong></td></tr>
                            <tr><td> </td></tr>
                        </table>
                    </td>
                    <td width="17%">
                        <table class="table header-table">
                            <tr><td><strong>LAST FREE DATE</strong></td></tr>
                            <tr><td> </td></tr>
                        </table>
                    </td>
                    <td width="16%">
                        <table class="table header-table">
                            <tr><td><strong>DATE AVAILABLE </strong></td></tr>
                            <tr><td> </td></tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td width="17%">
                        <table class="table header-table">
                            <tr><td><strong>IT NO. </strong></td></tr>
                            <tr><td> </td></tr>
                        </table>
                    </td>
                    <td width="17%">
                        <table class="table header-table">
                            <tr><td><strong>IT. DATE</strong></td></tr>
                            <tr><td> </td></tr>
                        </table>
                    </td>
                    <td width="16%">
                        <table class="table header-table">
                            <tr><td><strong>IT PORT </strong></td></tr>
                            <tr><td> </td></tr>
                        </table>
                    </td>
                </tr>

            </table>
        </div>
    </div>

    <div class="row row padding">
        <div class="col-xs-12">
            <table class="table table-condensed">
                <thead>
                <th  width="30%">CONTAINER NO. / SEAL NO.</th>
                <th  width="10%">NO. OF PKGS</th>
                <th  width="30%">DESCRIPTION OF PACKAGES AND GOODS</th>
                <th  width="15%">GROSS WEIGHT</th>
                <th  width="15%">CUBIC</th>
                </thead>
                <tbody>
                @foreach($bill_of_lading->cargo as $detail)
                    <tr>
                        <td>{{ strtoupper($detail->marks )}}</td>
                        <td>{{ $detail->pieces}}</td>
                        <td>{{ strtoupper($detail->description) }}</td>
                        <td>{{ $detail->grossw }}</td>
                        <td>{{ $detail->cubic }}</td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <td style="text-align: right"><strong>TOTAL: </strong></td>
                    <td><strong>{{ $bill_of_lading->total_pieces}} </strong></td>
                    <td colspan="2" style="text-align: right"><strong>{{ $bill_of_lading->total_weight}} </strong></td>
                    <td><strong>{{ $bill_of_lading->total_cubic}} </strong></td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <div class="row row padding">
        <div class="col-xs-12">
            <table class="table header-table">
                <tr>
                    <td width="10%"><p><strong>COMMODITY:</strong></p></td>
                    <td> {{ strtoupper($bill_of_lading->total_commodity_id ? $bill_of_lading->total_commodity->name : "")}}</td>
                </tr>
                <tr>
                    <td width="10%"><p><strong>COMMENTS:</strong></p></td>
                    <td> {{ strtoupper($bill_of_lading->bill_comments)}}</td>
                </tr>
            </table>
        </div>
    </div>


</div>
</body>

</html>
