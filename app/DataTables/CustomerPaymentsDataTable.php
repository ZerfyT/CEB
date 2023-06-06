<?php

namespace App\DataTables;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CustomerPaymentsDataTable extends DataTable
{
    private $billId;

    public function setBillId($billId)
    {
        $this->billId = $billId;

        return $this;
    }


    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query));
        // ->addColumn('action', 'customerpayments.action')
        // ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Payment $model): QueryBuilder
    {
        return $model->newQuery();
        // ->where('bill_id', $this->billId);
        // ->join('bills', 'payments.bill_id', '=', 'bills.id')
        // ->join('users', 'bills.user_id', '=', 'users.id')
        // ->select('payments.*')
        // ->where('bills.id', $this->billId)
        // ->where('users.id', $this->userId);
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
            ->setTableId('customerpayments-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
                // Button::make('excel'),
                // Button::make('csv'),
                // Button::make('pdf'),
                // Button::make('print'),
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
            Column::make('bill_id'),
            Column::make('amount'),
            Column::make('payment_type'),
            // Column::make('created_at'),
            // Column::make('updated_at'),
            // Column::computed('action')
            //       ->exportable(false)
            //       ->printable(false)
            //       ->width(60)
            //       ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'CustomerPayments_' . date('YmdHis');
    }
}
