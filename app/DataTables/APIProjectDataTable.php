<?php

namespace App\DataTables;

use App\Models\APIProject;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Livewire\Livewire;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class APIProjectDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('client_id', function($data) {
                return Livewire::mount('password-view', [
                    'value' => $data->client_id
                ]);
            })
            ->editColumn('client_secret', function($data) {
                return Livewire::mount('password-view', [
                    'value' => $data->client_secret
                ]);
            })
            ->addColumn('action', function($data) {
                return Livewire::mount('a-p-i-project-delete', [
                    'id' => $data->id
                ]);
            })
            ->setRowId('id')
            ->rawColumns(['client_id', 'client_secret', 'action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(APIProject $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('apiproject-table')
                    ->columns($this->getColumns())
                    ->dom('rtip')
                    ->drawCallbackWithLivewire()
                    ->minifiedAjax()
                    ->orderBy(1);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('nama_project'),
            Column::make('client_id'),
            Column::make('client_secret'),
            Column::make('action')
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'APIProject_' . date('YmdHis');
    }
}
