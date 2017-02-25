<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ $type == 1 ? 'Cargo Received Report' : ($type == 2) ? 'Cargo On Hand Report' : 'Cargo ShippedReport' }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 3.3.5 -->
    {!! Html::style('css/metro-bootstrap.min.css') !!}

<!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Custom CSS -->
    {!! Html::style('css/report.css') !!}

    <!-- Font Awesome -->
    {!! Html::style('css/font-awesome.min.css') !!}

    <!-- Ionicons -->
    {!! Html::style('css/ionicons.min.css') !!}
</head>

<body>
<div class="container-fluid">
    <?php $qty = 0; $weight = 0; $cubic = 0; $volume = 0 ?>
    <div class="row row-padding">
        <div class="col-xs-6">
            <div class="company-info">
                <h5><strong>VECO LOGISTICS MIAMI INC.</strong></h5>
                <p>7270 NW 35 TERRACE</p>
                <p>MIAMI, FLORIDA 33122</p>
                <p>Phone: 305-5992703 / Fax: 305-5992925</p>
                <br/>
                <p>Printed on: {{ \Carbon\Carbon::now()->toDateString() }}</p>
                <p>Printed by: {{ auth()->user()->username }}</p>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="row">
                <div class="document-info pull-right">
                    <h5><strong>{{ $type == 1 ? 'Cargo Received Report' : ($type == 2) ? 'Cargo On Hand Report' : 'Cargo ShippedReport' }}</strong></h5>
                    <p class="document_number">{{ $date }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row row-padding">
        <div class="col-xs-12">
            <table class="table-report">
                <thead>
                    <th>Dest</th>
                    <th>Date</th>
                    <th>WR #</th>
                    <th>Shipper</th>
                    <th>Consignee</th>
                    @if($type == 1)
                        <th class="number">Qty</th>
                        <th class="number">Weight</th>
                        <th class="number">Cubic</th>
                        <th class="number">Vol. Weight</th>
                    @endif
                </thead>
                <tbody>
                @foreach($report as $receipt_entry)
                    <tr>
                        {{--<td>{{ check_text($receipt_entry->location_destination_id, $receipt_entry->destination->code) }}</td>--}}
                        <td></td>
                        <td>{{ $receipt_entry->date_in }}</td>
                        <td>{{ $receipt_entry->code }}</td>
                        <td>{{ check_text($receipt_entry->shipper_id, $receipt_entry->shipper->name) }}</td>
                        <td>{{ check_text($receipt_entry->consignee_id, $receipt_entry->consignee->name) }}</td>
                        @if($type == 1)
                            <td class="number">{{ $receipt_entry->cargo_details->sum('quantity') }}</td>
                            <td class="number">{{ $receipt_entry->cargo_details->sum('total_weight') }} Lbs.</td>
                            <td class="number">{{ $receipt_entry->cargo_details->sum('cubic') }} Cft.</td>
                            <td class="number">{{ $receipt_entry->cargo_details->sum('volume_weight') }} Lbs.</td>
                        @endif
                        <?php
                            $qty    += $receipt_entry->cargo_details->sum('quantity');
                            $weight += $receipt_entry->cargo_details->sum('total_weight');
                            $cubic  += $receipt_entry->cargo_details->sum('cubic');
                            $volume += $receipt_entry->cargo_details->sum('volume_weight');
                        ?>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td class="has-child" colspan="{{ $type == 1 ? 7 : 9 }}">
                            <table class="table-report child">
                                <thead>
                                    <th class="number">Qty.</th>
                                    <th>Cargo Type</th>
                                    <th class="number">Length</th>
                                    <th class="number">Width</th>
                                    <th class="number">Height</th>
                                    <th class="number">Total Weight</th>
                                    <th>Unit</th>
                                    <th class="number">Cubic</th>
                                    <th>Unit</th>
                                    @if($type == 2)
                                        <th class="number">Vol. Weight</th>
                                        <th>Unit</th>
                                    @endif
                                    @if($type == 3)
                                        <th>Mode</th>
                                        <th>Reference</th>
                                        <th>Date Out</th>
                                    @endif
                                </thead>
                                <tbody>
                                @foreach($receipt_entry->cargo_details as $detail)
                                    <tr>
                                        <td class="number">{{ $detail->quantity }}</td>
                                        <td>{{ check_text($detail->cargo_type_id, $detail->cargo_type->code) }}</td>
                                        <td class="number">{{ $detail->length }}</td>
                                        <td class="number">{{ $detail->width }}</td>
                                        <td class="number">{{ $detail->height }}</td>
                                        <td class="number">{{ $detail->total_weight }}</td>
                                        <td>{{ $detail->weight_unit_measurement_id == 'L' ? 'Lbs.' : 'Kgs' }}</td>
                                        <td class="number">{{ $detail->cubic }}</td>
                                        <td>Cft.</td>
                                        @if($type == 2)
                                            <td class="number">{{ $detail->volume_weight }}</td>
                                            <td>Lbs</td>
                                        @endif
                                        @if($type == 3)
                                            <td>OCEAN</td>
                                            <td>{{ $receipt_entry->shipping_references->count() > 0 ? 'BL#:'.$receipt_entry->shipping_references->first()->reference_number : '' }}</td>
                                            <td></td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                                @if($type != 1)
                                    <tfoot style="border-top: 1px solid #ccc">
                                        <th class="number"><strong>{{ $receipt_entry->cargo_details->sum('quantity') }}</strong></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th class="number"><strong>{{ $receipt_entry->cargo_details->sum('total_weight') }}</strong></th>
                                        <th>Lbs.</th>
                                        <th class="number"><strong>{{ $receipt_entry->cargo_details->sum('cubic') }}</strong></th>
                                        <th>Cft.</th>
                                        @if($type == 2)
                                            <th class="number"><strong>{{ $receipt_entry->cargo_details->sum('volume_weight') }}</strong></th>
                                            <th>Lbs.</th>
                                        @endif
                                    </tfoot>
                                @endif
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="border-top: 1px solid #ccc" colspan="9"></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="break col-xs-offset-9 col-xs-3">
            <table class="resume-report">
                <tbody>
                    <tr>
                        <td width="80%" class="header"><b>Total Warehouses</b></td>
                        <td class="number">{{ $report->count() }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="row row-padding">
            <div class="break col-xs-offset-6 col-xs-6">
                <table class="grant-total">
                    <thead>
                    <th class="number">Qty</th>
                    <th class="number">Weight</th>
                    <th class="number">Cubic</th>
                    <th class="number">Vol.Weight</th>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="number">{{ $qty }}</td>
                        <td class="number">{{ round($weight * 0.453592, 3) }} Kgs.</td>
                        <td class="number">{{ round($cubic * 0.02831685, 3) }} Cbm.</td>
                        <td class="number">{{ round($volume * 0.453592, 3) }} Kgs.</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="number">{{ $weight }} Lbs.</td>
                        <td class="number">{{ $cubic }} Cft.</td>
                        <td class="number">{{ $volume }} Lbs.</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>

</html>
