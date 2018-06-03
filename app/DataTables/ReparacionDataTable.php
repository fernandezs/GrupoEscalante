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

        return $dataTable->addColumn('action', 'reparaciones.datatables_actions');
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
            'cod_factura' => ['title' => 'Codigo Factura', 'width' => '10px'],
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