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
            <hr>
            {!! Form::submit('Guardar', ['class' => 'btn btn-success btn-lg']) !!}
            <a href="{!! route('deudas.index') !!}" class="btn btn-default btn-lg">Cancelar</a>
        </div>
    </div>
</div>