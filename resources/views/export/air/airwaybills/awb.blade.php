<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ $airway_bill->code }}</title>
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
          <table class="table resume-table">
              <tr>
                  <td colspan="3" width="30%" style="border-top: 1px solid black; border-left: 1px solid black;"> <p style="font-size: 6px;">Shipper's Name and Address</p></td>
                  <td colspan="7" width="20%" style="font-size: 6px; border-top: 1px solid black; border-left: 1px solid black; border-bottom: 1px solid black;">Shipper's Account Number<br><strong>{{ strtoupper($airway_bill->shipper_id > 0 ? $airway_bill->shipper->code : "") }}</strong></td>
                  <td colspan="4" width="15%" style="border-top: 1px solid black; border-left: 1px solid black;"><p style="font-size:6px;">Non Negotiable</p></td>
                  <td colspan="7" width="35%" rowspan="2"  style="border-top: 1px solid black; border-right: 1px solid black;">
                      <p>{{ strtoupper($airway_bill->issued_id > 0 ? $airway_bill->issued->name : "") }}</p>
                      <p>{{  strtoupper($airway_bill->issued_id > 0 ? $airway_bill->issued->address : "") }}</p>
                      <p>{{  strtoupper($airway_bill->issued_id > 0 ? $airway_bill->issued->city : "") }}</p>
                  </td>
              </tr>
              <tr>
                  <td colspan="10" style="border-left: 1px solid black; border-right: 1px solid black;">
                      <p>{{ strtoupper($airway_bill->shipper_id > 0 ? $airway_bill->shipper->name : "") }}<br>
                      {{  strtoupper($airway_bill->shipper_id > 0 ? $airway_bill->shipper->address : "") }}<br>
                      {{  strtoupper($airway_bill->shipper_id > 0 ? $airway_bill->shipper->city : "") }}</p>
                  </td>
                  <td colspan="4" width="20%"><p style="font-size: 9px;"><strong>Air Waybill</strong></p><p style="font-size:6px;">Issued by</p></td>
              </tr>
              <tr>
                  <td colspan="10" style="border-left: 1px solid black; "></td>
                  <td colspan="11" style="border-top: 1px solid black; border-left: 1px solid black; border-right: 1px solid black; "><p style="font-size: 6px;">Copies 1, 2 and 3 of this Air Waybill are originals and have the same validity .</p></td>
              </tr>
              <tr>
                  <td colspan="3" width="30%" style="border-top: 1px solid black; border-left: 1px solid black;"><p style="font-size: 6px;">Consignee's Name and Address</p></td>
                  <td colspan="7" width="20%" style=" font-size: 6px; border-top: 1px solid black; border-left: 1px solid black; border-bottom: 1px solid black;">Consignee's Account Number<br><strong>{{ strtoupper($airway_bill->consignee_id > 0 ? $airway_bill->consignee->code : "") }}</strong></td>
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
                      <p>{{  strtoupper($airway_bill->consignee_id > 0 ? $airway_bill->consignee->name : "") }}<br>
                      {{  strtoupper($airway_bill->consignee_id > 0 ? $airway_bill->consignee->address : "") }}<br>
                      {{  strtoupper($airway_bill->consignee_id > 0 ? $airway_bill->consignee->city : "") }}</p>
                  </td>

              </tr>
              <tr>
                  <td colspan="10"  style="border-top: 1px solid black; border-left: 1px solid black;"><p style="font-size: 6px;">Issuing Carrier's Name and City</p></td>
                  <td colspan="11" style="border-right: 1px solid black; border-top: 1px solid black;  border-left: 1px solid black; "><p style="font-size: 6px;">Accounting Information</p></td>
              </tr>
              <tr>
                  <td colspan="10" style="border-bottom: 1px solid black;  border-left: 1px solid black;">
                      <p>{{ strtoupper($airway_bill->issued_id > 0 ? $airway_bill->issued->name : "") }}<br>
                      {{  strtoupper($airway_bill->issued_id > 0 ? $airway_bill->issued->address : "") }}<br>
                      {{  strtoupper($airway_bill->issued_id > 0 ? $airway_bill->issued->city : "") }}</p>
                  </td>
                  <td colspan="11" rowspan="2" style="border-bottom: 1px solid black; border-left: 1px solid black; border-right: 1px solid black;">
                      <p>{{ strtoupper(isset($airway_bill)? $airway_bill->accounting_information : "") }}</p>
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
                <td height="20px" colspan="10" width="50%"  style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black;">{{ $airway_bill->origin_id > 0 ? strtoupper($airway_bill->origin->name) : "" }}</td>
                <td colspan="7" width="25%" style="border-bottom:1px solid black; border-right:1px solid black;">{{ $airway_bill->shipment_id > 0 ? $airway_bill->shipment->code : "" }}</td>
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
                <td width="3%" style=" border-left: 1px solid black; font-size: 5px;" rowspan="2">CHrgs Code<br>{{ $airway_bill->awb_type }}</td>
                <td width="3%" style="font-size: 5px; border-left: 1px solid black; border-bottom: 1px solid black;">PPD</td>
                <td width="3%" style="font-size: 5px; border-left: 1px solid black; border-bottom: 1px solid black;">COLL</td>
                <td width="3%" style="font-size: 5px; border-left: 1px solid black; border-bottom: 1px solid black;">PPD</td>
                <td width="3%" style="font-size: 5px; border-left: 1px solid black; border-bottom: 1px solid black;">COLL</td>
                <td colspan="4" width="15%" style="font-size: 5px; border-left: 1px solid black; ">Declared value for Carriage</td>
                <td width="15%" style="font-size: 5px; border-left: 1px solid black; border-right: 1px solid black;">Declared value for Costums</td>
            </tr>
            <tr>
                <td height="20px" width="5%" style="border-left:1px solid black; border-right: 1px solid black; border-bottom:1px solid black;">{{ $airway_bill->destination_id > 0 ? strtoupper($airway_bill->destination->code) : "" }}</td>
                <td colspan="3" width="29%" style="border-left:1px solid black; border-bottom:1px solid black;">{{ $airway_bill->carrier_id >0 ? strtoupper($airway_bill->carrier->name) : "" }}</td>
                <td colspan="2" width="4%" style="border-left:1px solid black;  border-bottom:1px solid black;"></td>
                <td colspan="2" width="4%" style="border-left:1px solid black; border-bottom:1px solid black;"></td>
                <td  width="4%" style="border-left:1px solid black;  border-bottom:1px solid black;"></td >
                <td  width="4%" style="border-left:1px solid black; border-bottom:1px solid black;"></td>

                <td width="5%" style="border-left:1px solid black; border-bottom:1px solid black;">{{ $airway_bill->currency_id > 0 ? strtoupper($airway_bill->currency->code ) : "" }}</td>
                <td width="3%" style="border-left:1px solid black; border-bottom:1px solid black;">{{ $airway_bill->awb_type == 'P'? 'P' : "" }}</td>
                <td width="3%" style="border-left:1px solid black; border-bottom:1px solid black;">{{ $airway_bill->awb_type == 'C'? 'C' : "" }}</td>
                <td width="3%" style="border-left:1px solid black; border-bottom:1px solid black;">{{ $airway_bill->awb_type == 'P'? 'P' : "" }}</td>
                <td width="3%" style="border-left:1px solid black; border-bottom:1px solid black;">{{ $airway_bill->awb_type == 'C'? 'C' : "" }}</td>
                <td colspan="4" width="15%" style="border-left:1px solid black; border-bottom:1px solid black;">{{ $airway_bill->carriage_value > 0 ? $airway_bill->carriage_value : "N.V.D" }}</td>
                <td width="15%" style="border-left:1px solid black; border-bottom:1px solid black; border-right:1px solid black;">{{ $airway_bill->customer_value > 0 ? $airway_bill->customer_value : "N.V.D" }}</td>
            </tr>
            <tr>
                <td height="5px" colspan="2" width="15%" style="font-size: 5px; border-left:1px solid black; border-right:1px solid black; ">Airport of Destination</td>
                <td width="7%"></td>
                <td colspan="4" width="20%" style="font-size: 5px; border-left: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black;">Requested Flight/Date</td>
                <td colspan="3" width="8%"></td>

                <td colspan="4" style="font-size: 5px; border-left: 1px solid black; border-right: 1px solid black;">Amount of Insurance</td>
                <td colspan="7" rowspan="2" style="font-size: 5px; border-right: 1px solid black;">
                    INSURANCE - If carrier offers insurance, and such insurance is<br>
                    requested in acordance with the conditions thereof, indicate amount<br>
                    to be insured in figures in box marked "Amount of insurance"
                </td>
            </tr>
            <tr>
                <td height="20px" colspan="2" width="15%"  style="border-left:1px solid black; border-right:1px solid black; border-bottom:1px solid black;"> {{ $airway_bill->destination_id > 0 ? strtoupper($airway_bill->destination->name) : "" }}</td>
                <td colspan="3" width="15%" style="border-right: 1px solid black; border-bottom: 1px solid black;">{{ $airway_bill->requested_flight }}</td>
                <td colspan="5" width="20%"></td>

                <td colspan="4" style="border-left: 1px solid black;">{{ $airway_bill->ins_value > 0 ?  $airway_bill->ins_value : "N.I.L"}}</td>
            </tr>
            <tr>
                <td colspan="21" height="5px" style="font-size: 5px; border-left: 1px solid black; border-right: 1px solid black;">Handling Information</td>
            </tr>
            <tr>
                <td colspan="21" height="30px" style=" border-left: 1px solid black; border-right: 1px solid black; ">{{ strtoupper($airway_bill->handling_information) }}</td>
            </tr>
            <tr>
                <td colspan="6" height="20px" style="font-size:5px; border-bottom: 1px solid black; border-left: 1px solid black;">These commodities, technology or software were exported from the United States<br>
                    in accordance with the Export Administration Regulations. Ultimate Destination</td>
                <td colspan="7" align="center" style="border-bottom: 1px solid black;">{{ $airway_bill->destination_id >0 ? strtoupper($airway_bill->destination->name ): "" }}</td>
                <td colspan="5" style="border-bottom: 1px solid black;"></td>
                <td colspan="2" style="font-size: 5px; border-bottom: 1px solid black;">Diversion contrary to<br>U.S. law prohibited</td>
                <td height="20px" style="border-top: 1px solid black; border-bottom: 1px solid black;  border-left: 1px solid black; border-right:1px solid black;"><p style="font-size:5px;">SCI</p> {{ $airway_bill->sci_number }}</td>
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
                <td height="250px" width="5%"></td>
                <td width="8%"></td>
                <td width="2%"></td>
                <td width="1%"></td>
                <td width="2%"></td>
                <td width="5%"></td>
                <td width="1%"></td>
                <td width="13%"></td>
                <td width="1%"></td>
                <td width="10%"></td>
                <td width="1%"></td>
                <td width="20%"></td>
                <td width="1%"></td>
                <td width="30%"></td>
            </tr>
            <tr>
                <td height="20px" width="5%" style="border-bottom: 1px solid black; border-top:1px solid black;border-right:1px solid black; border-left:1px solid black;"></td>
                <td width="8%" style="border-bottom: 1px solid black; border-top:1px solid black;border-right:1px solid black;"></td>
                <td width="2%" style="border-bottom: 1px solid black; border-top:1px solid black;border-right:1px solid black;"></td>
                <td width="1%" style="border-bottom: 1px solid black; border-top:1px solid black;border-right:1px solid black;"></td>
                <td width="2%" style="border-bottom: 1px solid black; border-top:1px solid black;border-right:1px solid black;"></td>
                <td width="5%" style="border-bottom: 1px solid black; border-top:1px solid black;border-right:1px solid black;"></td>
                <td width="1%" style="border-bottom: 1px solid black; border-top:1px solid black;border-right:1px solid black;"></td>
                <td width="13%" style="border-bottom: 1px solid black; border-top:1px solid black;border-right:1px solid black;"></td>
                <td width="1%" style="border-bottom: 1px solid black; border-top:1px solid black;border-right:1px solid black;"></td>
                <td width="10%" style="border-bottom: 1px solid black; border-top:1px solid black;border-right:1px solid black;"></td>
                <td width="1%" style="border-bottom: 1px solid black; border-top:1px solid black;border-right:1px solid black;"></td>
                <td width="20%" style="border-bottom: 1px solid black; border-top:1px solid black;border-right:1px solid black;"></td>
                <td width="1%" style="border-bottom: 1px solid black; border-top:1px solid black;border-right:1px solid black;"></td>
                <td width="30%" style="border-bottom: 1px solid black; border-top:1px solid black;border-right:1px solid black;"></td>
            </tr>
        </table>
    </div>
    <div class="row">
        <table class="table resume-table" style="margin-top: -5px;">
            <tr>
                <td width="8%" colspan="2" height="5px" style="border-left: 1px solid black; border-right: 1px solid black; font-size: 5px; border-bottom: 1px solid black;">Prepaid</td>
                <td colspan="4" align="center" style="border-right: 1px solid black; font-size: 5px;">Weight Charge</td>
                <td width="8%" colspan="2" style="border-bottom: 1px solid black; border-right: 1px solid black; font-size: 5px;">Collected</td>
                <td width="65%" colspan="7"></td>
            </tr>
            <tr>
                <td colspan="4" style="border-left: 1px solid black;"></td>
                <td colspan="4" height="20px" style="border-left: 1px solid black;"></td>
                <td colspan="4" width="30%" rowspan="5" style="border-left: 1px solid black;"></td>
                <td colspan="2" rowspan="5"></td>
                <td width="8%" rowspan="5"></td>
            </tr>
            <tr>
                <td width="8%" colspan="2" height="5px" style="border-left: 1px solid black; border-top: 1px solid black;"></td>
                <td colspan="4" align="center" style="font-size: 5px; border-top: 1px solid black; border-bottom: 1px solid black; border-left: 1px solid black;">Valuation Charge</td>
                <td width="8%" colspan="2" style="border-right: 1px solid black; border-top: 1px solid black;"></td>
            </tr>
            <tr>
                <td colspan="4" height="20px" style="border-left: 1px solid black; border-bottom: 1px solid black; border-right: 1px solid black;"></td>
                <td colspan="4" style="border-bottom: 1px solid black; border-left: 1px solid black; border-right: 1px solid black;  "></td>
            </tr>
            <tr>
                <td width="8%" colspan="2" height="5px"></td>
                <td colspan="4" align="center" style="font-size:5px; border-bottom: 1px solid black; border-left: 1px solid black; border-right: 1px solid black;">Tax</td>
                <td width="8%" colspan="2"></td>
            </tr>
            <tr>
                <td colspan="4" height="20px"  style="border-bottom: 1px solid black; border-left: 1px solid black;"></td>
                <td colspan="4" style="border-bottom: 1px solid black; border-left: 1px solid black; border-right: 1px solid black;"></td>
            </tr>
            <tr>
                <td width="8%" colspan="2" height="5px"></td>
                <td colspan="4" style="font-size: 5px; border-bottom: 1px solid black; border-left: 1px solid black; border-right: 1px solid black;" align="center">Total Other Charges Due Agent</td>
                <td width="8%" colspan="2"></td>
                <td colspan="7" rowspan="5"></td>
            </tr>
            <tr>
                <td colspan="4" height="20px"></td>
                <td colspan="4"></td>
            </tr>
            <tr>
                <td width="8%" colspan="2" height="5px" style="border-top: 1px solid black; border-left: 1px solid black; "></td>
                <td colspan="4"  style="font-size: 5px; border-bottom: 1px solid black; border-top: 1px solid black; border-left: 1px solid black; border-right: 1px solid black;" align="center">Total Other Charges Due Carrier</td>
                <td width="8%" colspan="2" style="border-top: 1px solid black; border-left: 1px solid black; "></td>
            </tr>
            <tr>
                <td colspan="4" height="20px" style="border-bottom: 1px solid black; border-left: 1px solid black; "></td>
                <td colspan="4" style="border-bottom: 1px solid black; border-left: 1px solid black; "></td>
            </tr>
            <tr>
                <td colspan="4" width="18%" height="20px" style="border-bottom: 1px solid black; border-left: 1px solid black; "></td>
                <td colspan="4" style="border-bottom: 1px solid black; border-left: 1px solid black; "></td>
            </tr>
            <tr>
                <td width="2%" height="5px" style="border-top: 1px solid black; "></td>
                <td colspan="2" style="border-bottom: 1px solid black; border-left: 1px solid black; border-right: 1px solid black; "></td>
                <td width="2%" style="border-top: 1px solid black; "></td>
                <td width="2%"></td>
                <td colspan="2"></td>
                <td width="2%"></td>
                <td colspan="7" rowspan="3"></td>
            </tr>
            <tr>
                <td colspan="2" height="20px"></td>
                <td colspan="2"></td>
                <td colspan="2"></td>
                <td colspan="2"></td>
            </tr>
            <tr>
                <td width="2%" height="5px"></td>
                <td colspan="2"></td>
                <td width="2%"></td>
                <td width="2%"></td>
                <td colspan="2"></td>
                <td width="2%"></td>
            </tr>
            <tr>
                <td colspan="2" height="20px"></td>
                <td colspan="2"></td>
                <td colspan="2"></td>
                <td colspan="2"></td>
                <td colspan="3"></td>
                <td colspan="2"></td>
                <td colspan="2"></td>
            </tr>
            <tr>
                <td colspan="4" rowspan="2" ></td>
                <td width="2%"  height="5px"></td>
                <td colspan="2"></td>
                <td width="2%"></td>
                <td width="2%"  height="5px"></td>
                <td width="12%"></td>
                <td width="2%"></td>
                <td colspan="3" rowspan="2"></td>
                <td rowspan="2"></td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td colspan="2" height="20px"></td>
                <td colspan="3"></td>
            </tr>
        </table>
    </div>

</div>
</body>

</html>