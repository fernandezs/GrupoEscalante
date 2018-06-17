<div class="form-group col-sm-12">
    <h3 class="pull-left"><i class="fa fa-files-o"></i> Lista de catalogos</h3>
    <h3 class="pull-right"><button type="button" onclick="window.location.reload()" class="btn btn-info"><i class="fa fa-refresh"></i> Refrescar</button></h3>
    <table class="table table-condensed">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($proveedor->catalogos as $catalogo)
                <tr>
                    <td>{{ $catalogo->name}}</td>
                    <td>{{ $catalogo->type}}</td>
                    <td>{{ $catalogo->created_at->format('d/m/Y')}}</td>
                    <td>
                        <a href="{{ Storage::url($catalogo->url)}}" class="btn btn-xs btn-success" title="Ver archivo"><i class="fa fa-eye"></i></a>
                        <a href="{{ route('catalogos.show', $catalogo)}}" class="btn btn-xs btn-primary" download><i class="fa fa-download"></i></a>
                        <span data-toggle="tooltip" title="Eliminar">
    <a href="#modal-delete-{{$catalogo->id}}" data-toggle="modal" data-keyboard="true" class='btn btn-danger btn-xs'>
        <i class="glyphicon glyphicon-remove"></i>
    </a>
</span>

<div class="modal fade modal-warning" id="modal-delete-{{$catalogo->id}}" tabindex='-1'>
    <div class="modal-dialog">
        <div class="modal-content">
            {!! Form::open(['route' => ['catalogos.destroy', $catalogo->id], 'method' => 'delete']) !!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Eliminar!</h4>
            </div>
            <div class="modal-body">
                Seguro desea eliminar el registro?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-danger">SI</button>
            </div>
            {!! Form::close() !!}
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<meta  name="csrf-token" content="{{ csrf_token() }}">
{!! Form::hidden('proveedor_id', $proveedor->id)!!}
<div class="form-group col-sm-12 col-md-12">
    {!! Form::label('archivo', 'Catalogos:') !!}
    <input id="files" name="archivo" type="file" class="main-section" multiple="true">
</div>

<div class="form-group col-sm-12">
    <a href="{!! route('proveedores.index') !!}" class="btn btn-default">Regresar</a>
</div>


@push('scripts')
    <script>
        $(function () {
            var $input = $("#files");
            $input.fileinput({
                language : 'es',
                uploadUrl: "/catalogos",
                showUpload: false, // hide upload button
                showRemove: false, // hide remove button
                minFileCount: 1,
                maxFileCount: 5,
                allowedFileExtensions: ["png","bmp","gif","jpg","pdf",'jpeg'],
                uploadExtraData: function() {
                    return {
                        _token: $("input[name='_token']").val(),
                        proveedor_id : $("input[name='proveedor_id']").val()
                    };
                },
                maxFileSize:5000,
                maxFilesNum: 10,
                slugCallback: function (filename) {
                    return filename.replace('(', '_').replace(']', '_');
                }
            });
        });
    </script>
@endpush