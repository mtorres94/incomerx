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
            ->addColumn('status', function ($row) {
                $status = null;
                switch ($row->status) {
                    case 'O': $status = 'fa fa-folder-open-o'; break;
                    case 'P': $status = 'fa fa-files-o'; break;
                    case 'H': $status = 'fa fa-flag'; break;
                    case 'C': $status = 'fa fa-folder-o'; break;
                }
                return '<i class="'.$status.'" aria-hidden="true"></i>';
            })
            ->addColumn('attachment', function ($row) {
                return $row->attachment_details->count() > 0 ? '<i class="fa fa-paperclip" aria-hidden="true"></i>' : '';
            })
            ->addColumn('flag', function ($row) {
                $length = $row->cargo_details()->where('length', '>', 99)->count();
                $width  = $row->cargo_details()->where('width', '>', 99)->count();
                $height = $row->cargo_details()->where('height', '>', 99)->count();
                $weight = $row->cargo_details()->where('total_weight', '>', 8000)->count();
                return ($length > 0 || $width > 0 || $height > 0 || $weight > 0) ? '<i class="fa fa-flag orange" aria-hidden="true"></i>' : '';
            })
            ->addColumn('action', function ($receipt_entry) {
                return $this->groupButton($receipt_entry, 'warehouse.receipts.receipts_entries',
                    [
                        ['route' => report_route('receipts_entries.report', 1, $receipt_entry->id), 'icon' => 'icon-file-pdf', 'name' => 'PDF'],
                        ['route' => report_route('receipts_entries.report', 3, $receipt_entry->id), 'icon' => 'fa fa-barcode', 'name' => 'Label']
                    ]);
            })
            ->setRowAttr(['data-id' => '{{ $id }}'])
            ->setRowAttr(['data-status' => '{{ $status }}'])
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
            ->leftJoin('whr_receipts_entries_receiving_details', function ($join) {
                $join->on('whr_receipts_entries.id', '=', 'whr_receipts_entries_receiving_details.receipt_entry_id')
                    ->where('whr_receipts_entries_receiving_details.line', '=', 1);
            })
            ->select(['whr_receipts_entries.id', 'whr_receipts_entries.code', 'whr_receipts_entries.location_destination_code', 'whr_receipts_entries.date_in', 'whr_receipts_entries.mode',
                'whr_receipts_entries.status', 'is_hazardous', 'mst_divisions.name AS division_name', 'c1.name AS shipper_name',
                'c2.name AS consignee_name', 'c3.name AS third_party_name', 'c4.name AS agent_name', 'c5.name AS coloader_name',
                'whr_receipts_entries_receiving_details.pro_number'])
            ->orderBy('whr_receipts_entries.code', 'desc');

        if ($this->request()->get('status')) {
            if (!empty($this->request()->get('status'))) {
                $query->where('whr_receipts_entries.status', $this->request()->get('status'));
            }
        }

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
            ['data' => 'status',         'name' => 'whr_receipts_entries.status', 'title' => '<i class="fa fa-folder" aria-hidden="true"></i>', 'width' => '10px', 'orderable' => false],
            ['data' => 'attachment',     'name' => '', 'title' => '<i class="fa fa-paperclip" aria-hidden="true"></i>', 'width' => '10px', 'orderable' => false, 'bSearchable' => false],
            ['data' => 'flag',           'name' => '', 'title' => '<i class="fa fa fa-flag" aria-hidden="true"></i>', 'width' => '10px', 'orderable' => false, 'bSearchable' => false],
            ['data' => 'code',           'name' => 'whr_receipts_entries.code', 'title' => 'Code'],
            ['data' => 'date_in',        'name' => 'whr_receipts_entries.date_in', 'title' => 'Date in'],
            ['data' => 'shipper_name',   'name' => 'c1.name', 'title' => 'Shipper'],
            ['data' => 'consignee_name', 'name' => 'c2.name', 'title' => 'Consignee'],
            ['data' => 'agent_name',     'name' => 'c4.name', 'title' => 'Agent'],
            ['data' => 'is_hazardous',   'name' => 'whr_receipts_entries.is_hazardous', 'title' => 'Hazardous'],
            ['data' => 'location_destination_code',   'name' => 'whr_receipts_entries.location_destination_code', 'title' => 'Destination'],
            ['data' => 'pro_number',     'name' => 'whr_receipts_entries_receiving_details.pro_number', 'title' => 'Pro #'],
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
