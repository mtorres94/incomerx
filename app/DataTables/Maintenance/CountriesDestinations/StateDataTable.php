<?php

namespace Sass\DataTables\Maintenance\CountriesDestinations;

use Sass\DataTables\CustomDataTable;
use Sass\State;

class StateDataTable extends CustomDataTable
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
            ->addColumn('action', function ($states) {
                return $this->groupButton(
                    $states,
                    'maintenance.countries_destinations.states.show',
                    'maintenance.countries_destinations.states.edit',
                    'maintenance.countries_destinations.states.destroy',
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
        $query = State::leftJoin('mst_countries', 'mst_states.country_id', '=', 'mst_countries.id')
            ->select([
                'mst_states.id',
                'mst_states.code',
                'mst_states.name',
                'mst_states.tax',
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
            ['data' => 'code', 'name' => 'mst_states.code', 'title' => 'Code'],
            ['data' => 'name', 'name' => 'mst_states.name', 'title' => 'Name'],
            ['data' => 'country_code', 'name' => 'mst_countries.code', 'title' => 'Country Code'],
            ['data' => 'country_name', 'name' => 'mst_countries.name', 'title' => 'Country Name'],
            ['data' => 'tax', 'name' => 'mst_states.tax', 'title' => 'Tax'],
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