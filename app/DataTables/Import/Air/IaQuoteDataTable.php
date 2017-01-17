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
                        ['route' => 'ia_quotes.pdf',   'icon' => 'icon-file-pdf', 'name' => 'PDF'],
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
            ->select(['ia_quotes.id','ia_quotes.code','ia_quotes.status',  'c1.name AS shipper_name', 'c2.name AS consignee_name', 'c3.name AS agent_name',  'c5.name AS customer_name']);
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
                    ->addAction(['width' => 'auto'])
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
            ['data' => 'code',   'name' => 'ia_quotes.code', 'title' => 'Code'],
            ['data' => 'status',          'name' => 'ia_quotes.status', 'title' => 'Status'],
            ['data' => 'shipper_name',     'name' => 'c1.name', 'title' => 'Shipper'],
            ['data' => 'consignee_name',   'name' => 'c2.name', 'title' => 'Consignee'],
            ['data' => 'agent_name',   'name' => 'c3.name', 'title' => 'Agent'],
            ['data' => 'customer_name',   'name' => 'c5.name', 'title' => 'Customer'],
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