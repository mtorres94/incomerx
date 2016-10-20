<?php

namespace Sass\DataTables\Maintenance\DivisionsDepartments;

use Sass\DataTables\CustomDataTable;
use Sass\Division;

class DivisionDataTable extends CustomDataTable
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
            ->addColumn('action', function ($divisions) {
                return $this->groupButton($divisions, 'maintenance.divisions_departments.divisions', null);
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
        $query = Division::leftJoin('mst_states', 'mst_divisions.state_id', '=', 'mst_states.id')
            ->select([
                'mst_divisions.id',
                'mst_divisions.code',
                'mst_divisions.name',
                'mst_divisions.city',
                'mst_divisions.phone',
                'mst_divisions.fax',
                'mst_states.code as state_code',
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
            ['data' => 'code', 'name' => 'mst_divisions.code', 'title' => 'Code'],
            ['data' => 'name', 'name' => 'mst_divisions.name', 'title' => 'Name'],
            ['data' => 'city', 'name' => 'mst_divisions.city', 'title' => 'City'],
            ['data' => 'state_code', 'name' => 'mst_states.code', 'title' => 'State Code'],
            ['data' => 'phone', 'name' => 'mst_divisions.phone', 'title' => 'Phone'],
            ['data' => 'fax', 'name' => 'mst_divisions.fax', 'title' => 'Fax'],
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
