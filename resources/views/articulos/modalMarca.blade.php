<div class="modal fade" role="dialog" id="modalMarca" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title"><i class="fa fa-edit"></i> Nueva marca</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    {!! Form::label('nombre', 'Nombre') !!}
                    <input type="text" @keyUp.enter="storeMarca()" name="marca" class="form-control" v-model="modalM" id="modalM">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" @click="storeMarca()">Guardar</button>
                <button class="btn" data-dismiss ="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>