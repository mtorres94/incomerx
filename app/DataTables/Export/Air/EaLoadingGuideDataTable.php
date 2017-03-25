<?php

namespace Sass\DataTables\Export\Air;

use Sass\DataTables\CustomDataTable;
use Sass\EaLoadingGuide;
use Sass\User;
use Yajra\Datatables\Services\DataTable;

class EaLoadingGuideDataTable extends CustomDataTable
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
            ->addColumn('action', function ($loading_guide) {
                return $this->groupButton(
                    $loading_guide,
                    'export.air.loading_guides',[
                    ['route' => report_route('ea_loading_guides.report', 1, $loading_guide->id), 'icon' => 'icon-file-pdf', 'name' => 'LOAD PLAN'],
                    ['route' => report_route('ea_loading_guides.report', 2, $loading_guide->id), 'icon' => 'icon-file-pdf', 'name' => 'PACKING INSTRUCTIONS'],
                    ['route' => report_route('ea_loading_guides.report', 3, $loading_guide->id), 'icon' => 'icon-file-pdf', 'name' => 'LOAD LIST'],
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
        $query = EaLoadingGuide::leftJoin('mst_carriers AS c1', 'ea_loading_guides.carrier_id', '=', 'c1.id')
            ->leftJoin('mst_airports AS c4', 'ea_loading_guides.origin_id', '=', 'c4.id')
            ->leftJoin('mst_airports AS c5', 'ea_loading_guides.destination_id', '=', 'c5.id')
            ->leftJoin('ea_shipment_entries AS file', 'ea_loading_guides.shipment_id', '=', 'file.id')
            ->leftJoin('ea_booking_entries AS booking', 'ea_loading_guides.booking_id', '=', 'booking.id')
            ->orderBy('ea_loading_guides.date', 'desc')
            ->orderBy('ea_loading_guides.code', 'desc')
            ->select(['ea_loading_guides.id','ea_loading_guides.code','ea_loading_guides.shipment_type','ea_loading_guides.date', 'ea_loading_guides.status', 'c1.name AS carrier_name', 'c4.name AS origin_name', 'c5.name AS destination_name', 'file.code as shipment_code', 'booking.code as booking_code']);
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
            ['data' => 'code',                  'name' => 'ea_loading_guides.code', 'title' => 'Code', 'width' => '70px'],
            ['data' => 'date',            'name' => 'ea_loading_guides.date', 'title' => 'Date', 'width' => '45px'],
            ['data' => 'status',             'name' => 'ea_loading_guides.status', 'title' => 'Status', 'width' => '35px'],
            ['data' => 'shipment_type',         'name' => 'ea_loading_guides.shipment_type', 'title' => 'Type', 'width' => '35px'],
            ['data' => 'shipment_code',         'name' => 'file.shipment_code', 'title' => 'File#', 'width' => '45px'],
            ['data' => 'booking_code',         'name' => 'booking.booking_code', 'title' => 'Booking', 'width' => '60px'],
            ['data' => 'carrier_name',          'name' => 'c1.name', 'title' => 'Carrier'],
            ['data' => 'origin_name',     'name' => 'c4.name', 'title' => 'Origin'],
            ['data' => 'destination_name',   'name' => 'c5.name', 'title' => 'Destination'],
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
