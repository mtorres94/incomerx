<?php

namespace Sass\DataTables\Export\Ocean;

use Sass\DataTables\CustomDataTable;
use Sass\EoShipmentEntry;
use Sass\User;
use Yajra\Datatables\Services\DataTable;

class ShipmentEntryDataTable extends CustomDataTable
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
            ->addColumn('action', function ($shipment_entries) {
                return $this->groupButton(
                    $shipment_entries,
                    'export.oceans.shipment_entries',[
                    ['route' => 'shipment_entries.pdf',   'icon' => 'icon-file-pdf', 'name' => 'Booking Confirmation'],
                    ['route' => 'shipment_entries.container_release',   'icon' => 'icon-file-pdf', 'name' => 'Container Release'],
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
        $query = EoShipmentEntry::leftJoin('mst_divisions', 'eo_shipment_entries.division_id', '=', 'mst_divisions.id')
            ->leftJoin('mst_customers AS c1', 'eo_shipment_entries.shipper_id', '=', 'c1.id')
            ->leftJoin('mst_customers AS c2', 'eo_shipment_entries.consignee_id', '=', 'c2.id')
            ->leftJoin('mst_customers AS c3', 'eo_shipment_entries.agent_id', '=', 'c3.id')
            ->leftJoin('mst_ocean_ports AS c4', 'eo_shipment_entries.port_loading_id', '=', 'c4.id')
            ->leftJoin('mst_ocean_ports AS c5', 'eo_shipment_entries.port_unloading_id', '=', 'c5.id')
            ->select(['eo_shipment_entries.id','eo_shipment_entries.code','eo_shipment_entries.date_today', 'eo_shipment_entries.booking_code','mst_divisions.name AS division_name', 'c1.name AS shipper_name', 'c2.name AS consignee_name', 'c3.name AS agent_name', 'c4.name AS port_loading_name', 'c5.name AS port_unloading_name']);
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
                    ->addAction(['width' => 'auto']);

    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            ['data' => 'code',   'name' => 'eo_shipment_entries.code', 'title' => 'Code'],
            ['data' => 'date_today',   'name' => 'eo_shipment_entries.date_today', 'title' => 'Date'],
            ['data' => 'booking_code',   'name' => 'eo_shipment_entries.booking_code', 'title' => 'Booking'],
            ['data' => 'shipper_name',     'name' => 'c1.name', 'title' => 'Shipper'],
            ['data' => 'consignee_name',   'name' => 'c2.name', 'title' => 'Consignee'],

            ['data' => 'port_loading_name',   'name' => 'c4.name', 'title' => 'Loading Port'],
            ['data' => 'port_unloading_name',   'name' => 'c5.name', 'title' => 'Unloading Port'],

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
