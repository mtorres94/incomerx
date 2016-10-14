<?php

namespace Sass\DataTables\Export\Ocean;

use Sass\DataTables\CustomDataTable;
use Sass\ShipmentEntry;
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
                    'export.oceans.shipment_entries.show',
                    'export.oceans.shipment_entries.edit',
                    'export.oceans.shipment_entries.destroy',
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
        $query = ShipmentEntry::select(['id']);
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
            'id',

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
