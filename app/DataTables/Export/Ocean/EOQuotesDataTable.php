<?php

namespace Sass\DataTables\Export\Ocean;

use Sass\DataTables\CustomDataTable;
use Sass\ExportOceanQuotes;
use Sass\User;
use Yajra\Datatables\Services\DataTable;

class EoQuotesDataTable extends CustomDataTable
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
            ->addColumn('action', function ($quotes) {
                return $this->groupButton(
                    $quotes,
                    'export.oceans.quotes',
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
        $query = ExportOceanQuotes::leftJoin('mst_divisions', 'exp_oceans_quotes.division_id', '=', 'mst_divisions.id')
            ->leftJoin('mst_customers AS c1', 'exp_oceans_quotes.shipper_id', '=', 'c1.id')
            ->leftJoin('mst_customers AS c2', 'exp_oceans_quotes.consignee_id', '=', 'c2.id')
            ->leftJoin('mst_customers AS c3', 'exp_oceans_quotes.agent_id', '=', 'c3.id')
            ->leftJoin('mst_ocean_ports AS c4', 'exp_oceans_quotes.port_loading_id', '=', 'c4.id')
            ->leftJoin('mst_ocean_ports AS c5', 'exp_oceans_quotes.port_unloading_id', '=', 'c5.id')
            ->select(['exp_oceans_quotes.id','exp_oceans_quotes.code','mst_divisions.name AS division_name', 'c1.name AS shipper_name', 'c2.name AS consignee_name', 'c3.name AS agent_name', 'c4.name AS port_loading_name', 'c5.name AS port_unloading_name']);
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
            ['data' => 'code',   'name' => 'exp_oceans_quotes.code', 'title' => 'Code'],

            ['data' => 'shipper_name',     'name' => 'c1.name', 'title' => 'Shipper'],
            ['data' => 'consignee_name',   'name' => 'c2.name', 'title' => 'Consignee'],
            ['data' => 'agent_name',   'name' => 'c3.name', 'title' => 'Agent'],

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