<?php

namespace Sass\DataTables\Maintenance\Accounting;

use Sass\DataTables\CustomDataTable;
use Sass\GeneralLedgerAccount;
use Sass\User;
use Yajra\Datatables\Services\DataTable;

class GeneralLedgerAccountDataTable extends CustomDataTable
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
            ->addColumn('action', function ($general) {
                return $this->groupButton(
                    $general,
                    'maintenance.accounting.general',null);
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
        $query = GeneralLedgerAccount::leftJoin('mst_account_types AS acc', 'mst_general_ledger_accounts.type', '=', 'acc.id')
        ->select('mst_general_ledger_accounts.*', 'acc.name as type');
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
            ['data' => 'code',            'name' => 'mst_general_ledger_accounts.code', 'title' => 'Code'],
            ['data' => 'description',     'name' => 'mst_general_ledger_accounts.description', 'title' => 'Description'],
            ['data' => 'type',            'name' => 'acc.type', 'title' => 'Type']
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
