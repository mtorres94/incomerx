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
                    <h5><strong>PRE ALERTA</strong></h5>
                    <p class="code-bar">{{ $bill_of_lading->code }}</p>
                    <p class="document_number">{{ $bill_of_lading->code }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6">
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
        <div class="col-xs-6">
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
    </div>

    <div class="row">
        <div class="col-xs-12">
            <table class="table resume-table">
                <tr>
                    <td width="20%"><strong>MANIFEST: </strong></td>
                    <td width="30%">{{ strtoupper($bill_of_lading->shipment_code) }}</td>
                    <td width="20%"><strong>ETD: </strong></td>
                    <td width="30%">{{ $bill_of_lading->departure_date }}</td>
                </tr>
                <tr>
                    <td width="20%"><strong>MBL: </strong></td>
                    <td width="30%">{{ strtoupper($bill_of_lading->mbl_number) }}</td>
                    <td width="20%"><strong>ETA: </strong></td>
                    <td width="30%">{{ $bill_of_lading->arrival_date }}</td>
                </tr>
                <tr>
                    <td width="20%"><strong>HBL: </strong></td>
                    <td width="30%">{{ strtoupper($bill_of_lading->code )}}</td>
                    <td width="20%"><strong>ORIGIN: </strong></td>
                    <td width="30%">{{ strtoupper($bill_of_lading->port_loading) }}</td>
                </tr>
                <tr>
                    <td width="20%"><strong>CARRIER: </strong></td>
                    <td width="30%">{{ strtoupper($bill_of_lading->carrier_id >0 ? $bill_of_lading->carrier->name : "" )}}</td>
                    <td width="20%"><strong>DESTINATION: </strong></td>
                    <td width="30%">{{ strtoupper($bill_of_lading->port_unloading) }}</td>
                </tr>
                <tr>
                    <td width="20%"><strong>FLIGHT: </strong></td>
                    <td width="30%">{{ strtoupper($bill_of_lading->voyage_name)}}</td>
                    <td width="20%"><strong>PIECES: </strong></td>
                    <td width="30%">{{ $bill_of_lading->total_pieces }}</td>
                </tr>
                <tr>
                    <td width="20%"><strong>BL TYPE: </strong></td>
                    <td width="30%">{{ ($bill_of_lading->bl_type == 'C' ? "COLLECTED": "PREPAID")}}</td>
                    <td width="20%"><strong>ACT WEIGHT: </strong></td>
                    <td width="30%">{{ strtoupper($bill_of_lading->total_gross_weight) }}</td>
                </tr>
                <tr>
                    <td width="20%"><strong>COMMODITY: </strong></td>
                    <td width="30%">{{ ($bill_of_lading->total_commodity_id > 0 ? $bill_of_lading->total_commodity->name : "")}}</td>
                    <td width="20%"><strong>VOLUME WEIGHT: </strong></td>
                    <td width="30%">{{ strtoupper($bill_of_lading->total_gross_weight) }}</td>
                </tr>
            </table>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12">
            <table class="table header-table">
                <tbody>
                    <tr>
                        <td>Nota: La fecha de llegada de la nave est&aacute; sujeta a cambios, ya que se puede suscitar alg&uacute;n atraso fortuito.</td>
                    </tr>
                    <tr><td></td></tr>
                    <tr>
                        <td>
                            Por disposición de Gerencia General, no podremos recibir pagos en efectivo, todo pago ser&aacute; efectuado con cheque certificado a la orden de VECO LOGISTICS ECUADOR S.A. RUC # 0992600780001. O para mayor comodidad ponemos a su disposici&oacute;n las siguientes Cuentas Corrientes.</td>
                    </tr>
                    <tr><td></td></tr>
                    <tr>
                        <td>BCO PICHINCHA: CTA. CTE. #3476137304</td>
                    </tr>
                    <tr><td></td></tr>
                    <tr>
                        <td>BCO BOLIVARIANO: CTA. CTE. #0945005360</td>
                    </tr>
                    <tr><td></td></tr>
                    <tr>
                        <td>Para servirle mejor ponemos a disposición las personas quienes le ayudarán con el ingreso al SICE, AVISO DE LLEGADA, FACTURAS y STATUS EN GENERAL.</td>
                    </tr>
                </tbody>
            </table>
            <br>
            <table class="table header-table">
                <tbody>
                <tr>
                    <td width="30%"><strong>OPERACIONES:</strong></td>
                </tr>
                <tr>
                    <td>SR. PEDRO AVILES</td>
                    <td> operaciones.gye@vecologistics.com</td>
                </tr>
                <tr>
                    <td>SRA. ROSAURA PEÑA</td>
                    <td> rpena@vecologistics.com</td>
                </tr>
                <tr><td></td></tr>
                <tr><td></td></tr>
                <tr>
                    <td><strong>CUSTOMER SERVICE:</strong></td>
                </tr>
                <tr>
                    <td>SRA. LISSETTE SALAZAR</td>
                    <td> lsalazar@vecologistics.com</td>
                </tr>
                <tr>
                    <td>SR. JAIME SABANDO</td>
                    <td> ventas3@vecologistics.com</td>
                </tr>
                <tr>
                    <td>SRA. GABRIELA BENAVIDES</td>
                    <td> gbenavides@vecologistics.com</td>
                </tr>
                <tr>
                    <td>SRA. MAYRA MACIAS</td>
                    <td> ventas2@vecologistics.com</td>
                </tr>
                <tr><td></td></tr>
                <tr><td></td></tr>
                <tr>
                    <td><strong>FINANZAS:</strong></td>
                </tr>
                <tr>
                    <td>SR. JORGE CHAGUAY</td>
                    <td> jchaguay@vecologistics.com</td>
                </tr>
                </tbody>
            </table>
            <br>
            <table class="table header-table">
                <tbody>
                <tr>
                    <td>Gracias por confiar en nosotros y como siempre le brindaremos el mejor servicio para todas sus cargas.</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>
</body>

</html>
