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