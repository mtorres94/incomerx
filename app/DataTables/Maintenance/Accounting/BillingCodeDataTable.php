<?php

namespace Sass\DataTables\Maintenance\Accounting;

use Sass\BillingCode;
use Sass\DataTables\CustomDataTable;
use Sass\User;
use Yajra\Datatables\Services\DataTable;

class BillingCodeDataTable extends CustomDataTable
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
            ->addColumn('action', function ($billing) {
                return $this->groupButton(
                    $billing,
                    'maintenance.accounting.billing_codes',null);
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
        $query = BillingCode::select('mst_billing_codes.*');
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
                    ->addAction(['width' => '80px']);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            ['data' => 'code',                  'name' => 'mst_billing_codes.code', 'title' => 'Code', 'width' => '35px'],
            ['data' => 'code_type',         'name' => 'mst_billing_codes.code_type', 'title' => ' Type', 'width' => '30px'],
            ['data' => 'billing_account',         'name' => 'mst_billing_codes.billing_account', 'title' => ' Billing Account', 'width' => '70px'],
            ['data' => 'cost_account',         'name' => 'mst_billing_codes.cost_account', 'title' => ' Cost Account', 'width' => '70px'],
            ['data' => 'name',            'name' => 'mst_billing_codes.name', 'title' => 'Name', 'width' => '70px'],
            ['data' => 'description',             'name' => 'mst_billing_codes.description', 'title' => 'Description', 'width' => '70px'],
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
