<?php

namespace Sass\DataTables\Maintenance\Warehouse;

use Sass\DataTables\CustomDataTable;
use Sass\WarehouseFacility;

class WarehouseFacilityDataTable extends CustomDataTable
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
            ->addColumn('action', function ($warehouse_facilities) {
                return $this->groupButton($warehouse_facilities, 'maintenance.warehouse.warehouse_facilities', null);
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
        $query = WarehouseFacility::leftJoin('mst_divisions', 'mst_warehouse_facilities.division_id', '=', 'mst_divisions.id')
            ->leftJoin('mst_states', 'mst_warehouse_facilities.state_id', '=', 'mst_states.id')
            ->leftJoin('mst_world_locations', 'mst_warehouse_facilities.location_id', '=', 'mst_world_locations.id')
            ->select([
                'mst_warehouse_facilities.id',
                'mst_warehouse_facilities.code',
                'mst_warehouse_facilities.name',
                'mst_warehouse_facilities.city',
                'mst_warehouse_facilities.zip',
                'mst_divisions.name as division',
                'mst_states.name as state',
                'mst_world_locations.name as location',
            ]);

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
            ['data' => 'code', 'name' => 'mst_warehouse_facilities.code', 'title' => 'Code'],
            ['data' => 'name', 'name' => 'mst_warehouse_facilities.name', 'title' => 'Name'],
            ['data' => 'division', 'name' => 'mst_divisions.name', 'title' => 'Division'],
            ['data' => 'city', 'name' => 'mst_warehouse_facilities.city', 'title' => 'City'],
            ['data' => 'state', 'name' => 'mst_states.name', 'title' => 'State'],
            ['data' => 'zip', 'name' => 'mst_warehouse_facilities.zip', 'title' => 'Postal Code'],
            ['data' => 'location', 'name' => 'mst_world_locations.name', 'title' => 'Location'],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'warehousefacilitydatatables_' . time();
    }
}