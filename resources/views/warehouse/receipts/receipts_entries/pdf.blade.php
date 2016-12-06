<!DOCTYPE html>
<html lang="en">
<head>
    <title>Receipt Entry {{ $receipt_entry->code }}</title>
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
                        <h5><strong>WAREHOUSE RECEIPT</strong></h5>
                        <p class="code-bar">{{ $receipt_entry->code }}</p>
                        <p class="document_number">{{ $receipt_entry->code }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-padding">
            <div class="col-xs-6">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">SHIPPER</div>
                            <div class="panel-body">
                                <p>{{ strtoupper($receipt_entry->shipper->name) }}</p>
                                <p>{{ strtoupper($receipt_entry->shipper->address) }}</p>
                                <p>{{ strtoupper($receipt_entry->shipper->city) }} {{ ($receipt_entry->shipper_state_id > 0) ? ', '.strtoupper($receipt_entry->shipper->state->name) : "" }}</p>
                                <p>Phone: {{ $receipt_entry->shipper->phone }} / Fax: {{ $receipt_entry->shipper->fax }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">CONSIGNEE</div>
                            <div class="panel-body">
                                <p>{{ strtoupper($receipt_entry->consignee->name) }}</p>
                                <p>{{ strtoupper($receipt_entry->consignee->address) }}</p>
                                <p>{{ strtoupper($receipt_entry->consignee->city) }} {{ ($receipt_entry->consignee_state_id > 0) ? ', '.strtoupper($receipt_entry->consignee->state->name) : "" }}</p>
                                <p>Phone: {{ $receipt_entry->consignee->phone }} / Fax: {{ $receipt_entry->consignee->fax }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">THIRD PARTY</div>
                            <div class="panel-body">
                                <p>{{ strtoupper($receipt_entry->third_party->name) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6">
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-6">{!! Form::bsLabel($receipt_entry->commercial_inv, 'Commercial Invoice') !!}</div>
                                <div class="col-xs-6">{!! Form::bsLabel($receipt_entry->extra_length, 'Extra Length') !!}</div>
                                <div class="col-xs-6">{!! Form::bsLabel($receipt_entry->packing_list, 'Packing List') !!}</div>
                                <div class="col-xs-6">{!! Form::bsLabel($receipt_entry->extra_width, 'Extra Width') !!}</div>
                                <div class="col-xs-6">{!! Form::bsLabel($receipt_entry->heat_treated, 'Heat Treated') !!}</div>
                                <div class="col-xs-6">{!! Form::bsLabel($receipt_entry->extra_height, 'Extra Height') !!}</div>
                                <div class="col-xs-6">{!! Form::bsLabel($receipt_entry->hazardous, 'Hazardous') !!}</div>
                                <div class="col-xs-6">{!! Form::bsLabel($receipt_entry->extra_heavy, 'Extra Heavy') !!}</div>
                                <div class="col-xs-6">{!! Form::bsLabel($receipt_entry->haz_documents, 'Haz Documents') !!}</div>
                                <div class="col-xs-6">{!! Form::bsLabel($receipt_entry->haz_labels, 'Haz Labels') !!}</div>
                                <div class="col-xs-6">{!! Form::bsLabel($receipt_entry->fragile, 'Fragile') !!}</div>
                                <div class="col-xs-6">{!! Form::bsLabel($receipt_entry->improper_document, 'Improper Document') !!}</div>
                            </div>
                        </div>
                    </div>
                    <table class="table resume-table">
                        <tr>
                            <td><strong>DATE IN:</strong></td>
                            <td>{{ $receipt_entry->date_in }}</td>
                            <td><strong>EXPIRE:</strong></td>
                            <td>{{ $receipt_entry->expire_date }}</td>
                        </tr>
                        <tr>
                            <td><strong>WH:</strong></td>
                            <td>{{ strtoupper($receipt_entry->warehouse->code) }}</td>
                        </tr>
                        <tr>
                            <td><strong>SHIP TYPE:</strong></td>
                            <td>{{ (
                                (($receipt_entry->mode == "A") ? "AIR" :
                                (($receipt_entry->mode == "O") ? "OCEAN" :
                                (($receipt_entry->mode == "W") ? "WAREHOUSE" :
                                ($receipt_entry->mode == "R" ? "TRUCK" : "TBA"))))
                            ) }}</td>
                        </tr>
                        <tr>
                            <td><strong>ORIGIN:</strong></td>
                            <td>{{ strtoupper($receipt_entry->origin->code) }}</td>
                            <td><strong>DEST:</strong></td>
                            <td>{{ strtoupper($receipt_entry->destination->code) }}</td>
                        </tr>
                        <tr>
                            <td><strong>CARRIER:</strong></td>
                            <td>{{ ($receipt_entry->receiving_carrier_id > 0) ? strtoupper($receipt_entry->carrier->name) : "" }}</td>
                        </tr>
                        <tr>
                            <td><strong>FREIGHT:</strong></td>
                            <td>{{ $receipt_entry->receiving_freight_amt }}</td>
                            <td><strong>CHK#:</strong></td>
                            <td>{{ $receipt_entry->receiving_1_check }}</td>
                        </tr>
                        <tr>
                            <td><strong>COD:</strong></td>
                            <td></td>
                            <td><strong>CHK#:</strong></td>
                            <td>{{ $receipt_entry->receiving_2_check }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="row row-padding">
            <div class="col-xs-8">
                <table class="table table-condensed">
                    <thead>
                        <th width="33%">PO Number</th>
                        <th width="33%">Inv #</th>
                        <th width="33%">Ref Number(s)</th>
                    </thead>
                    <tbody>
                        @foreach($receipt_entry->reference_details as $detail)
                            <tr>
                                <td>{{ $detail->po_number }}</td>
                                <td>{{ $detail->invoice_number }}</td>
                                <td>{{ $detail->ref_number }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-xs-4">
                <table class="table table-condensed">
                    <thead>
                        <th>PRO Number(s)</th>
                    </thead>
                    <tbody>
                    @foreach($receipt_entry->receiving_details as $detail)
                        <tr>
                            <td>{{ $detail->pro_number }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row row padding">
            <div class="col-xs-12">
                <table class="table table-condensed">
                    <thead>
                        <th>Qty</th>
                        <th>Type</th>
                        <th>Length</th>
                        <th>Width</th>
                        <th>Height</th>
                        <th>Cubic</th>
                        <th>Weight</th>
                        <th>Unit</th>
                        <th>Bin</th>
                        <th>Reference</th>
                        <th>Date Out</th>
                    </thead>
                    <tbody>
                    @foreach($receipt_entry->cargo_details as $detail)
                        <tr>
                            <td>{{ $detail->quantity }}</td>
                            <td>{{ $detail->cargo_type->code }}</td>
                            <td>{{ $detail->length }}</td>
                            <td>{{ $detail->width }}</td>
                            <td>{{ $detail->height }}</td>
                            <td>{{ $detail->cubic }}</td>
                            <td>{{ $detail->total_weight }}</td>
                            <td>{{ ($detail->weight_unit_measurement_id == "L") ? "LBS" : "KGS" }}</td>
                            <td>{{ ($detail->location_bin_id > 0) ? $detail->bin->code : "" }}</td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3"><strong>TOTAL PIECES:</strong> {{ $receipt_entry->sum_pieces }}</td>
                            <td colspan="2" style="text-align: right"><strong>WEIGHT:</strong></td>
                            <td>{{ $receipt_entry->sum_weight }} Lbs</td>
                            <td colspan="2" style="text-align: right;"><strong>VOL. WT:</strong></td>
                            <td>{{ $receipt_entry->sum_volume_weight }} Lbs</td>
                            <td style="text-align: right;"><strong>CUBIC:</strong></td>
                            <td>{{ $receipt_entry->sum_cubic }} Cft</td>
                        </tr>
                        <tr>
                            <td/>
                            <td/>
                            <td/>
                            <td/>
                            <td/>
                            <td>{{ round($receipt_entry->sum_weight * 0.453592, 3) }} Kgs</td>
                            <td/>
                            <td/>
                            <td>{{ round($receipt_entry->sum_volume_weight * 0.453592, 3) }} Kgs</td>
                            <td/>
                            <td>{{ round($receipt_entry->sum_cubic * 0.02831685, 3) }} Cbm</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="row row-padding">
            <div class="col-xs-12 footer">
                <p><strong>MARKS:</strong> {{ $receipt_entry->marks }}</p>
                <p><strong>COMMENTS:</strong> {{ $receipt_entry->comments }}</p>
            </div>
        </div>
        <div class="row row-padding">
            <div class="col-xs-12 ">
              <table width="100%">
                  <tr class="footer-sign">
                      <td align="center" valign="center"><p>{{ strtoupper($receipt_entry->receiving_receiving_by )}}</p></td>
                      <td></td>
                      <td align="center" valign="center"><p>{{ strtoupper($receipt_entry->receiving_checked_by) }}</p></td>
                      <td></td>
                      <td align="center" valign="center"><p>{{ $receipt_entry->date_in  }}</p></td>
                  </tr>
                  <tr >
                      <td width="30%" align="center" class="footer-sign-td"><p><strong>RECEIVED BY</strong></p></td>
                      <td width="5%" ></td>
                      <td width="30%" align="center"  class="footer-sign-td"><p><strong>CHECKED BY</strong></p></td>
                      <td width="5%"  ></td>
                      <td width="30%" align="center" class="footer-sign-td"><p><strong>DATE</strong></p></td>
                  </tr>
              </table>
            </div>
        </div>
    </div>
</body>

</html>