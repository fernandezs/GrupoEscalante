<input type="hidden" value="{{ $deuda->id }}" id="deuda_id">
<input type="hidden" value="{{ $deuda->cliente_id}}" name="cliente_id">
<input type="hidden" :value="importe_total" name="importe_total">
<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">
                   <i class="fa fa-user"></i> {{ $deuda->cliente->nombre }}
                </h3>
            </div>
            <div class="box-body">
                <!-- Cliente Id Field -->
                {!! Form::label('cliente_nombre', 'Cliente N°:') !!}
                {!! $deuda->cliente->num_cliente !!}<br>
                {!! Form::label('cliente_nombre', 'Tipo de cliente:') !!}
                {!! $deuda->cliente->tipo !!}<br>
                {!! Form::label('telefono', 'Telefono:') !!}
                {!! $deuda->cliente->telefono !!}<br>
                {!! Form::label('direccion', 'Direccion:') !!}
                {!! $deuda->cliente->direccion !!}<br>
                <hr>
                <div class="form-group">
                    {!! Form::label('detalle', 'Breve descripcion:') !!}
                    {!! Form::textarea('detalle', null, ['class' => 'form-control', 'rows' => '6']) !!}
                </div>
            </div>
        </div>

    </div>
    <div class="col-md-6 col-sm-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">
                    Asigne todos los articulos que pertenezcan
                </h3>
            </div>
            <div class="box-body">
                <div class="form-group col-sm-12">
                    {!! Form::label('aritulos', 'Articulos:') !!}
                    <select class="form-control" v-model="articulo">
                        <option v-for="articulo in articulos" :value="articulo">@{{ articulo.nombre}}</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="">Descuento:</label>
                    <div class="input-group">
                            <span class="input-group-btn">
                                    <button class="btn" @click="descuento-=5" type="button">-</button>
                                </span>
                            <input type="number" v-model.number="descuento" class="form-control" >
                            <span class="input-group-btn">
                                <button class="btn" @click="descuento+=5" type="button">%</button>
                            </span>
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="">Cantidad:</label>
                    <div class="input-group">
                            <span class="input-group-btn">
                                    <button class="btn" @click="cantidad-=1" type="button">-</button>
                                </span>
                            <input type="text" v-model.number="cantidad" class="form-control">
                            <span class="input-group-btn">
                                <button class="btn" @click="cantidad+=1" type="button">+</button>
                            </span>
                    </div>
                </div>
                <div class="form-group col-md-4">
                    <label for="">Enviar a la lista</label>
                    <input type="button" value="Agregar" :disabled="estado == 'PAGADO'" class="btn btn-success btn-block" @click="agregarArticulo">
                </div>
            </div>
        </div>
        
    </div>
    <div class="col-md-6 col-sm-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">
    
                    </h3>
                </div>
                <div class="box-body">
                        <div class="form-group col-sm-6">
                                {!! Form::label('estado', 'Estado:') !!}
                                {!! Form::select('estado',['INPAGO' => 'Inpago', 'PAGADO' => 'Pagado'], $deuda->estado, ['class' => 'form-control', 'id' => 'estado', 'v-model' => 'estado']) !!}
                            </div>
                            
                            <!-- Interes Field -->
                            <div class="form-group col-sm-6">
                                {!! Form::label('interes', 'Interes:') !!}
                                {!! Form::number('interes', null, ['class' => 'form-control', 'v-model' => 'interes']) !!}
                            </div>
                            
                            <!-- Submit Field -->
                            <div class="form-group col-sm-12">
                                {!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
                                <a href="{!! route('deudas.index') !!}" class="btn btn-default">Cancelar</a>
                            </div>
                </div>
            </div>
        </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">
                    <i class="fa fa-cubes"></i> Lista de articulos adeudados
                </h3>
            </div>
            <div class="box-body">
                    @include('deudas.table_articulos')
            </div>
        </div>
        
    </div>
</div>












@push('scripts')
<script src="{{ asset('/deudas/main.js')}}"></script>
@endpush