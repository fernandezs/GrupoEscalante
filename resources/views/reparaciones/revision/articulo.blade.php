<div class="box box-primary contenedor">
        <div class="box-header">
            <h3 class="box-title">
                <i class="fa fa-linode"></i> {{ $reparacion->articulo->nombre }}
            </h3>
        </div>
        <div class="box-body">
            <input type="hidden" :value="maquina.id" name="articulo_id">
            <!-- Cliente Id Field -->
            <i class="fa fa-barcode"></i> <label>Codigo N°:</label>
            {{ $reparacion->articulo->cod_articulo }}<br>
            <i class="fa fa-bars"></i> <label>Marca:</label>
            {{ $reparacion->articulo->marca->nombre}}<br>
            <i class="fa fa-microchip"></i> <label>Nro de cabezal:</label>
            {{ $reparacion->articulo->->nro_cabezal }}<br>
            <div class="form-group">
                <i class="fa fa-file-text-o"></i> <label>Descripcion:</label>
                <p>{{ $reparacion->articulo->descripcion }}</p>
            </div>
        </div>
</div>