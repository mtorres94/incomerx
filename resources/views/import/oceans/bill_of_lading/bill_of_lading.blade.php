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
    </div>
    <div class="row">
        <div class="col-xs-5">
            <div class="panel panel-default">
                <div class="panel-heading">SHIPPER</div>
                <div class="panel-body">
                    <p>{{ strtoupper($bill_of_lading->shipper_id > 0 ? $bill_of_lading->shipper->name : "") }}</p>
                    <p>{{ strtoupper($bill_of_lading->shipper_address) }}</p>
                    <p>{{ strtoupper($bill_of_lading->shipper_city) }} {{ ($bill_of_lading->shipper_state_id > 0) ? ', '.strtoupper($bill_of_lading->shipper_state->name) : "" }} {{ ($bill_of_lading->shipper_zip_code_id > 0) ? ', '.strtoupper($bill_of_lading->shipper_zip_code->code) : ""  }}</p>
                    <p>Phone: {{ $bill_of_lading->shipper->phone }} / Fax: {{ $bill_of_lading->shipper->fax }}</p>
                </div>
            </div>
        </div>
        <div class="col-xs-7">
            <table class="table resume-table">
                <tr>
                    <td width="20%"><strong>REFERENCE: </strong></td>
                    <td width="30%">{{ $bill_of_lading->our_reference }}</td>
                    <td width="20%"><strong>HBL NUMBER: </strong></td>
                    <td width="30%">{{ $bill_of_lading->code }}</td>
                </tr>
                <tr>
                    <td width="20%"><strong>FILE #: </strong></td>
                    <td width="30%">{{ $bill_of_lading->document_number }}</td>
                    <td width="20%"><strong>DATE: </strong></td>
                    <td width="30%">{{ $bill_of_lading->bl_date }}</td>
                </tr>
                <tr>
                    <td width="20%"><strong>FMC NUMBER </strong></td>
                    <td width="30%">{{ $bill_of_lading->fmc_number }}</td>
                </tr>
            </table>

        </div>
    </div>
    <div class="row">
        <div class="col-xs-5">
            <div class="panel panel-default">
                <div class="panel-heading">CONSIGNEE</div>
                <div class="panel-body">
                    <p>{{ strtoupper($bill_of_lading->consignee_id > 0 ? $bill_of_lading->consignee->name : "") }}</p>
                    <p>{{ strtoupper($bill_of_lading->consignee_address) }}</p>
                    <p>{{ strtoupper($bill_of_lading->consignee_city) }} {{ ($bill_of_lading->consignee_state_id > 0) ? ', '.strtoupper($bill_of_lading->consignee_state->name) : "" }} {{ ($bill_of_lading->consignee_zip_code_id > 0) ? ', '.strtoupper($bill_of_lading->consignee_zip_code->code) : ""  }}</p>
                    <p>Phone: {{ $bill_of_lading->consignee->phone }} / Fax: {{ $bill_of_lading->consignee->fax }}</p>
                </div>
            </div>
        </div>
        <div class="col-xs-5">
            <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">FORWARDING AGENT</div>
                <div class="panel-body">
                    <p>{{ strtoupper($bill_of_lading->forwarding_agent_id > 0 ? $bill_of_lading->forwarding_agent->name : "") }}</p>
                    <p>{{ strtoupper($bill_of_lading->forwarding_agent_id > 0 ? $bill_of_lading->forwarding_agent_address :"") }}</p>
                    <p>{{ strtoupper($bill_of_lading->forwarding_agent_id > 0? $bill_of_lading->forwarding_agent_city : "") }} {{ ($bill_of_lading->forwarding_agent_id > 0) ? ', '.strtoupper($bill_of_lading->forwarding_agent->state->name) : "" }} {{ ($bill_of_lading->forwarding_agent_id > 0) ? ', '.strtoupper($bill_of_lading->forwarding_agent->zip_code->code) : ""  }}</p>
                    <p>Phone: {{ ($bill_of_lading->forwarding_agent_id > 0 ? $bill_of_lading->forwarding_agent->phone  : "")}} / Fax: {{ ($bill_of_lading->forwarding_agent_id >0 ? $bill_of_lading->forwarding_agent->fax : "") }}</p>
                </div>
            </div>
            </div>
            <div class="row">
                  <p class="document_number">{{ strtoupper($bill_of_lading->export_reference) }} </p>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-xs-5">
            <div class="panel panel-default">
                <div class="panel-heading">NOTIFY</div>
                <div class="panel-body">
                    <p>{{ strtoupper($bill_of_lading->notify_id > 0 ? $bill_of_lading->notify->name : "") }}</p>
                    <p>{{ strtoupper($bill_of_lading->notify_address) }}</p>
                    <p>{{ strtoupper($bill_of_lading->notify_city) }} {{ ($bill_of_lading->notify_state_id > 0) ? ', '.strtoupper($bill_of_lading->notify_state->name) : "" }} {{ ($bill_of_lading->notify_zip_code_id > 0) ? ', '.strtoupper($bill_of_lading->notify_zip_code->code) : ""  }}</p>
                    <p>Phone: {{ ($bill_of_lading->notify_id > 0 ? $bill_of_lading->notify->phone : "")  }} / Fax: {{ ($bill_of_lading->notify_id > 0 ? $bill_of_lading->notify->fax : "") }}</p>
                </div>
            </div>
        </div>
        <div class="col-xs-4"></div>
        <div class="col-xs-3"></div>
    </div>
    <div class="row">
        <div class="col-xs-12">
        <table class="table resume-table">
            <tr>
                <td width="12%"><strong>Pre-Carriage by: </strong></td>
                <td>{{ strtoupper($bill_of_lading->pre_carriage_by) }}</td>
                <td width="12%"><strong>Place of receipt: </strong></td>
                <td>{{ strtoupper($bill_of_lading->place_receipt) }}</td>
            </tr>
            <tr>
                <td width="12%"><strong>Exporting Carrier: </strong></td>
                <td>{{ strtoupper($bill_of_lading->exporting_carrier) }}</td>
                <td width="12%"><strong>Port of Loading: </strong></td>
                <td>{{ strtoupper($bill_of_lading->port_loading) }}</td>
            </tr>
            <tr>
                <td width="10%"><strong>Foreign Port: </strong></td>
                <td>{{ strtoupper($bill_of_lading->port_unloading) }}</td>
                <td width="15%"><strong>Place of Delivery: </strong></td>
                <td>{{ strtoupper($bill_of_lading->place_delivery) }}</td>
                <td width="15%"><strong>Type of Move: </strong></td>
                <td width="10%">{{ strtoupper($bill_of_lading->type_move) }}</td>
                <td width="10%"><strong>Type: </strong></td>
                <td width="10%">{{ ($bill_of_lading->bl_type == 'C' ? "COLLECTED": "PREPAID") }}</td>
            </tr>
        </table>
    </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>BILLING CODE</th>
                        <th>TYPE</th>
                        <th>QTY.</th>
                        <th>UNIT</th>
                        <th>RATE</th>
                        <th>CURR</th>
                        <th>AMOUNT</th>
                        <th>NOTES</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($bill_of_lading->origin_charge as $detail)
                    <tr>
                        <td width="30%">{{ strtoupper($detail->billing_id > 0 ? $detail->billing->name : "") }}</td>
                        <td width="10%">{{ ($detail->bill_type == "C" ? "COLLECTED" : "PREPAID") }}</td>
                        <td width="10%">{{ $detail->billing_quantity }}</td>
                        <td width="10%">{{ ($detail->billing_unit_id > 0 ? $detail->billing_unit->code : "") }}</td>
                        <td width="10%">{{ $detail->billing_rate }}</td>
                        <td width="10%">{{ ($detail->billing_currency_type > 0 ? $detail->billing_currency->code : "") }}</td>
                        <td width="10%">{{ $detail->billing_amount }}</td>
                        <td width="20%">{{ strtoupper($detail->billing_notes) }}</td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="6" style="text-align: right"><strong>TOTAL (USD):</strong> </td>
                        <td colspan="2"><strong>{{  $bill_of_lading->origin_bill  }}</strong></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

</div>
</body>

</html>
