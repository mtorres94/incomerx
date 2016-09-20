<?php

namespace Sass\DataTables\Maintenance\CountriesDestinations;

use Sass\City;
use Sass\DataTables\CustomDataTable;

class CityDataTable extends CustomDataTable
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
            ->addColumn('action', function ($cities) {
                return $this->groupButton(
                    $cities,
                    'maintenance.countries_destinations.cities.show',
                    'maintenance.countries_destinations.cities.edit',
                    'maintenance.countries_destinations.cities.destroy',
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
        $query = City::leftJoin('mst_countries', 'mst_cities.country_id', '=', 'mst_countries.id')
            ->select([
                'mst_cities.id',
                'mst_cities.code',
                'mst_cities.name',
                'mst_countries.name as country',
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
            ['data' => 'code', 'name' => 'mst_cities.code', 'title' => 'Code'],
            ['data' => 'name', 'name' => 'mst_cities.name', 'title' => 'Name'],
            ['data' => 'country', 'name' => 'mst_countries.name', 'title' => 'Country'],
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