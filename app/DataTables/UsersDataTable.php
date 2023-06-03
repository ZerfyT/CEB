<?php

namespace App\DataTables;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class UsersDataTable extends DataTable
{
    private $tbActionComponent;

    public function __construct($tbActionComponent)
    {
        $this->tbActionComponent = $tbActionComponent;
    }

    /**
     * Build the DataTable class.
     *
     * @param  QueryBuilder  $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('actions', function ($user) {
                return view($this->tbActionComponent, compact('user'));

            });
        // ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     *
     * @param  User  $user User
     * @return QueryBuilder Query
     */
    public function query(User $model): QueryBuilder
    {
        return $model->newQuery()->where('role_id', 5);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('users-table')
            ->setTableAttribute([
                'class' => 'table table-bordered table-hover',
            ])
            ->setTableHeadClass('table-secondary')
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
            Column::make('id'),
            Column::make('name'),
            Column::make('email'),
            Column::make('address'),
            Column::make('account_number'),
            Column::computed('actions')
                ->title('Actions')
                ->exportable(false)
                ->printable(false)
                ->orderable(false)
                ->searchable(false)
                // ->width(300)
                ->addClass('text-center'),
            // ->view('components.tb_controllers') // Blade view for the actions column
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Users_'.date('YmdHis');
    }
}
