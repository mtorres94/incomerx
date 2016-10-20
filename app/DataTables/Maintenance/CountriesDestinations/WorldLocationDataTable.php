<?php

namespace Sass\DataTables\Maintenance\CountriesDestinations;

use Sass\DataTables\CustomDataTable;
use Sass\WorldLocation;

class WorldLocationDataTable extends CustomDataTable
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
            ->addColumn('action', function ($world_locations) {
                return $this->groupButton($world_locations, 'maintenance.countries_destinations.world_locations', null);
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
        $query = WorldLocation::leftJoin('mst_countries', 'mst_world_locations.country_id', '=', 'mst_countries.id')
            ->leftJoin('mst_schedule_dks', 'mst_world_locations.scheduledk_id', '=', 'mst_schedule_dks.id')
            ->select([
                'mst_world_locations.id',
                'mst_world_locations.code',
                'mst_world_locations.name',
                'mst_countries.name as country',
                'mst_schedule_dks.name as schedule'
            ]);

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
            ['data' => 'code', 'name' => 'mst_world_locations.code', 'title' => 'Code'],
            ['data' => 'name', 'name' => 'mst_world_locations.name', 'title' => 'Name'],
            ['data' => 'country', 'name' => 'mst_countries.name', 'title' => 'Country'],
            ['data' => 'schedule', 'name' => 'mst_schedule_dks.name', 'title' => 'Schedule D & K'],
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