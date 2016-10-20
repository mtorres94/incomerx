<?php

namespace Sass\DataTables\Maintenance\VendorsSuppliers;

use Sass\DataTables\CustomDataTable;
use Sass\Vendor;

class VendorDataTable extends CustomDataTable
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
            ->addColumn('action', function ($vendors) {
                return $this->groupButton($vendors, 'maintenance.vendors_suppliers.vendors', null);
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
        $query = Vendor::leftJoin('mst_states', 'mst_vendors.state_id', '=', 'mst_states.id')
            ->select([
                'mst_vendors.id',
                'mst_vendors.code',
                'mst_vendors.name',
                'mst_vendors.city',
                'mst_states.name as state'
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
            ['data' => 'code', 'name' => 'mst_vendors.code', 'title' => 'Code'],
            ['data' => 'name', 'name' => 'mst_vendors.name', 'title' => 'Name'],
            ['data' => 'city', 'name' => 'mst_vendors.city', 'title' => 'City'],
            ['data' => 'state', 'name' => 'mst_states.name', 'title' => 'State'],
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