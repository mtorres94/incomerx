<?php

namespace Sass\DataTables\Export\Air;

use Sass\DataTables\CustomDataTable;
use Sass\EaBookingEntry;
use Sass\User;
use Yajra\Datatables\Services\DataTable;

class EaBookingEntryDataTable extends CustomDataTable
{
    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', function ($booking_entry) {
                return $this->groupButton(
                    $booking_entry,
                    'export.air.booking_entries',[
                    ['route' => report_route('ea_booking_entries.report', 1, $booking_entry->id), 'icon' => 'icon-file-pdf', 'name' => 'MANIFEST (No Barcode)'],
                    ['route' => report_route('ea_booking_entries.report', 2, $booking_entry->id), 'icon' => 'icon-file-pdf', 'name' => 'MANIFEST'],
                    ['route' => report_route('ea_booking_entries.report', 3, $booking_entry->id), 'icon' => 'icon-file-pdf', 'name' => 'Resume'],
                ]);
            })
            ->setRowAttr(['data-id' => '{{ $id }}'])
            ->make(true);
    }

    /**
     * Get the query object to be processed by dataTables.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
    public function query()
    {
        $query = EaBookingEntry::leftJoin('mst_customers AS c1', 'ea_booking_entries.shipper_id', '=', 'c1.id')
            ->leftJoin('mst_customers AS c2', 'ea_booking_entries.consignee_id', '=', 'c2.id')
            ->leftJoin('mst_customers AS c3', 'ea_booking_entries.agent_id', '=', 'c3.id')
            ->leftJoin('mst_airports AS c4', 'ea_booking_entries.origin_id', '=', 'c4.id')
            ->leftJoin('mst_airports AS c5', 'ea_booking_entries.destination_id', '=', 'c5.id')
            ->leftJoin('ea_shipment_entries AS file', 'ea_booking_entries.shipment_id', '=', 'file.id')
            ->orderBy('ea_booking_entries.date', 'desc')
            ->orderBy('ea_booking_entries.code', 'desc')
            ->select(['ea_booking_entries.id','ea_booking_entries.code','ea_booking_entries.shipment_type','ea_booking_entries.date', 'ea_booking_entries.status', 'c1.name AS shipper_name', 'c2.name AS consignee_name', 'c3.name AS agent_name', 'c4.name AS origin_name', 'c5.name AS destination_name', 'file.code as shipment_code']);
        return $this->applyScopes($query);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->ajax('')
            ->addAction(['width' => '130px']);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            ['data' => 'code',                  'name' => 'ea_booking_entries.code', 'title' => 'Code', 'width' => '70px'],
            ['data' => 'date',            'name' => 'ea_booking_entries.date', 'title' => 'Date', 'width' => '45px'],
            ['data' => 'status',             'name' => 'ea_booking_entries.status', 'title' => 'Status', 'width' => '35px'],
            ['data' => 'shipment_type',         'name' => 'ea_booking_entries.shipment_type', 'title' => 'Type', 'width' => '35px'],
            ['data' => 'shipment_code',         'name' => 'file.shipment_code', 'title' => 'File#', 'width' => '45px'],
            ['data' => 'shipper_name',          'name' => 'c1.name', 'title' => 'Shipper'],
            ['data' => 'consignee_name',        'name' => 'c2.name', 'title' => 'Consignee'],
            ['data' => 'origin_name',     'name' => 'c4.name', 'title' => 'Origin'],
            ['data' => 'destination_name',   'name' => 'c5.name', 'title' => 'Destination'],
    ];

    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return null;
    }
}
