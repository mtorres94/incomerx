<?php

namespace Sass\DataTables\Export\Ocean;

use Sass\EoBillOfLading;
use Sass\DataTables\CustomDataTable;
use Sass\User;
use Yajra\Datatables\Services\DataTable;

class BillOfLadingDataTable extends CustomDataTable
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
            ->addColumn('action', function ($bill_lading) {
                return $this->groupButton(
                    $bill_lading,
                    'export.oceans.bill_of_lading',
                    [
                        ['route' => report_route('bill_of_lading.report', 1, $bill_lading->id), 'icon' => 'icon-file-pdf', 'name' => 'ORIGINAL B/L'],
                        ['route' => report_route('bill_of_lading.report', 8, $bill_lading->id), 'icon' => 'icon-file-pdf', 'name' => 'Delivery Order'],
                        ['route' => report_route('bill_of_lading.report', 9, $bill_lading->id), 'icon' => 'fa fa-barcode', 'name' => 'Label'],
                        ['route' => report_route('bill_of_lading.report', 10, $bill_lading->id), 'icon' => 'icon-file-pdf', 'name' => 'Manifest'],
                        ['route' => report_route('bill_of_lading.report', 11, $bill_lading->id), 'icon' => 'icon-file-pdf', 'name' => 'Pre Alert']
                    ]

                );
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
        $query = EoBillOfLading::leftJoin('mst_divisions', 'eo_bills_of_lading.division_id', '=', 'mst_divisions.id')
            ->leftJoin('mst_customers AS c1', 'eo_bills_of_lading.shipper_id', '=', 'c1.id')
            ->leftJoin('mst_customers AS c2', 'eo_bills_of_lading.consignee_id', '=', 'c2.id')
            ->leftJoin('mst_customers AS c3', 'eo_bills_of_lading.agent_id', '=', 'c3.id')
            ->leftJoin('mst_customers AS c4', 'eo_bills_of_lading.third_id', '=', 'c4.id')
            ->leftJoin('eo_shipment_entries AS f', 'eo_bills_of_lading.shipment_id', '=', 'f.id')
            ->orderBy('eo_bills_of_lading.bl_date', 'desc')
            ->orderBy('eo_bills_of_lading.code', 'desc')
            ->select(['eo_bills_of_lading.id','eo_bills_of_lading.code','eo_bills_of_lading.bl_class', 'eo_bills_of_lading.bl_type','eo_bills_of_lading.booking_code','eo_bills_of_lading.bl_date','eo_bills_of_lading.bl_status', 'mst_divisions.name AS division_name', 'c1.name AS shipper_name', 'c2.name AS consignee_name', 'c3.name AS agent_name', 'c4.name AS third_party_name', 'f.code AS shipment_code']);
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
            ['data' => 'code',             'name' => 'eo_bills_of_lading.code', 'title' => 'Code', 'width' => '45px'],
            ['data' => 'shipment_code',    'name' => 'f.code', 'title' => 'File#', 'width' => '45px'],
            ['data' => 'bl_status',        'name' => 'eo_bills_of_lading.bl_status', 'title' => 'Status', 'width' => '35px'],
            ['data' => 'bl_type',          'name' => 'eo_bills_of_lading.bl_type', 'title' => 'Type', 'width' => '35px'],
            ['data' => 'bl_date',          'name' => 'eo_bills_of_lading.bl_date', 'title' => 'Date', 'width' => '45px'],
            ['data' => 'booking_code',     'name' => 'eo_bills_of_lading.booking_code', 'title' => 'Booking#'],
            ['data' => 'shipper_name',     'name' => 'c1.name', 'title' => 'Shipper'],
            ['data' => 'consignee_name',   'name' => 'c2.name', 'title' => 'Consignee'],
            ['data' => 'third_party_name', 'name' => 'c4.name', 'title' => 'Third Party'],
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
