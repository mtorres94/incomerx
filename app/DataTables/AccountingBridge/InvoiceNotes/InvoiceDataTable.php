<?php

namespace Sass\DataTables\AccountingBridge\InvoiceNotes;

use Sass\AccInvoice;
use Sass\DataTables\CustomDataTable;
use Sass\Invoice;
use Sass\User;
use Yajra\Datatables\Services\DataTable;

class InvoiceDataTable extends CustomDataTable
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
            ->addColumn('action', function ($invoice) {
                return $this->groupButton(
                    $invoice,
                    'accounting_bridge.invoice_notes.invoices',[
                    ['route' => report_route('invoices.report', 1, $invoice->id), 'icon' => 'icon-file-pdf', 'name' => 'Cost Worksheet'],
                    ['route' => report_route('invoices.report', 2, $invoice->id), 'icon' => 'fa fa-barcode', 'name' => 'Invoice'],

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
        $query = AccInvoice::leftJoin('mst_customers AS c1', 'acc_invoices.shipper_id', '=', 'c1.id')
            ->leftJoin('mst_customers AS c2', 'acc_invoices.consignee_id', '=', 'c2.id')
            ->leftJoin('mst_customers AS c3', 'acc_invoices.agent_id', '=', 'c3.id')
            ->leftJoin('mst_customers AS c4', 'acc_invoices.bill_to_id', '=', 'c4.id')
            ->orderBy('acc_invoices.date', 'desc')
            ->orderBy('acc_invoices.code', 'desc')
            ->select(['acc_invoices.*', 'c1.name AS shipper_name', 'c2.name AS consignee_name', 'c3.name AS agent_name', 'c4.name AS bill_to_name']);
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
            ['data' => 'code',             'name' => 'acc_invoices.code', 'title' => 'Code', 'width' => '45px'],
            ['data' => 'shipment_code',    'name' => 'acc_invoices.shipment_code', 'title' => 'File#', 'width' => '45px'],
            ['data' => 'status',           'name' => 'acc_invoices.status', 'title' => 'Status', 'width' => '35px'],
            ['data' => 'type',             'name' => 'acc_invoices.type', 'title' => 'Type', 'width' => '35px'],
            ['data' => 'class',             'name' => 'acc_invoices.class', 'title' => 'Class', 'width' => '30px'],
            ['data' => 'date',             'name' => 'acc_invoices.date', 'title' => 'Date', 'width' => '50px'],
            ['data' => 'total_bill',       'name' => 'acc_invoices.total_bill', 'title' => 'Bill', 'width' => '35px'],
            ['data' => 'total_cost',       'name' => 'acc_invoices.total_cost', 'title' => 'Cost', 'width' => '35px'],
            ['data' => 'total_profit',     'name' => 'acc_invoices.total_profit', 'title' => 'Profit', 'width' => '35px'],
            ['data' => 'total_balance',    'name' => 'acc_invoices.total_balance', 'title' => 'Balance', 'width' => '35px'],
            ['data' => 'bill_to_name',     'name' => 'c4.name', 'title' => 'Bill To'],
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
