<?php

namespace Sass\DataTables\Export\Ocean;

use Sass\BookingEntry;
use Sass\DataTables\CustomDataTable;
use Sass\User;
use Yajra\Datatables\Services\DataTable;

class BookingEntryDataTable extends CustomDataTable
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
            ->addColumn('action', function ($booking_entry) {
                return $this->groupButton(
                    $booking_entry,
                    'export.oceans.booking_entries',
                    null);
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

        $query = BookingEntry::leftJoin('mst_divisions', 'exp_booking_entries.division_id', '=', 'mst_divisions.id')
            ->leftJoin('mst_customers AS c1', 'exp_booking_entries.shipper_id', '=', 'c1.id')
            ->leftJoin('mst_customers AS c2', 'exp_booking_entries.consignee_id', '=', 'c2.id')
            ->leftJoin('mst_customers AS c3', 'exp_booking_entries.agent_id', '=', 'c3.id')
            ->leftJoin('mst_customers AS c4', 'exp_booking_entries.forwarding_agent_id', '=', 'c4.id')
            ->select(['exp_booking_entries.id','exp_booking_entries.booking_code','exp_booking_entries.status', 'mst_divisions.name AS division_name', 'c1.name AS shipper_name', 'c2.name AS consignee_name', 'c3.name AS agent_name', 'c4.name AS forwarding_agent_name']);
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
            ['data' => 'booking_code',   'name' => 'exp_booking_entries.booking_code', 'title' => 'Code'],
            ['data' => 'status',          'name' => 'exp_booking_entries.status', 'title' => 'Status'],
            ['data' => 'division_name',    'name' => 'mst_divisions.name', 'title' => 'Division'],
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
