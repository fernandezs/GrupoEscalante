<div class="modal fade" role="dialog" id="myModal" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title"><i class="fa fa-edit"></i> Nueva categoría</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
            {!! Form::open(['route' => 'categorias.store']) !!}

            <div class="form-group">
              {!! Form::label('nombre', 'Nombre') !!}
              {!! Form::text('nombre', null, ['class' => 'form-control', 'required'])!!}
            </div>
          </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Guardar</button>
              <button class="btn" data-dismiss ="modal">Cancelar</button>
              {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>