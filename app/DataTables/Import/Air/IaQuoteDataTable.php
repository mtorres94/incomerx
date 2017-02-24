<?php

namespace Sass\DataTables\Import\Air;

use Sass\DataTables\CustomDataTable;
use Sass\IaQuote;
use Sass\User;
use Yajra\Datatables\Services\DataTable;

class IaQuoteDataTable extends CustomDataTable
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
            ->addColumn('action', function ($quotes) {
                return $this->groupButton(
                    $quotes,
                    'import.air.quotes',
                    [
                        ['route' => report_route('ia_quotes.report', 1, $quotes->id), 'icon' => 'icon-file-pdf', 'name' => 'PDF'],
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
        $query = IaQuote::leftJoin('mst_customers AS c1', 'ia_quotes.shipper_id', '=', 'c1.id')
            ->leftJoin('mst_customers AS c2', 'ia_quotes.consignee_id', '=', 'c2.id')
            ->leftJoin('mst_customers AS c3', 'ia_quotes.agent_id', '=', 'c3.id')
            ->leftJoin('mst_customers AS c5', 'ia_quotes.customer_id', '=', 'c5.id')
            ->leftJoin('mst_airports AS p1', 'ia_quotes.port_loading_id', '=', 'p1.id')
            ->leftJoin('mst_airports AS p2', 'ia_quotes.port_unloading_id', '=', 'p2.id')
            ->select(['ia_quotes.id','ia_quotes.code','ia_quotes.status', 'ia_quotes.type','ia_quotes.date_today', 'c1.name AS shipper_name', 'c2.name AS consignee_name', 'c3.name AS agent_name',  'c5.name AS customer_name', 'p1.name as loading_port_name', 'p2.name as unloading_port_name']);
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
            ['data' => 'code',                  'name' => 'ia_quotes.code', 'title' => 'Code', 'width'=>'45px'],
            ['data' => 'status',                'name' => 'ia_quotes.status', 'title' => 'Status', 'width' => '35px'],
            ['data' => 'type',                  'name' => 'ia_quotes.type', 'title' => 'Type', 'width' => '35px'],
            ['data' => 'date_today',            'name' => 'ia_quotes.date_today', 'title' => 'Date', 'width' => '40px'],
            ['data' => 'shipper_name',          'name' => 'c1.name', 'title' => 'Shipper'],
            ['data' => 'consignee_name',        'name' => 'c2.name', 'title' => 'Consignee'],
            ['data' => 'agent_name',            'name' => 'c3.name', 'title' => 'Agent'],
            ['data' => 'loading_port_name',     'name' => 'p1.name', 'title' => 'Loading Port'],
            ['data' => 'unloading_port_name',   'name' => 'p2.name', 'title' => 'Unloading Port'],
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
