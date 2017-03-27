<?php

namespace Sass\DataTables\Maintenance\VendorsSuppliers;

use Sass\Carrier;
use Sass\DataTables\CustomDataTable;
use Sass\User;
use Yajra\Datatables\Services\DataTable;

class CarrierDataTable extends CustomDataTable
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
            ->addColumn('action', function ($carrier) {
                return $this->groupButton(
                    $carrier,
                    'maintenance.vendors_suppliers.carriers',null);
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
        $query = Carrier::leftJoin('mst_states AS c1', 'mst_carriers.state_id', '=', 'c1.id')
            ->leftJoin('mst_countries AS c2', 'mst_carriers.country_id', '=', 'c2.id')
            ->orderBy('mst_carriers.created_at', 'desc')
            ->orderBy('mst_carriers.code', 'desc')
            ->select(['mst_carriers.*', 'c1.name AS state_name', 'c2.name AS country_name']);
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
            ->addAction(['width' => '130px']);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            ['data' => 'code',                     'name' => 'mst_carriers.code', 'title' => 'Code', 'width' => '70px'],
            ['data' => 'name',                     'name' => 'mst_carriers.name', 'title' => 'Name'],
            ['data' => 'address',                  'name' => 'mst_carriers.address', 'title' => 'Address'],
            ['data' => 'city',                     'name' => 'mst_carriers.city', 'title' => 'City'],
            ['data' => 'state_name',               'name' => 'c1.name', 'title' => 'State'],
            ['data' => 'country_name',             'name' => 'c2.name', 'title' => 'Country'],
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
