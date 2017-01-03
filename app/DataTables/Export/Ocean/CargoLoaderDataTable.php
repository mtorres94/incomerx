<?php

namespace Sass\DataTables\Export\Ocean;

use Sass\EoCargoLoader;
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
            ->addColumn('action', function ($cargo_loader) {
                return $this->groupButton(
                    $cargo_loader,
                    'export.oceans.cargo_loader',[
                        ['route' => 'cargo_loader.pdf',   'icon' => 'icon-file-pdf', 'name' => 'PDF'],

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
        $query = EoCargoLoader::leftJoin('mst_customers AS c1', 'eo_cargo_loader.shipper_id', '=', 'c1.id')
            ->leftJoin('mst_customers AS c2', 'eo_cargo_loader.consignee_id', '=', 'c2.id')
            ->leftJoin('mst_customers AS c3', 'eo_cargo_loader.agent_id', '=', 'c3.id')
            ->leftJoin('mst_ocean_ports AS c4', 'eo_cargo_loader.port_loading_id', '=', 'c4.id')
            ->leftJoin('mst_ocean_ports AS c5', 'eo_cargo_loader.port_unloading_id', '=', 'c5.id')
            ->leftJoin('mst_carriers AS c6', 'eo_cargo_loader.carrier_id', '=', 'c6.id')
            ->select(['eo_cargo_loader.id','eo_cargo_loader.code','eo_cargo_loader.cargo_loader_status',  'c1.name AS shipper_name', 'c2.name AS consignee_name', 'c3.name AS agent_name', 'c4.name AS port_loading_name', 'c5.name AS port_unloading_name', 'c6.name as carrier_name']);
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
                    ->addAction(['width' => 'auto'])
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
            ['data' => 'code',   'name' => 'eo_cargo_loader.code', 'title' => 'Code'],
            ['data' => 'cargo_loader_status',          'name' => 'eo_cargo_loader.cargo_loader_status', 'title' => 'Status'],
            ['data' => 'shipper_name',     'name' => 'c1.name', 'title' => 'Shipper'],
            ['data' => 'consignee_name',   'name' => 'c2.name', 'title' => 'Consignee'],
            ['data' => 'agent_name',   'name' => 'c3.name', 'title' => 'Agent'],
            ['data' => 'port_loading_name',   'name' => 'c4.name', 'title' => 'Loading Port'],
            ['data' => 'port_unloading_name',   'name' => 'c5.name', 'title' => 'Unloading Port'],
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
