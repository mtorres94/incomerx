<?php

namespace Sass\DataTables\Import\Air;

use Sass\DataTables\CustomDataTable;
use Sass\IaBillOfLading;
use Sass\User;
use Yajra\Datatables\Services\DataTable;

class IaBillOfLadingDataTable extends CustomDataTable
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
                    'import.air.bill_of_lading',
                    [
                        ['route' => 'ia_bill_of_lading.pre_alert',   'icon' => 'icon-file-pdf', 'name' => 'Pre Alert'],
                        ['route' => 'ia_bill_of_lading.delivery_order',   'icon' => 'icon-file-pdf', 'name' => 'Delivery Order'],
                        ['route' => 'ia_bill_of_lading.bill_of_lading',   'icon' => 'icon-file-pdf', 'name' => 'Bill of Lading'],
                        ['route' => 'ia_bill_of_lading.arrival_notice',   'icon' => 'icon-file-pdf', 'name' => 'Arrival Notice'],
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
        $query = IaBillOfLading::leftJoin('mst_divisions', 'ia_bill_of_lading.division_id', '=', 'mst_divisions.id')
            ->leftJoin('mst_customers AS c1', 'ia_bill_of_lading.shipper_id', '=', 'c1.id')
            ->leftJoin('mst_customers AS c2', 'ia_bill_of_lading.consignee_id', '=', 'c2.id')
            ->leftJoin('mst_customers AS c3', 'ia_bill_of_lading.agent_id', '=', 'c3.id')
            ->leftJoin('mst_customers AS c4', 'ia_bill_of_lading.forwarding_agent_id', '=', 'c4.id')
            ->leftJoin('mst_customers AS c5', 'ia_bill_of_lading.notify_id', '=', 'c5.id')
            ->select(['ia_bill_of_lading.id','ia_bill_of_lading.code','ia_bill_of_lading.bl_status', 'mst_divisions.name AS division_name', 'c1.name AS shipper_name', 'c2.name AS consignee_name', 'c3.name AS agent_name', 'c4.name AS forwarding_agent_name', 'c5.name AS notify_name']);
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
                    ->addAction(['width' => 'auto'])
                    ->parameters($this->getBuilderParameters());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            ['data' => 'code',   'name' => 'ia_bill_of_lading.code', 'title' => 'Code'],
            ['data' => 'bl_status',          'name' => 'ia_bill_of_lading.bl_status', 'title' => 'Status'],
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
