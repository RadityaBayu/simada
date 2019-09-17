<?php

namespace App\DataTables;

use App\Models\satuanbarang;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class satuanbarangDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable
            ->editColumn('aktif', ' {{  \App\Models\BaseModel::$YesNoDs[$aktif] }}')
            ->editColumn('bisadibagi', ' {{  \App\Models\BaseModel::$YesNoDs[$bisadibagi] }}')
            ->addColumn('action', 'satuanbarangs.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\satuanbarang $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(satuanbarang $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'nama',
            'aktif',
            'bisadibagi'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'satuanbarangsdatatable_' . time();
    }
}
