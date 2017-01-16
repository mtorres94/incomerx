<?php

namespace Sass\DataTables\Import\Ocean;

use Sass\DataTables\CustomDataTable;
use Sass\IoShipmentEntry;
use Sass\User;
use Yajra\Datatables\Services\DataTable;

class IoShipmentEntryDataTable extends CustomDataTable
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
                    'import.oceans.shipment_entries',null
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
        $query = IoShipmentEntry::leftJoin('mst_divisions', 'io_shipment_entries.division_id', '=', 'mst_divisions.id')
            ->leftJoin('mst_customers AS c1', 'io_shipment_entries.shipper_id', '=', 'c1.id')
            ->leftJoin('mst_customers AS c2', 'io_shipment_entries.consignee_id', '=', 'c2.id')
            ->leftJoin('mst_customers AS c3', 'io_shipment_entries.agent_id', '=', 'c3.id')
            ->leftJoin('mst_ocean_ports AS c4', 'io_shipment_entries.port_loading_id', '=', 'c4.id')
            ->leftJoin('mst_ocean_ports AS c5', 'io_shipment_entries.port_unloading_id', '=', 'c5.id')
            ->select(['io_shipment_entries.*','mst_divisions.name AS division_name', 'c1.name AS shipper_name', 'c2.name AS consignee_name', 'c3.name AS agent_name', 'c4.name AS port_loading_name', 'c5.name AS port_unloading_name']);
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
                    ->addAction(['width' => '80px'])
                    ->parameters($this->getBuilderParameters());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            ['data' => 'code',   'name' => 'io_shipment_entries.code', 'title' => 'Code'],
            ['data' => 'division_name',    'name' => 'mst_divisions.name', 'title' => 'Division'],
            ['data' => 'shipper_name',     'name' => 'c1.name', 'title' => 'Shipper'],
            ['data' => 'consignee_name',   'name' => 'c2.name', 'title' => 'Consignee'],

            ['data' => 'port_loading_name',   'name' => 'c4.name', 'title' => 'Port Loading'],
            ['data' => 'port_unloading_name',   'name' => 'c5.name', 'title' => 'Port Unloading'],
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
