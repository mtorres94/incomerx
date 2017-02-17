<?php

namespace Sass\DataTables\Export\Ocean;

use Sass\EoCargoLoader;
use Sass\DataTables\CustomDataTable;
use Sass\User;
use Yajra\Datatables\Services\DataTable;

class CargoLoaderDataTable extends CustomDataTable
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
            ->addColumn('action', function ($cargo_loader) {
                return $this->groupButton(
                    $cargo_loader,
                    'export.oceans.cargo_loader',[
                        ['route' => 'cargo_loader.pdf',   'icon' => 'icon-file-pdf', 'name' => 'PDF'],

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
        $query = EoCargoLoader::leftJoin('mst_customers AS c1', 'eo_cargo_loader.shipper_id', '=', 'c1.id')
            ->leftJoin('mst_customers AS c2', 'eo_cargo_loader.consignee_id', '=', 'c2.id')
            ->leftJoin('mst_customers AS c3', 'eo_cargo_loader.agent_id', '=', 'c3.id')
            ->leftJoin('mst_ocean_ports AS c4', 'eo_cargo_loader.port_loading_id', '=', 'c4.id')
            ->leftJoin('mst_ocean_ports AS c5', 'eo_cargo_loader.port_unloading_id', '=', 'c5.id')
            ->leftJoin('mst_carriers AS c6', 'eo_cargo_loader.carrier_id', '=', 'c6.id')
            ->leftJoin('eo_shipment_entries AS f', 'eo_cargo_loader.shipment_id', '=', 'f.id')

            ->select(['eo_cargo_loader.id','eo_cargo_loader.code','eo_cargo_loader.cargo_loader_status', 'eo_cargo_loader.date_today','eo_cargo_loader.booking_code','eo_cargo_loader.shipment_type', 'c1.name AS shipper_name', 'c2.name AS consignee_name', 'c3.name AS agent_name', 'c4.name AS port_loading_name', 'c5.name AS port_unloading_name', 'c6.name as carrier_name', 'f.code as shipment_code']);
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
            ['data' => 'code',                  'name' => 'eo_cargo_loader.code', 'title' => 'Code', 'width' => '45px'],
            ['data' => 'shipment_code',         'name' => 'f.code', 'title' => 'File #', 'width' => '45px'],
            ['data' => 'cargo_loader_status',   'name' => 'eo_cargo_loader.cargo_loader_status', 'title' => 'Status', 'width' => '35px'],
            ['data' => 'shipment_type',         'name' => 'eo_cargo_loader.shipment_type', 'title' => 'Type', 'width' => '35px'],
            ['data' => 'date_today',            'name' => 'eo_cargo_loader.date_today', 'title' => 'Date', 'width' => '40px'],
            ['data' => 'booking_code',          'name' => 'eo_cargo_loader.booking_code', 'title' => 'Booking #'],
            ['data' => 'port_loading_name',     'name' => 'c4.name', 'title' => 'Loading Port'],
            ['data' => 'port_unloading_name',   'name' => 'c5.name', 'title' => 'Unloading Port'],
            ['data' => 'carrier_name',          'name' => 'c6.name', 'title' => 'Carrier'],
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
