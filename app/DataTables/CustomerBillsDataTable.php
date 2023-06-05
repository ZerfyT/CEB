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

class CustomerBillsDataTable extends DataTable
{

    private $userId;

    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($bill) {
                return view('components.customer_bill_button', [
                    'bill' => $bill,
                    'selectedBill' => $this->selectedBill,
                ]);
                // ->setRowId('id');
            });
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Bill $model): QueryBuilder
    {
        return $model->newQuery()->where('user_id', $this->userId);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableAttribute([
                'class' => 'table table-light table-bordered table-hover w-100'
            ])
            ->setTableHeadClass('table-success')
            ->setTableId('customerbills-table')
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
            Column::make('new_reading_date'),
            Column::make('charge_total'),
            Column::make('units'),
            Column::make('status'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                // ->width(60)
                ->addClass('text-center'),
            Column::computed('selectedBill')
                ->data('id')
                ->name('selectedBill')
                ->visible(false),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'CustomerBills_' . date('YmdHis');
    }
}
