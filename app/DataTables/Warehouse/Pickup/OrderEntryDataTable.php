<?php

namespace Sass\DataTables\Warehouse\Pickup;

use Sass\DataTables\CustomDataTable;
use Sass\OrderEntry;
use Sass\User;
use Yajra\Datatables\Services\DataTable;

class OrderEntryDataTable extends CustomDataTable
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
            ->addColumn('action', function ($order_entry) {
                return $this->groupButton(
                    $order_entry,
                    'warehouse.pickup.orders_entries', [
                    ['route' => 'orders_entries.pdf',   'icon' => 'icon-file-pdf', 'name' => 'PDF']
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
    {        $query = OrderEntry::leftJoin('mst_divisions', 'whr_orders_entries.division_id', '=', 'mst_divisions.id')
        ->leftJoin('mst_customers AS c1', 'whr_orders_entries.shipper_id', '=', 'c1.id')
        ->leftJoin('mst_customers AS c2', 'whr_orders_entries.consignee_id', '=', 'c2.id')
        ->leftJoin('mst_customers AS c3', 'whr_orders_entries.agent_id', '=', 'c3.id')
        ->leftJoin('mst_customers AS c4', 'whr_orders_entries.third_party_id', '=', 'c4.id')
        ->leftJoin('mst_customers AS c5', 'whr_orders_entries.pickup_id', '=', 'c5.id')
        ->select(['whr_orders_entries.id','whr_orders_entries.code','whr_orders_entries.pd_status', 'whr_orders_entries.date_order', 'mst_divisions.name AS division_name', 'c1.name AS shipper_name', 'c2.name AS consignee_name', 'c3.name AS agent_name', 'c4.name AS third_party_name',  'c5.name AS pickup_name']);
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
            ['data' => 'code',   'name' => 'whr_orders_entries.code', 'title' => 'Code'],
            ['data' => 'pd_status',          'name' => 'whr_orders_entries.pd_status', 'title' => 'Status'],
            ['data' => 'date_order',   'name' => 'whr_orders_entries.date_order', 'title' => 'Order Date'],
            ['data' => 'shipper_name',     'name' => 'c1.name', 'title' => 'Shipper'],
            ['data' => 'consignee_name',   'name' => 'c2.name', 'title' => 'Consignee'],
            ['data' => 'agent_name',   'name' => 'c3.name', 'title' => 'Agent'],
            ['data' => 'pickup_name',   'name' => 'c4.name', 'title' => 'Pick Up'],

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
