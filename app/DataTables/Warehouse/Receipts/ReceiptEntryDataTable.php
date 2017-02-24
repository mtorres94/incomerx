<?php

namespace Sass\DataTables\Warehouse\Receipts;

use Sass\DataTables\CustomDataTable;
use Sass\ReceiptEntry;

class ReceiptEntryDataTable extends CustomDataTable
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
            ->addColumn('action', function ($receipt_entry) {
                return $this->groupButton($receipt_entry, 'warehouse.receipts.receipts_entries',
                    [
                        ['route' => report_route('receipts_entries.report', 1, $receipt_entry->id), 'icon' => 'icon-file-pdf', 'name' => 'PDF'],
                        ['route' => report_route('receipts_entries.report', 3, $receipt_entry->id), 'icon' => 'fa fa-barcode', 'name' => 'Label']
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
        $query = ReceiptEntry::leftJoin('mst_divisions', 'whr_receipts_entries.division_id', '=', 'mst_divisions.id')
            ->leftJoin('mst_customers AS c1', 'whr_receipts_entries.shipper_id', '=', 'c1.id')
            ->leftJoin('mst_customers AS c2', 'whr_receipts_entries.consignee_id', '=', 'c2.id')
            ->leftJoin('mst_customers AS c3', 'whr_receipts_entries.third_party_id', '=', 'c3.id')
            ->leftJoin('mst_customers AS c4', 'whr_receipts_entries.agent_id', '=', 'c4.id')
            ->leftJoin('mst_customers AS c5', 'whr_receipts_entries.coloader_id', '=', 'c5.id')
            ->select(['whr_receipts_entries.id', 'whr_receipts_entries.code', 'whr_receipts_entries.date_in', 'whr_receipts_entries.status', 'whr_receipts_entries.mode', 'mst_divisions.name AS division_name', 'c1.name AS shipper_name', 'c2.name AS consignee_name', 'c3.name AS third_party_name', 'c4.name AS agent_name', 'c5.name AS coloader_name'])
            ->orderBy('whr_receipts_entries.code', 'desc');

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
            [
                "className"  => 'details-control',
                "orderable"  => false,
                "searchable" => false,
                "data"       => 'details',
                "defaultContent" => '',
                "title" => '',
                "width" => '40px'
            ],
            ['data' => 'status',         'name' => 'whr_receipts_entries.status', 'title' => 'Status'],
            ['data' => 'code',           'name' => 'whr_receipts_entries.code', 'title' => 'Code'],
            ['data' => 'date_in',        'name' => 'whr_receipts_entries.date_in', 'title' => 'Date in'],
            ['data' => 'mode',           'name' => 'whr_receipts_entries.mode', 'title' => 'Mode'],
            ['data' => 'division_name',  'name' => 'mst_divisions.name', 'title' => 'Division'],
            ['data' => 'shipper_name',   'name' => 'c1.name', 'title' => 'Shipper'],
            ['data' => 'consignee_name', 'name' => 'c2.name', 'title' => 'Consignee'],
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
