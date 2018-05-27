<?php

namespace App\DataTables;

use App\Models\Articulo;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Illuminate\Support\Facades\Storage;

class ArticuloDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'articulos.datatables_actions')
        ->editColumn('foto', function (Articulo $art) { 
            $url= Storage::url($art->foto); 
            return '<img src='.$url.' border="0" width="40" class="img-rounded" align="center" />'; 
     })->rawColumns(['foto','action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Post $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Articulo $model)
    {
        return $model->with('categoria','marca')->select('articulos.*');
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
            'cod_articulo' => ['title' => 'Codigo', 'width' => '10%'],
            'categoria_id' => ['data'=> 'categoria.nombre','title' => 'Categoria', 'name' => 'categoria.nombre'],
            'nombre',
            'marca_id' => ['data'=> 'marca.nombre','title' => 'Marca', 'name' => 'marca.nombre'],
            'foto' 
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'articulosdatatable_' . time();
    }
}