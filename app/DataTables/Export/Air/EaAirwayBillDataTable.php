<?php

namespace Sass\DataTables\Export\Air;

use Sass\DataTables\CustomDataTable;
use Sass\EaAirwayBill;
use Sass\User;
use Yajra\Datatables\Services\DataTable;

class EaAirwayBillDataTable extends CustomDataTable
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
            ->addColumn('action', function ($airway_bill) {
                return $this->groupButton(
                    $airway_bill,
                    'export.air.airwaybills',[
                    ['route' => report_route('ea_airwaybills.report', 1, $airway_bill->id), 'icon' => 'icon-file-pdf', 'name' => 'Delivery Order'],
                    ['route' => report_route('ea_airwaybills.report', 2, $airway_bill->id), 'icon' => 'icon-file-pdf', 'name' => 'Delivery Order (Documents Only)'],
                    ['route' => report_route('ea_airwaybills.report', 3, $airway_bill->id), 'icon' => 'icon-file-pdf', 'name' => 'Delivery Order (Freight Only)'],
                    ['route' => report_route('ea_airwaybills.report', 4, $airway_bill->id), 'icon' => 'icon-file-pdf', 'name' => 'Pick up Order'],
                    ['route' => report_route('ea_airwaybills.report', 8, $airway_bill->id), 'icon' => 'icon-file-pdf', 'name' => 'AirwayBill'],
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
        $query = EaAirwayBill::leftJoin('mst_customers AS c1', 'ea_airwaybills.shipper_id', '=', 'c1.id')
            ->leftJoin('mst_customers AS c2', 'ea_airwaybills.consignee_id', '=', 'c2.id')
            ->leftJoin('mst_airports AS c4', 'ea_airwaybills.origin_id', '=', 'c4.id')
            ->leftJoin('mst_airports AS c5', 'ea_airwaybills.destination_id', '=', 'c5.id')
            ->leftJoin('ea_shipment_entries AS file', 'ea_airwaybills.shipment_id', '=', 'file.id')
            ->orderBy('ea_airwaybills.date', 'desc')
            ->orderBy('ea_airwaybills.code', 'desc')
            ->select(['ea_airwaybills.id','ea_airwaybills.code','ea_airwaybills.awb_type', 'ea_airwaybills.booking_code','ea_airwaybills.date', 'ea_airwaybills.status', 'c1.name AS shipper_name','c2.name AS consignee_name',  'c4.name AS origin_name', 'c5.name AS destination_name', 'file.code as shipment_code']);
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
            ['data' => 'code',                  'name' => 'ea_airwaybills.code', 'title' => 'Code', 'width' => '70px'],
            ['data' => 'date',            'name' => 'ea_airwaybills.date', 'title' => 'Date', 'width' => '45px'],
            ['data' => 'status',             'name' => 'ea_airwaybills.status', 'title' => 'Status', 'width' => '35px'],
            ['data' => 'awb_type',         'name' => 'ea_airwaybills.awb_type', 'title' => ' Type', 'width' => '35px'],
            ['data' => 'shipment_code',         'name' => 'file.shipment_code', 'title' => 'File#', 'width' => '45px'],
            ['data' => 'booking_code',         'name' => 'ea_airwaybills.booking_code', 'title' => 'Booking', 'width' => '60px'],
            ['data' => 'shipper_name',          'name' => 'c1.name', 'title' => 'Shipper'],
            ['data' => 'consignee_name',          'name' => 'c2.name', 'title' => 'Consignee'],
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
