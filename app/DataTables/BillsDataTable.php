<?php

namespace App\DataTables;

use App\Models\Bill;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class BillsDataTable extends DataTable
{
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the DataTable class.
     *
     * @param  QueryBuilder  $query Results from query() method.
     */
    public function dataTable($query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('actions', function ($bill) {
                return view('components.tb_action_view_bill', compact('bill'));
                // ->setRowId('id');
            });
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
            ->setTableId('user-bills-table')
            ->setTableAttribute([
                'class' => 'table table-light table-bordered table-hover w-100',
            ])
            ->setTableHeadClass('table-success')
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
                Button::make('reload'),
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id')->title('#'),
            Column::make('new_reading_date')->title('Date')->defaultSort('desc'),
            Column::make('units'),
            Column::make('charge_for_month')->title('Monthly Cost'),
            Column::make('charge_total')->title('Total Cost'),
            Column::make('status'),
            Column::computed('actions')
                ->exportable(false)
                ->printable(false)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Bills_'.date('YmdHis');
    }
}
