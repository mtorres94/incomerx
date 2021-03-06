<?php

namespace Sass\DataTables\Import\Ocean;

use Sass\DataTables\CustomDataTable;
use Sass\IoBillOfLading;
use Sass\User;
use Yajra\Datatables\Services\DataTable;

class IoBillOfLadingDataTable extends CustomDataTable
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
                    'import.oceans.bill_of_lading',
                    [
                        ['route' => report_route('io_bill_of_lading.report', 1, $bill_lading->id), 'icon' => 'icon-file-pdf', 'name' => 'Pre Alert'],
                        ['route' => report_route('io_bill_of_lading.report', 2, $bill_lading->id), 'icon' => 'icon-file-pdf', 'name' => 'Delivery Order'],
                        ['route' => report_route('io_bill_of_lading.report', 3, $bill_lading->id), 'icon' => 'icon-file-pdf', 'name' => 'Bill of Lading'],
                        ['route' => report_route('io_bill_of_lading.report', 4, $bill_lading->id), 'icon' => 'icon-file-pdf', 'name' => 'Arrival Notice']
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
        $query = IoBillOfLading::leftJoin('mst_divisions', 'io_bill_of_lading.division_id', '=', 'mst_divisions.id')
            ->leftJoin('mst_customers AS c1', 'io_bill_of_lading.shipper_id', '=', 'c1.id')
            ->leftJoin('mst_customers AS c2', 'io_bill_of_lading.consignee_id', '=', 'c2.id')
            ->leftJoin('mst_customers AS c3', 'io_bill_of_lading.agent_id', '=', 'c3.id')
            ->leftJoin('mst_customers AS c4', 'io_bill_of_lading.forwarding_agent_id', '=', 'c4.id')
            ->leftJoin('mst_customers AS c5', 'io_bill_of_lading.notify_id', '=', 'c5.id')
            ->leftJoin('io_routing_order AS r', 'io_bill_of_lading.routing_order_id', '=', 'r.id')
            ->select(['io_bill_of_lading.id','io_bill_of_lading.code','io_bill_of_lading.status','io_bill_of_lading.bl_type', 'io_bill_of_lading.date', 'mst_divisions.name AS division_name', 'c1.name AS shipper_name', 'c2.name AS consignee_name', 'c3.name AS agent_name', 'c4.name AS forwarding_agent_name', 'c5.name AS notify_name', 'r.code as routing_code']);
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
            ['data' => 'code',              'name' => 'io_bill_of_lading.code', 'title' => 'Code'],
            ['data' => 'status',         'name' => 'io_bill_of_lading_oceans.status', 'title' => 'Status', 'width'=> '35px'],
            ['data' => 'bl_type',           'name' => 'io_bill_of_lading_oceans.bl_type', 'title' => 'Type', 'width'=> '35px'],
            ['data' => 'date',           'name' => 'io_bill_of_lading_oceans.date', 'title' => 'Date', 'width'=> '40px'],
            ['data' => 'routing_code',      'name' => 'r.code', 'title' => 'Routing #'],
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
