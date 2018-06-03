<input type="hidden" value="{{ $deuda->id }}" id="deuda_id">
<input type="hidden" value="{{ $deuda->cliente_id}}" name="cliente_id">
<input type="hidden" value="{{ $deuda->estado }}" id="estado_real">
<div class="row">
    <div class="col-md-4 col-sm-12">
        <div class="box box-primary contenedor">
            <div class="box-header">
                <h3 class="box-title">
                   <i class="fa fa-user"></i> {{ $deuda->cliente->nombre }}
                </h3>
            </div>
            <div class="box-body">
                <!-- Cliente Id Field -->
                <i class="fa fa-users"></i> {!! Form::label('cliente_nombre', 'Cliente N°:') !!}
                {!! $deuda->cliente->num_cliente !!}<br>
                <i class="fa fa-address-card"></i> {!! Form::label('cliente_nombre', 'Tipo de cliente:') !!}
                {!! $deuda->cliente->tipo !!}<br>
                <i class="fa fa-phone"></i> {!! Form::label('telefono', 'Telefono:') !!}
                {!! $deuda->cliente->telefono !!}<br>
                <i class="fa fa-truck"></i> {!! Form::label('direccion', 'Direccion:') !!}
                {!! $deuda->cliente->direccion !!}<br>
                <div class="form-group">
                    <i class="fa fa-file"></i> {!! Form::label('detalle', 'Breve descripcion:') !!}
                    {!! Form::textarea('detalle', null, ['class' => 'form-control', 'rows' => '3']) !!}
                </div>
            </div>
        </div>

    </div>
    <div class="col-md-5 col-sm-12" v-if="estado_real == 'INPAGO'">
        <div class="box box-primary contenedor">
            <div class="box-header">
                <h3 class="box-title">
                   <i class="fa fa-cubes"></i> Asigne todos los articulos que pertenescan
                </h3>
            </div>
            <div class="box-body">
                {!! Form::label('aritulos', 'Articulos:') !!}
                <select name="" class="form-control" @change="obtenerArticulo()" v-model="selected">
                    <option v-for="art in articulos" :value="art.id">@{{ art.nombre}}</option>
                </select>

            <div class="form-group col-md-4">
                <label for="">Cantidad en stock:</label>
                <input type="text" disabled="true" v-model="articulo.cantidad" class="form-control">
            </div>
            <div class="form-group col-md-4">
                <label for="">Valor de venta:</label>
                <input type="text" disabled="true" v-model="articulo.precio_venta" class="form-control">
            </div>
            <div class="form-group col-md-4">
                <label for="">Marca:</label>
                <input type="text" v-model="articulo.marca.nombre" class="form-control" disabled="true">
            </div>
            <div class="form-group col-md-4">
                <label for="">Descuento:</label>
                <div class="input-group">
                            <span class="input-group-btn">
                                    <button class="btn btn-info" @click="descuento-=5" type="button" :disabled="!articulo.cantidad">-</button>
                                </span>
                    <input type="number" v-model.number="descuento" class="form-control" :onkeyup="validaDescuento()" :disabled="!articulo.cantidad">
                    <span class="input-group-btn">
                                <button class="btn btn-info" @click="descuento+=5" type="button" :disabled="!articulo.cantidad">%</button>
                            </span>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="">Cantidad:</label>
                <div class="input-group" class="error">
                            <span class="input-group-btn">
                                    <button class="btn btn-info" @click="cantidad-=1" type="button" :disabled="!articulo.cantidad">-</button>
                                </span>
                    <input type="number" min="0" max="100" v-model.number="cantidad" class="form-control" :onkeyup="validaCantidad()" :disabled="!articulo.cantidad">
                    <span class="input-group-btn">
                                <button class="btn btn-info" @click="cantidad+=1" type="button" :disabled="!articulo.cantidad">+</button>
                            </span>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="">Enviar a la lista</label>
                <input type="button" value="Agregar" class="btn btn-success btn-block" @click="agregarArticulo" :disabled="!articulo.cantidad || articulo.cantidad <=0">
            </div>
        </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-12">
            <div class="box box-primary contenedor">
                <div class="box-header">
                    <h3 class="box-title">
                       <i class="fa fa-handshake-o"></i> Estado de la deuda
                    </h3>
                </div>
                <div class="box-body">
                        <div class="form-group col-sm-6">
                                {!! Form::label('estado', 'Estado:') !!}
                                {!! Form::select('estado',['INPAGO' => 'Inpago', 'PAGADO' => 'Pagado'], $deuda->estado, ['class' => 'form-control', 'id' => 'estado', 'v-model' => 'estado']) !!}
                            </div>
                            
                            <!-- Interes Field -->
                            <div class="form-group col-sm-6" v-if="estado_real == 'INPAGO'">
                                {!! Form::label('interes', 'Interes:') !!}
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        </span>
                                            <input type="number" v-model="interes" class="form-control" name="interes" :onkeyup="validaInteres()">
                                            <span class="input-group-btn">
                                        <button class="btn btn-info" @click="interes+=1" type="button">+</button>
                                                
                                    </span>
                                </div>

                            </div>
                            
                            <!-- Submit Field -->
                            <div class="form-group col-sm-12">
                                {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
                                <a href="{!! route('deudas.index') !!}" class="btn btn-default">Cancelar</a>
                            </div>
                </div>
            </div>
        </div>



    <div class="col-md-12">
        
<div class="box box-info">
                <div class="box-header">
                <h3 class="box-title">
                    <i class="fa fa-cubes"></i> Lista de articulos adeudados
                </h3>
            </div>

            <div class="box-body">
                    <div class="table table-responsive">
                        @include('deudas.table_articulos')
                    </div>
            </div>
</div>
        
        
    </div>

</div>











@push('scripts')
<script src="{{ asset('/deudas/main.js')}}"></script>
<script>
    $(document).ready(function()
    {
        if($(window).width() > 650)
        {
            var heights = $('.contenedor').map(function()
            {
                 return $(this).height();
            }).get();
            maxHeight = Math.max.apply(null, heights);
            $('.contenedor').height(maxHeight);
        }

    })
</script>
@endpush