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
                    'warehouse.pickup.orders_entries.show',
                    'warehouse.pickup.orders_entries.edit',
                    'warehouse.pickup.orders_entries.destroy',
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
    {        $query = OrderEntry::select(['id','warehouse_id']);

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
        return ['id', 'warehouse_id'

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
