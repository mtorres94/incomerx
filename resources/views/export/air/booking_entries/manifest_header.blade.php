<div class="row row-padding">
    <div class="col-xs-6">
        <div class="company-info">
            <p><h5><strong>VECO LOGISTICS MIAMI INC.</strong></h5></p>
            <p>7270 NW 35 TERRACE</p>
            <p>MIAMI, FLORIDA 33122</p>
            <p>Phone: 305-5992703 / Fax: 305-5992925</p>
            <br/>
            <p>Printed on: {{ \Carbon\Carbon::now()->toDateString() }}</p>
            <p>Printed by: {{ Auth::user()->username }}</p>
        </div>
    </div>
    <div class="col-xs-6">
        <div class="document-info pull-right">
            <h5><strong>AIR CARGO MANIFEST</strong></h5>
            <div style="text-align: center;">
                {!! DNS2D::getBarcodeSVG(
                ($booking_entry->shipment_id >0 ? $booking_entry->shipment->code : "")
                , "QRCODE", 2, 2) !!}
            </div>
            <p class="document_number" style="align-content: center">{{ $booking_entry->shipment_id >0 ? $booking_entry->shipment->code : "" }}<br>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <table class="table table-bordered">
            <tbody>
            <tr>
                <td width="15%">PRINTED ON:<br>{{\Carbon\Carbon::now()->toDateString()  }}</td>
                <td width="15%">PRINTED BY:<br>{{  Auth::user()->username  }}</td>
                <td width="40%">MASTER AWB<br> {{ $booking_entry->code }}</td>
                <td></td>
            </tr>
            <tr>
                <td colspan="2">2. OWNER / OPERATOR<br>{{ strtoupper($booking_entry->shipper_id >0 ? $booking_entry->shipper->name : "") }}</td>
                <td >3. MARKS OF NATIONALITY AND REGISTRATION <br> USA</td>
                <td >4. FLIGHT NO.<br> {{ $booking_entry->first_flight }}</td>
            </tr>
            <tr>
                <td colspan="2">5. PORT OF LOADING<br>{{ strtoupper($booking_entry->origin_id > 0 ? $booking_entry->origin->name : "" )}}</td>
                <td>6. PORT OF UNLOADING<br> {{ strtoupper($booking_entry->destination_id >0 ? $booking_entry->destination->name : "") }}</td>
                <td>7. DATE<br>{{ $booking_entry->date }}</td>
            </tr>
            <tr>
                <td colspan="2">ITEMS 8 AND 9 ARE USE IN CONSOLIDATION SHIPMENTS ONLY</td>
                <td>8. CONSOLIDATOR<br>{{ strtoupper(($booking_entry->consignee_id > 0 and $booking_entry->shipment_type = 'C' ) ? $booking_entry->consignee->name : "") }}</td>
                <td>9. DE-CONSOLIDATOR<br>{{ strtoupper(($booking_entry->carrier_id > 0 and $booking_entry->shipment_type = 'C') ? $booking_entry->carrier->name : "") }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>