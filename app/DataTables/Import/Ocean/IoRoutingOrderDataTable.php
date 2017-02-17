<?php

namespace Sass\DataTables\Import\Ocean;

use Sass\DataTables\CustomDataTable;
use Sass\IoRoutingOrder;
use Sass\User;
use Yajra\Datatables\Services\DataTable;

class IoRoutingOrderDataTable extends CustomDataTable
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
            ->addColumn('action', function ($routing_order) {
                return $this->groupButton(
                    $routing_order,
                    'import.oceans.routing_order',
                    [
                        ['route' => 'io_routing_order.pdf',   'icon' => 'icon-file-pdf', 'name' => 'PDF'],
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
        $query = IoRoutingOrder::leftJoin('mst_customers AS c1', 'io_routing_order.shipper_id', '=', 'c1.id')
            ->leftJoin('mst_customers AS c2', 'io_routing_order.consignee_id', '=', 'c2.id')
            ->leftJoin('mst_ocean_ports AS p1', 'io_routing_order.port_loading_id', '=', 'p1.id')
            ->leftJoin('mst_ocean_ports AS p2', 'io_routing_order.port_unloading_id', '=', 'p2.id')
            ->select(['io_routing_order.id','io_routing_order.code','io_routing_order.status', 'io_routing_order.type','io_routing_order.date_today',  'c1.name AS shipper_name', 'c2.name AS consignee_name', 'p1.name as port_loading_name', 'p2.name as port_unloading_name' ]);
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
                    ->addAction(['width' => '130px'])
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
            ['data' => 'code',                  'name' => 'io_routing_order.code', 'title' => 'Code', 'width' => '45px'],
            ['data' => 'status',                'name' => 'io_routing_order.status', 'title' => 'Status', 'width' => '35px'],
            ['data' => 'type',                  'name' => 'io_routing_order.type', 'title' => 'Type', 'width' => '35px'],
            ['data' => 'date_today',            'name' => 'io_routing_order.date_today', 'title' => 'Date', 'width' => '40px'],
            ['data' => 'shipper_name',          'name' => 'c1.name', 'title' => 'Shipper'],
            ['data' => 'consignee_name',        'name' => 'c2.name', 'title' => 'Consignee'],
            ['data' => 'port_loading_name',     'name' => 'p1.name', 'title' => 'Loading Port'],
            ['data' => 'port_unloading_name',   'name' => 'p2.name', 'title' => 'Unloading Port'],
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
