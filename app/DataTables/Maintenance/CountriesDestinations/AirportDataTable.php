<?php

namespace Sass\DataTables\Maintenance\CountriesDestinations;

use Sass\Airport;
use Sass\DataTables\CustomDataTable;

class AirportDataTable extends CustomDataTable
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
            ->addColumn('action', function ($airports) {
                return $this->groupButton(
                    $airports,
                    'maintenance.countries_destinations.airports.show',
                    'maintenance.countries_destinations.airports.edit',
                    'maintenance.countries_destinations.airports.destroy',
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
        $query = Airport::leftJoin('mst_countries', 'mst_airports.country_id', '=', 'mst_countries.id')
            ->select([
                'mst_airports.id',
                'mst_airports.code',
                'mst_airports.name',
                'mst_airports.zip as postal_code',
                'mst_countries.code as country_code',
                'mst_countries.name as country_name',
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
            ['data' => 'code', 'name' => 'mst_airports.code', 'title' => 'Code'],
            ['data' => 'name', 'name' => 'mst_airports.name', 'title' => 'Name'],
            ['data' => 'country_code', 'name' => 'mst_countries.code', 'title' => 'Country Code'],
            ['data' => 'country_name', 'name' => 'mst_countries.name', 'title' => 'Country Name'],
            ['data' => 'postal_code', 'name' => 'mst_airports.zip', 'title' => 'Postal Code'],
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
