<?php

namespace Sass\DataTables\Export\Ocean;

use Sass\CargoLoader;
use Sass\DataTables\CustomDataTable;
use Sass\User;
use Yajra\Datatables\Services\DataTable;

class CargoLoaderDataTable extends CustomDataTable
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
                    'export.oceans.cargo_loader',
                    null);
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
        $query = CargoLoader::leftJoin('mst_divisions', 'exp_cargo_loader.division_id', '=', 'mst_divisions.id')
            ->leftJoin('mst_customers AS c1', 'exp_cargo_loader.shipper_id', '=', 'c1.id')
            ->leftJoin('mst_customers AS c2', 'exp_cargo_loader.consignee_id', '=', 'c2.id')
            ->leftJoin('mst_customers AS c3', 'exp_cargo_loader.agent_id', '=', 'c3.id')
            ->leftJoin('mst_ocean_ports AS c4', 'exp_cargo_loader.port_loading_id', '=', 'c4.id')
            ->leftJoin('mst_ocean_ports AS c5', 'exp_cargo_loader.port_unloading_id', '=', 'c5.id')
            ->leftJoin('mst_carriers AS c6', 'exp_cargo_loader.carrier_id', '=', 'c6.id')
            ->select(['exp_cargo_loader.id','exp_cargo_loader.cargo_load_code','exp_cargo_loader.cargo_loader_status', 'mst_divisions.name AS division_name', 'c1.name AS shipper_name', 'c2.name AS consignee_name', 'c3.name AS agent_name', 'c4.name AS port_loading_name', 'c5.name AS port_unloading_name', 'c6.name as carrier_name']);
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
            ['data' => 'cargo_load_code',   'name' => 'exp_cargo_loader.cargo_load_code', 'title' => 'Code'],
            ['data' => 'cargo_loader_status',          'name' => 'exp_cargo_loader.cargo_loader_status', 'title' => 'Status'],
            ['data' => 'division_name',    'name' => 'mst_divisions.name', 'title' => 'Division'],
            ['data' => 'shipper_name',     'name' => 'c1.name', 'title' => 'Shipper'],
            ['data' => 'consignee_name',   'name' => 'c2.name', 'title' => 'Consignee'],
            ['data' => 'agent_name',   'name' => 'c3.name', 'title' => 'Agent'],
            ['data' => 'port_loading_name',   'name' => 'c4.name', 'title' => 'Port Loading'],
            ['data' => 'port_unloading_name',   'name' => 'c5.name', 'title' => 'Port Unloading'],
            ['data' => 'carrier_name',   'name' => 'c6.name', 'title' => 'Carrier'],
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
