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
    <div class="row">
        <div class="col-xs-6" align="left"><strong>{{ $bill_of_lading->code }}</strong></div>
        <div class="col-xs-6" align="right"><strong>{{ $bill_of_lading->code }}</strong></div>
    </div>
    <div class="row">
        <table class="table resume-table">
            <tr>
                <td colspan="3" width="30%" style="border-top: 1px solid black; border-left: 1px solid black;"> <p style="font-size: 6px;">Shipper's Name and Address</p></td>
                <td colspan="7" width="20%" style="font-size: 6px; border-top: 1px solid black; border-left: 1px solid black; border-bottom: 1px solid black;">Shipper's Account Number<br><strong>{{ strtoupper($bill_of_lading->shipper_id > 0 ? $bill_of_lading->shipper->code : "") }}</strong></td>
                <td colspan="4" width="15%" style="border-top: 1px solid black; border-left: 1px solid black;"><p style="font-size:6px;">Non Negotiable</p></td>
                <td colspan="7" width="35%" rowspan="2"  style="border-top: 1px solid black; border-right: 1px solid black;">
                    <p>{{ strtoupper($bill_of_lading->issued_by) }}</p>
                </td>
            </tr>
            <tr>
                <td colspan="10" style="border-left: 1px solid black; border-right: 1px solid black;">
                    <p>{{ strtoupper($bill_of_lading->shipper_id > 0 ? $bill_of_lading->shipper->name : "") }}<br>
                        {{  strtoupper($bill_of_lading->shipper_id > 0 ? $bill_of_lading->shipper->address : "") }}<br>
                        {{  strtoupper($bill_of_lading->shipper_id > 0 ? $bill_of_lading->shipper->city : "") }}</p>
                </td>
                <td colspan="4" width="20%"><p style="font-size: 9px;"><strong>Air Waybill</strong></p><p style="font-size:6px;">Issued by</p></td>
            </tr>
            <tr>
                <td colspan="10" style="border-left: 1px solid black; "></td>
                <td colspan="11" style="border-top: 1px solid black; border-left: 1px solid black; border-right: 1px solid black; "><p style="font-size: 6px;">Copies 1, 2 and 3 of this Air Waybill are originals and have the same validity .</p></td>
            </tr>
            <tr>
                <td colspan="3" width="30%" style="border-top: 1px solid black; border-left: 1px solid black;"><p style="font-size: 6px;">Consignee's Name and Address</p></td>
                <td colspan="7" width="20%" style=" font-size: 6px; border-top: 1px solid black; border-left: 1px solid black; border-bottom: 1px solid black;">Consignee's Account Number<br><strong>{{ strtoupper($bill_of_lading->consignee_id > 0 ? $bill_of_lading->consignee->code : "") }}</strong></td>
                <td colspan="11" rowspan="2" style="border-top: 1px solid black; border-left: 1px solid black; border-right: 1px solid black;">
                    <p style="font-size: 6px;">It is agreed that the goods described herein are accepted in apparent good order and condition<br>
                        (except as noted) for carriage SUBJECT TO THE CONDITIONS OF CONTRACT ON THE<br>
                        REVERSE HEREOF. ALL GOODS MAY BE CARRIED BY ANY OTHER MEANS INCLUDING ROAD<br>
                        OR ANY OTHER CARRIER UNLESS SPECIFIC CONTRARY INSTRUCTIONS ARE GIVEN<br>
                        HEREON BY THE SHIPPER, AND SHIPPER AGREES THAT THE SHIPMENT MAY BE CARRIED<br>
                        VIA INTERMIDIATE STOPPING PLACES WHICH THE CARRIER DEEMS APPROPIATE. THE<br>
                        SHIPPER'S ATTENCION IS DRAWN TO THE NOTICE CONCERNING CARRIER'S LIMITATION OF<br>
                        LIABILITY. Shipper may increase such limitation of liability by declaring a higher value for carriage<br>
                        and paying a supplemental charge if required</p>
                </td>
            </tr>
            <tr>
                <td colspan="10" style="border-left: 1px solid black;">
                    <p>{{  strtoupper($bill_of_lading->consignee_id > 0 ? $bill_of_lading->consignee->name : "") }}<br>
                        {{  strtoupper($bill_of_lading->consignee_id > 0 ? $bill_of_lading->consignee->address : "") }}<br>
                        {{  strtoupper($bill_of_lading->consignee_id > 0 ? $bill_of_lading->consignee->city : "") }}</p>
                </td>

            </tr>
            <tr>
                <td colspan="10"  style="border-top: 1px solid black; border-left: 1px solid black;"><p style="font-size: 6px;">Issuing Carrier's Name and City</p></td>
                <td colspan="11" style="border-right: 1px solid black; border-top: 1px solid black;  border-left: 1px solid black; "><p style="font-size: 6px;">Accounting Information</p></td>
            </tr>
            <tr>
                <td colspan="10" style="border-bottom: 1px solid black;  border-left: 1px solid black;">
                    <p>{{ strtoupper($bill_of_lading->issued_id > 0 ? $bill_of_lading->issued->name : "") }}<br>
                        {{  strtoupper($bill_of_lading->issued_id > 0 ? $bill_of_lading->issued->address : "") }}<br>
                        {{  strtoupper($bill_of_lading->issued_id > 0 ? $bill_of_lading->issued->city : "") }}</p>
                </td>
                <td colspan="11" rowspan="2" style="border-bottom: 1px solid black; border-left: 1px solid black; border-right: 1px solid black;">
                    <p>{{ strtoupper(isset($bill_of_lading)? $bill_of_lading->accounting_information : "") }}</p>
                </td>
            </tr>
            <tr>
                <td style="border-bottom: 1px solid black; border-left: 1px solid black;" colspan="3"><p style="font-size: 6px">Agent's IATA Code</p></td>
                <td style="border-bottom: 1px solid black; border-left: 1px solid black;" colspan="7"><p style="font-size: 6px">Account No.</p></td>
            </tr>
            <tr >
                <td height="5px" colspan="10" width="50%" style="font-size: 5px; border-top:1px solid black;border-left:1px solid black; border-right:1px solid black;">Airport of Departure (Addr. of First Carrier) and Requesting Routing</td>
                <td colspan="6" width="20%" style="font-size: 5px; border-top:1px solid black; ">Reference Number</td>
                <td colspan="4" width="15%" style="font-size: 5px; border-top:1px solid black;  border-bottom: 1px solid black; border-left:1px solid black;  border-right:1px solid black;" align="center">Optional Shipping Information</td>
                <td  width="15%" style="border-right:1px solid black;"></td>
            </tr>
            <tr >
                <td height="20px" colspan="10" width="50%"  style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black;">{{ $bill_of_lading->origin_id > 0 ? strtoupper($bill_of_lading->origin->name) : "" }}</td>
                <td colspan="7" width="25%" style="border-bottom:1px solid black; border-right:1px solid black;">{{ $bill_of_lading->shipment_id > 0 ? $bill_of_lading->shipment->code : "" }}</td>
                <td colspan="4" width="25%" style="border-right:1px solid black; border-bottom:1px solid black;"></td>
            </tr>
            <tr>
                <td height="5px" width="5%" style="font-size: 5px;border-left: 1px solid black;">TO</td>
                <td colspan="3" width="29%" style="font-size: 5px; border-left: 1px solid black;">By First Carrier</td>
                <td colspan="2" width="4%" style="font-size: 5px; border-left: 1px solid black;">To</td>
                <td colspan="2" width="4%" style="font-size: 5px; border-left: 1px solid black;">By</td>
                <td width="4%" style="font-size: 5px; border-left: 1px solid black;">To</td>
                <td width="4%" style="font-size: 5px; border-left: 1px solid black;">By</td>

                <td width="5%" style="font-size: 5px; border-left: 1px solid black;"> Currency</td>
                <td width="3%" style=" border-left: 1px solid black; font-size: 5px;" rowspan="2">CHrgs Code<br>{{ $bill_of_lading->awb_type }}</td>
                <td width="3%" style="font-size: 5px; border-left: 1px solid black; border-bottom: 1px solid black;">PPD</td>
                <td width="3%" style="font-size: 5px; border-left: 1px solid black; border-bottom: 1px solid black;">COLL</td>
                <td width="3%" style="font-size: 5px; border-left: 1px solid black; border-bottom: 1px solid black;">PPD</td>
                <td width="3%" style="font-size: 5px; border-left: 1px solid black; border-bottom: 1px solid black;">COLL</td>
                <td colspan="4" width="15%" style="font-size: 5px; border-left: 1px solid black; ">Declared value for Carriage</td>
                <td width="15%" style="font-size: 5px; border-left: 1px solid black; border-right: 1px solid black;">Declared value for Costums</td>
            </tr>
            <tr>
                <td height="20px" width="5%" style="border-left:1px solid black; border-right: 1px solid black; border-bottom:1px solid black;">{{ $bill_of_lading->destination_id > 0 ? strtoupper($bill_of_lading->destination->code) : "" }}</td>
                <td colspan="3" width="29%" style="border-left:1px solid black; border-bottom:1px solid black;">{{ $bill_of_lading->carrier_id >0 ? strtoupper($bill_of_lading->carrier->name) : "" }}</td>
                <td colspan="2" width="4%" style="border-left:1px solid black;  border-bottom:1px solid black;"></td>
                <td colspan="2" width="4%" style="border-left:1px solid black; border-bottom:1px solid black;"></td>
                <td  width="4%" style="border-left:1px solid black;  border-bottom:1px solid black;"></td >
                <td  width="4%" style="border-left:1px solid black; border-bottom:1px solid black;"></td>

                <td width="5%" style="border-left:1px solid black; border-bottom:1px solid black;">{{ $bill_of_lading->currency_id > 0 ? strtoupper($bill_of_lading->currency->code ) : "" }}</td>
                <td width="3%" style="border-left:1px solid black; border-bottom:1px solid black;">{{ $bill_of_lading->awb_type == 'P'? 'P' : "" }}</td>
                <td width="3%" style="border-left:1px solid black; border-bottom:1px solid black;">{{ $bill_of_lading->awb_type == 'C'? 'C' : "" }}</td>
                <td width="3%" style="border-left:1px solid black; border-bottom:1px solid black;">{{ $bill_of_lading->awb_type == 'P'? 'P' : "" }}</td>
                <td width="3%" style="border-left:1px solid black; border-bottom:1px solid black;">{{ $bill_of_lading->awb_type == 'C'? 'C' : "" }}</td>
                <td colspan="4" width="15%" style="border-left:1px solid black; border-bottom:1px solid black;">{{ $bill_of_lading->carriage_value > 0 ? $bill_of_lading->carriage_value : "N.V.D" }}</td>
                <td width="15%" style="border-left:1px solid black; border-bottom:1px solid black; border-right:1px solid black;">{{ $bill_of_lading->customer_value > 0 ? $bill_of_lading->customer_value : "N.V.D" }}</td>
            </tr>
            <tr>
                <td height="5px" colspan="2" width="15%" style="font-size: 5px; border-left:1px solid black; border-right:1px solid black; ">Airport of Destination</td>
                <td width="7%"></td>
                <td colspan="4" width="20%" style="font-size: 5px; border: 1px solid black;">Requested Flight/Date</td>
                <td colspan="3" width="8%"></td>

                <td colspan="4" style="font-size: 5px; border-left: 1px solid black; border-right: 1px solid black;">Amount of Insurance</td>
                <td colspan="7" rowspan="2" style="font-size: 5px; border-right: 1px solid black;">
                    INSURANCE - If carrier offers insurance, and such insurance is<br>
                    requested in acordance with the conditions thereof, indicate amount<br>
                    to be insured in figures in box marked "Amount of insurance"
                </td>
            </tr>
            <tr>
                <td height="20px" colspan="2" width="15%"  style="border-left:1px solid black; border-right:1px solid black; border-bottom:1px solid black;"> {{ $bill_of_lading->destination_id > 0 ? strtoupper($bill_of_lading->destination->name) : "" }}</td>
                <td colspan="3" width="15%" style="border-right: 1px solid black;  border-bottom: 1px solid black;">{{ $bill_of_lading->flight }}/ {{ $bill_of_lading->flight_date }}</td>
                <td colspan="5" width="20%"></td>

                <td colspan="4" style="border-left: 1px solid black;">{{ $bill_of_lading->ins_value > 0 ?  $bill_of_lading->ins_value : "N.I.L"}}</td>
            </tr>
            <tr>
                <td colspan="21" height="5px" style="font-size: 5px; border-left: 1px solid black; border-right: 1px solid black;">Handling Information</td>
            </tr>
            <tr>
                <td colspan="21" height="30px" style=" border-left: 1px solid black; border-right: 1px solid black; ">{{ strtoupper($bill_of_lading->handling_information) }}</td>
            </tr>
            <tr>
                <td colspan="6" height="20px" style="font-size:5px; border-bottom: 1px solid black; border-left: 1px solid black;">These commodities, technology or software were exported from the United States<br>
                    in accordance with the Export Administration Regulations. Ultimate Destination</td>
                <td colspan="7" align="center" style="border-bottom: 1px solid black;">{{ $bill_of_lading->destination_id >0 ? strtoupper($bill_of_lading->destination->name ): "" }}</td>
                <td colspan="5" style="border-bottom: 1px solid black;"></td>
                <td colspan="2" style="font-size: 5px; border-bottom: 1px solid black;">Diversion contrary to<br>U.S. law prohibited</td>
                <td height="20px" style="border-top: 1px solid black; border-bottom: 1px solid black;  border-left: 1px solid black; border-right:1px solid black;"><p style="font-size:5px;">SCI</p> {{ $bill_of_lading->sci_number }}</td>
            </tr>
        </table>
    </div>
    <div class="row">
        <table class="table resume-table" style="margin-top: -5px;">
            <tr>
                <td rowspan="2" align="center" width="5%" style="font-size:5px; border-bottom: 1px solid black; border-left: 1px solid black; border-right: 1px solid black;">No of Pieces RPC</td>
                <td rowspan="2" align="center" width="8%" style="font-size:5px; border-bottom: 1px solid black; border-right: 1px solid black;">Gross Weight</td>
                <td rowspan="2" align="center" width="2%" style="font-size:5px; border-bottom: 1px solid black; border-right: 1px solid black;">kg lb</td>
                <td width="1%" height="5px" style="border-right: 1px solid black;"></td>
                <td width="2%"></td>
                <td width="5%" align="center" style="font-size:5px; border-right: 1px solid black; border-bottom: 1px solid black;">Commodity</td>
                <td width="1%" style="border-right: 1px solid black;"></td>
                <td width="13%" align="center" style="font-size:5px; border-right: 1px solid black;">Chargeable</td>
                <td width="1%" style="border-right: 1px solid black;"></td>
                <td width="10%" align="center" style="font-size:5px; border-right: 1px solid black;">Rate</td>
                <td width="1%" style="border-right: 1px solid black;"></td>
                <td width="20%" align="center" style="font-size:5px; border-right: 1px solid black;" >Total</td>
                <td width="1%" style="border-right: 1px solid black;"></td>
                <td width="30%" rowspan="2" style="font-size:5px; border-right: 1px solid black;" align="center">Nature and Quantity of Goods<br>(incl. Dimensions or Volume)</td>
            </tr>
            <tr>
                <td width="1%" height="5px" style="border-right: 1px solid black;"></td>
                <td width="2%" style="border-right: 1px solid black;"></td>
                <td width="5%" align="center" style="font-size:5px; border-right: 1px solid black; border-bottom: 1px solid black;">Item No</td>
                <td width="1%"  style="border-right: 1px solid black; "></td>
                <td width="13%" align="center" style="font-size:5px; border-right: 1px solid black; border-bottom: 1px solid black;">Weight</td>
                <td width="1%" style="border-right: 1px solid black;"></td>
                <td width="10%" align="center" style="font-size:5px; border-right: 1px solid black; border-bottom: 1px solid black;">Charge</td>
                <td width="1%" style="border-right: 1px solid black;"></td>
                <td width="20%" style=" border-right: 1px solid black; border-bottom: 1px solid black;"></td>
                <td width="1%" style="border-right: 1px solid black;"></td>
            </tr>
            <tr>
                <td height="180px" width="5%" style="border-right:1px solid black; border-left:1px solid black;">{{ $bill_of_lading->total_pieces }}</td>
                <td width="8%" style="border-right:1px solid black;">{{ $bill_of_lading->total_gross_weight}}</td>
                <td width="2%" style="border-right:1px solid black;">{{ $bill_of_lading->total_weight_unit }}</td>
                <td width="1%" style="border-right:1px solid black;"></td>
                <td width="2%" style="border-right:1px solid black;"></td>
                <td width="5%" style="border-right:1px solid black;"></td>
                <td width="1%" style="border-right:1px solid black;"></td>
                <td width="13%" style="border-right:1px solid black;">{{ $bill_of_lading->total_gross_weight }}</td>
                <td width="1%" style="border-right:1px solid black;"></td>
                <td width="10%" style="border-right:1px solid black;">{{ $bill_of_lading->total_gross_weight}}</td>
                <td width="1%" style="border-right:1px solid black;"></td>
                <td width="20%" style="border-right:1px solid black;"> {{ $bill_of_lading->total_rate}}</td>
                <td width="1%" style="border-right:1px solid black;"> {{ $bill_of_lading->sum_total}}</td>
                <td width="30%" style="border-right:1px solid black;" rowspan="2">{{ $bill_of_lading->cargo_notes }}</td>
            </tr>
            <tr>
                <td height="15px" width="5%" style="border-right:1px solid black; border-left:1px solid black;">{{ $bill_of_lading->total_pieces }}</td>
                <td width="8%" style="border-right:1px solid black;">{{ $bill_of_lading->total_gross_weight }}</td>
                <td width="2%" style="border-right:1px solid black;"></td>
                <td width="1%" style="border-right:1px solid black;"></td>
                <td width="2%" style="border-right:1px solid black;"></td>
                <td width="5%" style="border-right:1px solid black;"><strong>TSA#:</strong></td>
                <td width="1%" style="border-right:1px solid black;"></td>
                <td width="13%" style="border-right:1px solid black;"></td>
                <td width="1%" style="border-right:1px solid black;"></td>
                <td width="10%" style="border-right:1px solid black;"></td>
                <td width="1%" style="border-right:1px solid black;"></td>
                <td width="20%" style="border-right:1px solid black;">{{ $bill_of_lading->sum_total}}</td>
                <td width="1%" style="border-right:1px solid black;"> </td>
            </tr>
        </table>
    </div>
    <div class="row">
        <table class="table resume-table" style="margin-top: -5px;">
            <tr>
                <td width="8%" colspan="2" style="font-size: 5px; border-top: 1px solid; border-left: 1px solid; border-right: 1px solid;" align="center">Prepaid</td>
                <td colspan="4" style="font-size: 5px; border-top: 1px solid; border-right: 1px solid;" align="center">Weight Charge</td>
                <td width="8%" colspan="2" style="font-size: 5px; border-top: 1px solid; border-right: 1px solid;" align="center">Collect</td>
                <td width="60%" colspan="7" style="font-size: 5px; border-top: 1px solid; border-right: 1px solid;">Other Charges</td>
            </tr>
            <tr>
                <td colspan="4" height="15px" style="border-top: 1px solid; border-right: 1px solid;  border-left: 1px solid;">{{ round($bill_of_lading->weight_charge_prepaid, 3) }}</td>
                <td colspan="4" height="15px" style="border-top: 1px solid; border-right: 1px solid;">{{ round($bill_of_lading->weight_charge_collected, 3) }}</td>
                <td width="30%" colspan="5" rowspan="5"  ></td>
                <td width="20%" rowspan="5"></td>
                <td rowspan="5" style="border-right: 1px solid;"></td>
            </tr>
            <tr>
                <td width="8%" colspan="2" style="border-right: 1px solid; border-top: 1px solid; border-left: 1px solid; "></td>
                <td colspan="4" width="24%" style="font-size: 5px; border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;" align="center">Validation Charge</td>
                <td width="8%" colspan="2"  style="border-right: 1px solid; border-top: 1px solid;"></td>
            </tr>
            <tr>
                <td colspan="4" height="15px" style="border-right: 1px solid; border-left: 1px solid; ">{{ round($bill_of_lading->valuation_prepaid, 3) }}</td>
                <td colspan="4" height="15px" style="border-right: 1px solid; ">{{ round($bill_of_lading->valuation_collected, 3) }}</td>
            </tr>
            <tr>
                <td width="8%" colspan="2" style="border-right: 1px solid; border-top: 1px solid; border-left: 1px solid; "></td>
                <td colspan="4"  style="font-size: 5px; border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;" align="center">Tax</td>
                <td width="8%" colspan="2" style="border-right: 1px solid; border-top: 1px solid;"></td>
            </tr>
            <tr>
                <td colspan="4" height="15px" style="border-right: 1px solid; border-left: 1px solid; ">{{ round($bill_of_lading->tax_prepaid, 3) }}</td>
                <td colspan="4" height="15px" style="border-right: 1px solid; ">{{ round($bill_of_lading->tax_collected, 3) }}</td>
            </tr>
            <tr>
                <td width="8%" colspan="2" style="border-right: 1px solid; border-top: 1px solid;  border-left: 1px solid; "></td>
                <td colspan="4"  style="font-size: 5px; border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;" align="center">Total Other Charges Due Agent</td>
                <td width="8%" colspan="2" style="font-size: 5px; border-right: 1px solid; border-top: 1px solid;"></td>
                <td width="60%" colspan="7" rowspan="2"  style="font-size: 5px; border-right: 1px solid; border-top: 1px solid;">
                    Shipper certifies that the particulars on the face hereof are correct and that insofar as any part of the consigment<br>
                    contains dangerous goods, such part is properly described by name and is in proper condition for carriage by air<br>
                    according to the applicable Dangerous Goods Regulations.
                </td>
            </tr>
            <tr>
                <td colspan="4" height="15px" style="border-right: 1px solid; border-left: 1px solid; ">{{ round($bill_of_lading->other_prepaid, 3) }}</td>
                <td colspan="4" height="15px" style="border-right: 1px solid; border-left: 1px solid; ">{{ round($bill_of_lading->other_collected, 3) }}</td>
            </tr>
            <tr>
                <td width="8%" colspan="2" style="border-right: 1px solid; border-top: 1px solid; border-left: 1px solid; "></td>
                <td colspan="4"  style="font-size: 5px; border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid; " align="center">Total Other Charges Due Carrier</td>
                <td width="8%" colspan="2"  style="border-right: 1px solid; border-top: 1px solid; border-left: 1px solid; "></td>
                <td width="60%" colspan="7" rowspan="2"  style="border-right: 1px solid; border-left: 1px solid; ">
                    <br>
                    <br>
                </td>
            </tr>
            <tr>
                <td colspan="4" height="15px"  style="border-right: 1px solid; border-left: 1px solid; ">{{ $bill_of_lading->carrier_prepaid }}</td>
                <td colspan="4" height="15px"  style="border-right: 1px solid; ">{{ $bill_of_lading->carrier_colleted }}</td>
            </tr>
            <tr>
                <td colspan="4" height="15px"  style="border-right: 1px solid; border-top: 1px solid; border-left: 1px solid; "></td>
                <td colspan="4" height="15px"  style="border-right: 1px solid; border-top: 1px solid;"></td>
                <td width="60%" colspan="7" style="font-size: 5px;  border-top: 1px dashed; border-right: 1px solid;" align="center">Signature of Shipper of this agent</td>
            </tr>
            <tr>
                <td width="2%" style="border-right: 1px solid; border-top: 1px solid; border-left: 1px solid; "></td>
                <td  colspan="2"  style="font-size: 5px; border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid; " align="center">Total Prepaid</td>
                <td width="2%" style="border-right: 1px solid; border-top: 1px solid; "></td>
                <td width="2%" style="border-right: 1px solid; border-top: 1px solid; "></td>
                <td colspan="2" style="font-size: 5px; border-right: 1px solid; border-top: 1px solid;  border-bottom: 1px solid;" align="center">Total Collect</td>
                <td width="2%"  style="border-right: 1px solid; border-top: 1px solid;"></td>
                <td width="60%" colspan="7" rowspan="3" style="border-right: 1px solid; border-top: 1px solid; ">
                  <br><br>
                </td>
            </tr>
            <tr>
                <td colspan="4" height="15px" style="border-right: 1px solid; border-left: 1px solid;">{{ round($bill_of_lading->total_prepaid, 3) }}</td>
                <td colspan="4" height="15px" style="border-right: 1px solid; ">{{ round($bill_of_lading->total_collected, 3) }}</td>
            </tr>
            <tr>
                <td width="2%" style="border-right: 1px solid; border-top: 1px solid; border-left: 1px solid;"></td>
                <td  colspan="2" style="font-size: 5px; border-right: 1px solid; border-top: 1px solid;  border-bottom: 1px solid;" align="center">Currency Conversion Rate</td>
                <td width="2%" style="border-right: 1px solid; border-top: 1px solid;"></td>
                <td width="2%" style="border-right: 1px solid; border-top: 1px solid;"></td>
                <td  colspan="2" style="font-size: 5px; border-right: 1px solid; border-top: 1px solid;  border-bottom: 1px solid;" align="center">CC Charge in dest. Currency</td>
                <td width="2%" style="border-right: 1px solid; border-top: 1px solid;"></td>
            </tr>
            <tr>
                <td colspan="4" height="15px" style="border-right: 1px solid; border-left: 1px solid;"></td>
                <td colspan="4" height="15px" style="border-right: 1px solid; "></td>
                <td colspan="4" style="font-size: 5px; border-top: 1px dashed;  border-bottom: 1px solid; " align="center">Excecuted on (date)</td>
                <td style="font-size: 5px; border-top: 1px dashed;  border-bottom: 1px solid;" align="right">At (place)</td>
                <td style="font-size: 5px; border-top: 1px dashed;  border-bottom: 1px solid; border-right: 1px solid;" align="center" colspan="2">Signature of issuing Carrier or its Agent</td>
            </tr>
            <tr>
                <td colspan="4" rowspan="2" style="font-size: 7px; border-bottom: 1px solid; border-right: 1px solid; border-top: 1px solid;  border-left: 1px solid;" align="center">For Carriers Use Only <br> at Destination</td>
                <td width="2%" style="border-right: 1px solid; border-top: 1px solid;"></td>
                <td colspan="2"  style="font-size: 5px; border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;" align="center">Charges at Destination</td>
                <td width="2%"  style="border-right: 1px solid; border-top: 1px solid;"></td>
                <td width="2%"  style="border-right: 1px solid; border-top: 1px solid;"></td>
                <td colspan="2" width="12%" style="font-size: 5px; border-right: 1px solid; border-top: 1px solid; border-bottom: 1px solid;" align="center">Total Collect Charges</td>
                <td width="2%"  style="border-right: 1px solid; border-top: 1px solid;"></td>
            </tr>
            <tr>
                <td colspan="4" height="15px" style="border-right: 1px solid; border-bottom: 1px solid;  border-left: 1px solid;"></td>
                <td colspan="4" height="15px" style="border-right: 1px solid; border-bottom: 1px solid;  border-left: 1px solid;"></td>
                <td colspan="3" align="right"><h5><strong>{{ substr($bill_of_lading->code, 5) }}</strong></h5></td>
            </tr>
        </table>
    </div>

</div>
</body>

</html>