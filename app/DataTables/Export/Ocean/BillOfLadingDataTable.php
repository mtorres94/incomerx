<?php

namespace Sass\DataTables\Export\Ocean;

use Sass\BillOfLading;
use Sass\DataTables\CustomDataTable;
use Sass\User;
use Yajra\Datatables\Services\DataTable;

class BillOfLadingDataTable extends CustomDataTable
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
            ->addColumn('action', function ($bill_lading) {
                return $this->groupButton(
                    $bill_lading,
                    'export.oceans.bill_of_lading',
                    [
                        ['route' => 'bill_of_lading.pdf',   'icon' => 'icon-file-pdf', 'name' => 'B/L'],
                        ['route' => 'bill_of_lading.delivery_order',   'icon' => 'icon-file-pdf', 'name' => 'DO'],
                    ]

                );
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
        $query = BillOfLading::leftJoin('mst_divisions', 'exp_bills_of_lading.division_id', '=', 'mst_divisions.id')
            ->leftJoin('mst_customers AS c1', 'exp_bills_of_lading.shipper_id', '=', 'c1.id')
            ->leftJoin('mst_customers AS c2', 'exp_bills_of_lading.consignee_id', '=', 'c2.id')
            ->leftJoin('mst_customers AS c3', 'exp_bills_of_lading.agent_id', '=', 'c3.id')
            ->leftJoin('mst_customers AS c4', 'exp_bills_of_lading.forwarding_agent_id', '=', 'c4.id')
            ->leftJoin('mst_customers AS c5', 'exp_bills_of_lading.notify_id', '=', 'c5.id')
            ->select(['exp_bills_of_lading.id','exp_bills_of_lading.code','exp_bills_of_lading.bl_class','exp_bills_of_lading.bl_date','exp_bills_of_lading.bl_status', 'mst_divisions.name AS division_name', 'c1.name AS shipper_name', 'c2.name AS consignee_name', 'c3.name AS agent_name', 'c4.name AS forwarding_agent_name', 'c5.name AS notify_name']);
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
            ['data' => 'code',   'name' => 'exp_bills_of_lading.code', 'title' => 'Code'],
            ['data' => 'bl_status',          'name' => 'exp_bills_of_lading.bl_status', 'title' => 'Status'],
            ['data' => 'bl_date',          'name' => 'exp_bills_of_lading.bl_date', 'title' => 'Date'],
            ['data' => 'bl_class',          'name' => 'exp_bills_of_lading.bl_class', 'title' => 'Class'],
            ['data' => 'shipper_name',     'name' => 'c1.name', 'title' => 'Shipper'],
            ['data' => 'consignee_name',   'name' => 'c2.name', 'title' => 'Consignee'],
            ['data' => 'agent_name',   'name' => 'c3.name', 'title' => 'Agent'],


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
