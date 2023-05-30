<?php

namespace App\DataTables;

use App\Models\Bill;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BillsDataTable extends DataTable
{

    private $user;

    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable($query): EloquentDataTable
    {
        return (new EloquentDataTable($query));
        // return (new EloquentDataTable($query))
        //     ->addColumn('action', function ($bill) {
        //         return '<a href="' . route('users.payments', $user->id) . '">View Payments</a>';
        //     });
        // ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Bill $model): QueryBuilder
    {
        return $model->newQuery()->where('user_id', $this->user->id);
        // return $model->newQuery()->with('user')->whereHas('user', function ($query) {
        //     $query->where('role_id', 5);
        // });
    }
    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            // ->setTableId('bills-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [

            Column::make('id'),
            Column::make('date'),
            Column::make('amount'),
            Column::make('status'),
            // Column::computed('action')
            //     ->exportable(false)
            //     ->printable(false)
            //     // ->width(60)
            //     ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Bills_' . date('YmdHis');
    }
}