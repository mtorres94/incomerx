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
                  <td width="30%" style="border-top: 1px solid black; border-left: 1px solid black;"> <p style="font-size: 6px;">Shipper's Name and Address</p></td>
                  <td width="20%" style="font-size: 6px; border-top: 1px solid black; border-left: 1px solid black; border-bottom: 1px solid black;">Shipper's Account Number<br><strong>{{ strtoupper($airway_bill->shipper_id > 0 ? $airway_bill->shipper->code : "") }}</strong></td>
                  <td width="15%" style="border-top: 1px solid black; border-left: 1px solid black;"><p style="font-size:6px;">Non Negotiable</p></td>
                  <td width="35%" rowspan="2"  style="border-top: 1px solid black; border-right: 1px solid black;">
                      <p>{{ strtoupper($airway_bill->issued_id > 0 ? $airway_bill->issued->name : "") }}</p>
                      <p>{{  strtoupper($airway_bill->issued_id > 0 ? $airway_bill->issued->address : "") }}</p>
                      <p>{{  strtoupper($airway_bill->issued_id > 0 ? $airway_bill->issued->city : "") }}</p>
                  </td>
              </tr>
              <tr>
                  <td colspan="2" style="border-left: 1px solid black; border-right: 1px solid black;">
                      <p>{{ strtoupper($airway_bill->shipper_id > 0 ? $airway_bill->shipper->name : "") }}<br>
                      {{  strtoupper($airway_bill->shipper_id > 0 ? $airway_bill->shipper->address : "") }}<br>
                      {{  strtoupper($airway_bill->shipper_id > 0 ? $airway_bill->shipper->city : "") }}</p>
                  </td>
                  <td width="20%"><p style="font-size: 9px;"><strong>Air Waybill</strong></p><p style="font-size:6px;">Issued by</p></td>
              </tr>
              <tr>
                  <td colspan="2" style="border-left: 1px solid black; "></td>
                  <td colspan="2" style="border-top: 1px solid black; border-left: 1px solid black; border-right: 1px solid black; "><p style="font-size: 6px;">Copies 1, 2 and 3 of this Air Waybill are originals and have the same validity .</p></td>
              </tr>
              <tr>
                  <td width="30%" style="border-top: 1px solid black; border-left: 1px solid black;"><p style="font-size: 6px;">Consignee's Name and Address</p></td>
                  <td width="20%" style=" font-size: 6px; border-top: 1px solid black; border-left: 1px solid black; border-bottom: 1px solid black;">Consignee's Account Number<br><strong>{{ strtoupper($airway_bill->consignee_id > 0 ? $airway_bill->consignee->code : "") }}</strong></td>
                  <td colspan="2" rowspan="2" style="border-top: 1px solid black; border-left: 1px solid black; border-right: 1px solid black;">
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
                  <td colspan="2" style="border-left: 1px solid black;">
                      <p>{{  strtoupper($airway_bill->consignee_id > 0 ? $airway_bill->consignee->name : "") }}<br>
                      {{  strtoupper($airway_bill->consignee_id > 0 ? $airway_bill->consignee->address : "") }}<br>
                      {{  strtoupper($airway_bill->consignee_id > 0 ? $airway_bill->consignee->city : "") }}</p>
                  </td>

              </tr>
              <tr>
                  <td colspan="2"  style="border-top: 1px solid black; border-left: 1px solid black;"><p style="font-size: 6px;">Issuing Carrier's Name and City</p></td>
                  <td colspan="2" style="border-right: 1px solid black; border-top: 1px solid black;  border-left: 1px solid black; "><p style="font-size: 6px;">Accounting Information</p></td>
              </tr>
              <tr>
                  <td colspan="2" style="border-bottom: 1px solid black;  border-left: 1px solid black;">
                      <p>{{ strtoupper($airway_bill->issued_id > 0 ? $airway_bill->issued->name : "") }}<br>
                      {{  strtoupper($airway_bill->issued_id > 0 ? $airway_bill->issued->address : "") }}<br>
                      {{  strtoupper($airway_bill->issued_id > 0 ? $airway_bill->issued->city : "") }}</p>
                  </td>
                  <td colspan="2" rowspan="2" style="border-bottom: 1px solid black; border-left: 1px solid black; border-right: 1px solid black;">
                      <p>{{ strtoupper(isset($airway_bill)? $airway_bill->accounting_information : "") }}</p>
                  </td>
              </tr>
              <tr>
                  <td style="border-bottom: 1px solid black; border-left: 1px solid black;"><p style="font-size: 6px">Agent's IATA Code</p></td>
                  <td style="border-bottom: 1px solid black; border-left: 1px solid black;"><p style="font-size: 6px">Account No.</p></td>
              </tr>

          </table>
      <table class="table resume-table" style="margin-top: -5px;" >
          <tr>
              <td colspan="8" style=" border-left: 1px solid black; " width="50%"><p style="font-size: 6px;">Airport of Departure(Addrs. of First Carrier) and Requesting Routing</p></td>
              <td colspan="5" style="border-left: 1px solid black;" width="15%"><p style="font-size: 6px;">Reference Number</p></td>
              <td colspan="3" style="font-size: 6px; border-right: 1px solid black; border-left: 1px solid black; border-bottom: 1px solid black;" width="20%">Optional Shipping Information</td>
              <td width="18%" style="border-right: 1px solid black;"></td>
          </tr>
          <tr>
              <td colspan="8" width="50%" style="border-bottom: 1px solid black; border-left: 1px solid black; border-right: 1px solid black;">{{ strtoupper($airway_bill->origin_id > 0 ? $airway_bill->origin->name : "")  }}</td>
              <td colspan="7" style="border-bottom: 1px solid black; border-right: 1px solid black;" width="35%">{{ $airway_bill->shipment_id > 0 ? $airway_bill->shipment->code : "" }}</td>
              <td colspan="2" style="border-bottom: 1px solid black; border-right: 1px solid black;"></td>
          </tr>
          <tr>
              <td width="5%" rowspan="2" style="border-left: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black;"><p style="font-size: 6px;">To:</p>{{ strtoupper($airway_bill->destination_id >0 ? $airway_bill->destination->code : "") }}</td>
              <td width="20%" rowspan="2" colspan="3" style="border-right: 1px solid black; border-bottom: 1px solid black;"><p style="font-size: 6px;">By first Carrier</p>{{ strtoupper($airway_bill->carrier_id >0 ? $airway_bill->carrier->name : "" )}}</td>
              <td width="5%" rowspan="2" style="border-right: 1px solid black; border-bottom: 1px solid black;"><p style="font-size: 6px;">To</p></td>
              <td width="5%" rowspan="2" style="border-right: 1px solid black; border-bottom: 1px solid black;"><p style="font-size: 6px;">By</p></td>
              <td width="5%" rowspan="2" style="border-right: 1px solid black; border-bottom: 1px solid black;"><p style="font-size: 6px;">To</p></td>
              <td width="5%" rowspan="2" style="border-right: 1px solid black; border-bottom: 1px solid black;"><p style="font-size: 6px;">By</p></td>
              <td width="3%" rowspan="2" style=" border-right: 1px solid black; "><p style="font-size: 6px;">Currency</p>{{ $airway_bill->currency_id >0 ? $airway_bill->currency->code : "" }}</td>
              <td width="2%" rowspan="2" style=" border-right: 1px solid black; "><p style="font-size: 6px;">CHGs Code</p>{{ $airway_bill->awb_type }}</td>
              <td width="2%" style="font-size: 6px; border-right: 1px solid black; border-bottom: 1px solid black;">PPD</td>
              <td width="2%" style="font-size: 6px; border-right: 1px solid black; border-bottom: 1px solid black;">COLL</td>
              <td width="2%" style="font-size: 6px; border-right: 1px solid black; border-bottom: 1px solid black;">PPD</td>
              <td width="2%" style="font-size: 6px; border-right: 1px solid black; border-bottom: 1px solid black;">COLL</td>
              <td colspan="2" width="19%" style="font-size: 6px; border-right: 1px solid black; border-bottom: 1px solid black;">Declared Value for Carriage</td>
              <td width="18%" style="font-size: 6px; border-right: 1px solid black; border-bottom: 1px solid black;">Declared Value for Costums</td>
          </tr>
          <tr>
              <td width="3%">{{ $airway_bill->awb_type == 'P'? 'P': "" }}</td>
              <td width="3%">{{ $airway_bill->awb_type == 'C'? 'C': "" }}</td>
              <td width="3%">{{ $airway_bill->awb_type == 'P'? 'P': "" }}</td>
              <td width="3%">{{ $airway_bill->awb_type == 'C'? 'C': "" }}</td>
              <td colspan="2">{{ $airway_bill->carriage_value }}</td>
              <td width="13%" >{{ $airway_bill->customer_value }}</td>
          </tr>
          <tr>
              <td colspan="2" width="20%" style="font-size: 6px;">Airport of Destination</td>
              <td width="10%"></td>
              <td colspan="3" width="15%" style="font-size: 6px;">Requested Flight/ Date</td>
              <td width="10%" colspan="2"></td>
              <td colspan="4" style="font-size: 6px;">Amount of Insurance</td>
              <td colspan="5" rowspan="2" style="font-size: 6px;">INSURANCE - If carrier offers insurance, and such insurance is<br>
                      requested in acordance with the conditions thereof, indicate amount<br>
                      to be insured in figures in box marked "Amount of insurance"</td>
          </tr>
          <tr>
              <td colspan="2" width="20%">{{ $airway_bill->destination_id >0 ? $airway_bill->destination->name : "" }}</td>
              <td colspan="3" width="15%">{{ $airway_bill->requested_flight }}</td>
              <td width="15%" colspan="3"></td>
              <td colspan="4">{{ $airway_bill->insurance_value }}</td>
          </tr>
          <tr>
              <td colspan="17" style="border-left: 1px solid black; border-right: 1px solid black; border-top: 1px solid black;"><p style=" font-size: 6px;">Handling Information</p></td>
          </tr>
          <tr>
              <td colspan="17">{{ $airway_bill->handling_information }}</td>
          </tr>
          <tr>
              <td colspan="5" width="35%"><p style="font-size: 6px;">These commodities, technology or software were exported from the United States <br>in accordance with the Export Administration Regulations. Ultimate Destination</p></td>
              <td colspan="3" width="15%">{{ $airway_bill->ultimate_destination_id > 0 ? $airway_bill->ultimate_destination->name : "" }}</td>
              <td colspan="6"></td>
              <td colspan="2"><p style="font-size: 6px;">Diversion contrary to <br>US law prohibited</p></td>
              <td style=" border-top: 1px solid black; border-left: 1px solid black; border-right: 1px solid black;"><p style="font-size: 6px;">SCI</p><br>{{ $airway_bill->sci_number }}</td>
          </tr>
      </table>
  </div>
    <div class="row">
        <table class="table" border="1">
            <tr>
                <td width="70%" style="border-left: 1px solid black; border-right: 1px solid black;">
                    <table class="table header-table">
                        <thead>
                        <tr>
                            <td><p style="font-size: 6px;">No. of Pieces </p></td>
                            <td><p style="font-size: 6px;">Gross Weight</p></td>
                            <td><p style="font-size: 6px;">Kg. Lb.</p></td>
                            <td><p style="font-size: 6px;">Commodity<br>Item No.</p></td>
                            <td><p style="font-size: 6px;">Chargeable Weight</p></td>
                            <td><p style="font-size: 6px;">Rate Charge</p></td>
                            <td><p style="font-size: 6px;">Total</p></td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($airway_bill->cargo_details as $detail)
                            <tr>
                                <td> {{ $detail->pieces }}</td>
                                <td>{{ $detail->gross_weight }}</td>
                                <td>{{ $detail->unit_weight }}</td>
                                <td>{{ $detail->charge_weight }}</td>
                                <td>{{ $detail->rate }}</td>
                                <td>{{ $detail->total }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </td>
                <td width="30%" height="80px">
                    <p style="font-size: 6px;">Nature and Quantity of Goods<br>(Incl. Dimensions or Volume)</p><br>
                    {{  $airway_bill->cargo_notes }}
                </td>
            </tr>
        </table>

    </div>
</div>
</body>

</html>