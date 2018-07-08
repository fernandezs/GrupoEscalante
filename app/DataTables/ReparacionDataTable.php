<?php

namespace App\DataTables;

use App\Models\Reparacion;
use App\Models\Cliete;
use App\Models\User;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class ReparacionDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'reparaciones.datatables_actions')->editColumn('estado', function(Reparacion $r) {
                $estado = $r->estado;
                switch ($estado) {
                    case 'INICIADO':
                        return '<span class="label label-default">INICIADO</span>';
                        break;
                    case 'EN TALLER':
                        return '<span class="label label-warning">INICIADO</span>';
                    case 'EN GARANTIA OFICIAL':
                        return '<span class="label label-info">EN GARANTIA</span>';
                    case 'CON FALTANTES':
                        return '<span class="label label-danger">CON FALTANTES</span>';
                    case 'ENTREGADO':
                        return '<span class="label label-success">ENTREGADO</span>';
                    default:
                        return '<span class="label label-default">'.$estado.'</span>';
                        break;
            }
        })->rawColumns(['estado', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Post $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Reparacion $model)
    {
        return $model->with('user','cliente','articulo.marca')->select('reparaciones.*');
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
            ->addAction(['width' => '80px','printable' => false])
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
            'cod_factura' => ['title' => 'Orden Nro', 'width' => '60px'],
            'articulo_id' => ['data' => 'articulo.nombre','name' => 'articulo.nombre', 'title' => 'Articulo', ],
            'marca' => ['data' => 'articulo.marca.nombre', 'name' => 'articulo.marca.nombre', 'title' => 'Marca'],
            'cliente_id'=> ['data' => 'cliente.nombre','name' => 'cliente.nombre', 'title' => 'Cliente', ],
            'user_id' => ['data' => 'user.username','name' => 'user.username', 'title' => 'Usuario', ],
            'costo_reparacion',
            'estado',
            'tipo_garantia',
            'fecha_ingreso',
            'fecha_egreso',
            'dias_garantia'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'reparacionesdatatable_' . time();
    }
}