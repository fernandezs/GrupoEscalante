<?php

namespace App\DataTables;

use App\Models\Deuda;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class DeudaDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'deudas.datatables_actions')->editColumn('fecha_cobro', function(Deuda $deuda){
            if($deuda->fecha_cobro != null)
            {
                return $deuda->fecha_cobro->format('d/m/Y');
            }
            else
            {
                return "Sin movimientos!";
            }
        })->editColumn('estado', function(Deuda $deuda){
            if($deuda->estado == 'PAGADO')
            {
                return '<span class="label label-success">Pagado</span>';
            }
            else
            {
                return '<span class="label label-danger">Inpago</span>';
            }

        })->rawColumns(['action','estado']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Post $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Deuda $model)
    {
        return $model->with('user','cliente')->select('deudas.*');
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
            ->addAction(['width' => '100px','printable' => false])
            ->parameters([
                'dom'     => 'Bfrtip',
                'order'   => [[0, 'desc']],
                'language' => ['url' => asset('js/SpanishDataTables.json')],
                'scrollX' => false,
                'responsive' => true,
                'buttons' => [
                    'create',
                    'export',
                    'print',
                    'reset',
                    'reload',
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
            'remito_nro',
            'user_id' => ['data' => 'user.username','name' => 'user.username', 'title' => 'Usuario', ],
            'cliente_id'=> ['data' => 'cliente.nombre','name' => 'cliente.nombre', 'title' => 'Cliente', ],
            'estado',
            'importe_total',
            'fecha_cobro' => ['title' => 'Fecha de cobro'],
            'interes'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'deudasdatatable_' . time();
    }
}