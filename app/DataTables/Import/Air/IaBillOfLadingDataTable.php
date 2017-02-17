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
            ->leftJoin('mst_airports AS p1', 'ia_bill_of_lading.port_loading_id', '=', 'p1.id')
            ->leftJoin('mst_airports AS p2', 'ia_bill_of_lading.port_unloading_id', '=', 'p2.id')
            ->leftJoin('ia_routing_order AS r', 'ia_bill_of_lading.routing_order_id', '=', 'r.id')
            ->select(['ia_bill_of_lading.id','ia_bill_of_lading.code','ia_bill_of_lading.bl_status','ia_bill_of_lading.bl_type','ia_bill_of_lading.date_today', 'mst_divisions.name AS division_name', 'c1.name AS shipper_name', 'c2.name AS consignee_name', 'c3.name AS agent_name', 'p1.name as loading_port_name', 'p2.name as unloading_port_name', 'r.code as routing_code']);
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
                    ->addAction(['width' => '130px'])
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
            ['data' => 'code',              'name' => 'ia_bill_of_lading.code', 'title' => 'Code'],
            ['data' => 'bl_status',         'name' => 'ia_bill_of_lading.bl_status', 'title' => 'Status', 'width' => '35px'],
            ['data' => 'bl_type',           'name' => 'ia_bill_of_lading.bl_type', 'title' => 'Type', 'width' => '35px'],
            ['data' => 'date_today',        'name' => 'ia_bill_of_lading.date_today', 'title' => 'Date', 'width' => '40px'],
            ['data' => 'routing_code',      'name' => 'r.code', 'title' => 'Routing #', 'width' => '55px'],
            ['data' => 'shipper_name',      'name' => 'c1.name', 'title' => 'Shipper'],
            ['data' => 'consignee_name',    'name' => 'c2.name', 'title' => 'Consignee'],
            ['data' => 'agent_name',        'name' => 'c3.name', 'title' => 'Agent'],
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
