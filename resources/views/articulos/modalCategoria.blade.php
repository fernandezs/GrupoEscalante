<div class="modal fade" role="dialog" id="modalCategoria" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title"><i class="fa fa-edit"></i> Nueva categoría</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                        {!! Form::label('nombre', 'Nombre') !!}
                        <input type="text" class="form-control" name="categoria" @keyUp.enter="storeCategoria()" v-model="modalC" id="modalC">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" @click="storeCategoria()">Guardar</button>
                <button class="btn" data-dismiss ="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
