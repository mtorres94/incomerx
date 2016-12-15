<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mail</title>
    <style>
        p {
            padding: 3px;
            margin: 0;
        }
        table {
            padding-top: 10px;
            padding-bottom: 10px;
            font-size: 11px;
        }
        table th {
            font-size: 12px;
            padding: 1px 2px;
        }
        table td {
            padding: 1px 5px 1px 2px;
        }
        .header {
            background-color: #1e5475;
            color: #fff;
            padding: 2px;
        }
        .content {
            background-color: #bbcbd5;
        }
    </style>
</head>
<body>
    <p><strong>Cargo Received/Updated at VECO LOGISTICS MIAMI, INC - {{ $data->code }}</strong></p>
    <p>We are pleased to inform you the following cargo has been Received/Updated in our facilities.</p>
    <table>
        <tbody>
            <tr>
                <th class="header" colspan="4"><strong>Warehouse Receipt Details</strong></th>
            </tr>
            <tr>
                <td class="content"><strong>Receipt #:</strong></td>
                <td>{{ $data->code }}</td>
                <td class="content"><strong>Date:</strong></td>
                <td>{{ $data->date_in }}</td>
            </tr>
            <tr>
                <td class="content"><strong>Third Party:</strong></td>
                <td>{{ $data->third_party_id > 0 ? strtoupper($data->third_party->name) : '' }}</td>
                <td class="content"><strong>Inland Carrier:</strong></td>
                <td>{{ $data->receiving_carrier_id > 0 ? strtoupper($data->carrier->name) : '' }}</td>
            </tr>
            <tr>
                <td class="content"><strong>Shipper:</strong></td>
                <td>{{ $data->shipper_id > 0 ? strtoupper($data->shipper->name) : '' }}</td>
                <td class="content"><strong>Consignee:</strong></td>
                <td>{{ $data->consignee_id > 0 ? strtoupper($data->consignee->name) : '' }}</td>
            </tr>
            <tr>
                <td class="content"><strong>Origin:</strong></td>
                <td>{{ $data->location_origin_id > 0 ? strtoupper($data->origin->name) : '' }}</td>
                <td class="content"><strong>Destination:</strong></td>
                <td>{{ $data->location_destination_id > 0 ? strtoupper($data->destination->name) : '' }}</td>
            </tr>
            <tr>
                <th class="header" colspan="4">Cargo Details</th>
            </tr>
            @foreach($data->cargo_details as $detail)
                <tr>
                    <th class="header" colspan="4"><strong>Item #{{ $detail->line }}</strong></th>
                </tr>
                <tr>
                    <td class="content"><strong>Pieces:</strong></td>
                    <td>{{ $detail->pieces }}</td>
                    <td class="content"><strong>Dims:</strong></td>
                    <td>{{ $detail->length.' X '.$detail->width.' X '.$detail->height.' '.$detail->metric_unit_measurement_id  }}</td>
                </tr>
                <tr>
                    <td class="content"><strong>Cargo Type:</strong></td>
                    <td>{{ $detail->cargo_type_id > 0 ? $detail->cargo_type->code : '' }}</td>
                    <td class="content"><strong>Weight:</strong></td>
                    <td>{{ $detail->total_weight }}</td>
                </tr>
                <tr>
                    <td class="content"><strong>Unit Weight:</strong></td>
                    <td>{{ $detail->unit_weight }}</td>
                    <td class="content"><strong>Cubic:</strong></td>
                    <td>{{ $detail->cubic }}</td>
                </tr>
                <tr>
                    <td class="content"><strong>Location:</strong></td>
                    <td>{{ $detail->location_id > 0 ? $detail->location->code : '' }}</td>
                    <td class="content"><strong>Bin:</strong></td>
                    <td>{{ $detail->location_bin_id }}</td>
                </tr>
            @endforeach
            <tr>
                <td class="content"><strong>Total Pieces:</strong></td>
                <td>{{ $data->sum_pieces }}</td>
                <td class="content"><strong>Tot. Weight:</strong></td>
                <td>{{ $data->sum_weight }} Lbs.</td>
            </tr>
            <tr>
                <td class="content"><strong>Tot. Cubic</strong></td>
                <td>{{ $data->sum_cubic }} Cft.</td>
            </tr>
            <tr>
                <th class="header" colspan="4">PRO/Tracking Number(s)</th>
            </tr>
            <tr>
                <td class="content"><strong>PRO #</strong></td>
                <td>
                    @forelse($data->receiving_details as $detail)
                        <p>{{ strtoupper($detail->pro_number) }}</p>
                    @empty
                        <p>N/A</p>
                    @endforelse
                </td>
            </tr>
        </tbody>
    </table>
    <p>If you have any questions please contact us at 305-5992703 or by email at fpuga@vecologistics.com</p>
    <p>Thank you for your business.</p>
    <p>VECO LOGISTICS MIAMI, INC</p>
    <p>SHIPPER’S CONSENT TO SCREEN CARGO</p>
    <p>IN ACCORDANCE WITH TSA REGULATIONS, THIS LETTER AUTHORIZES: VECO LOGISTICS MIAMI INC., AND/OR EACH OF THEIR OFFICES OR BRANCHES TO SCREEN ALL CARGO TENDERED BY OUR COMPANY FROM THE DATE OF THIS NOTIFICATION FORWARD.</p>
</body>
</html>
