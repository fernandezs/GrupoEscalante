<table class="table table-hover table-striped" id="articulos_deudores">
        <thead>
            <tr>
                <th>Codigo art</th>
                <th>Nombre</th>
                <th>Marca</th>
                <th>Precio costo</th>
                <th>Precio venta</th>
                <th>Descuento</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
                <th colspan="2">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(detalle, index) in detalles">
                <td width="10px">@{{detalle.articulo.cod_articulo}}</td>
                <td>@{{detalle.articulo.nombre}}</td>
                <td>@{{detalle.articulo.marca.nombre}}</td>
                <td>$@{{detalle.articulo.precio_costo}}</td>
                <td>$@{{detalle.articulo.precio_venta}}</td>
                <td>@{{detalle.descuento}}%</td>
                <td>@{{detalle.cantidad}}</td>
                <td>$@{{detalle.subtotal}}</td>
                <td>
                    <button v-if="estado_real == 'INPAGO'" type="button" class="btn btn-sm btn-danger" @click="borrarArt(detalle.id)"><span class="fa fa-trash"></span></button>
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><b>Subtotal:</b> </td>
                <td><b>$@{{ importe_subtotal }}</b></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><b>Intereses:</b> </td>
                <td><b>@{{ interes }}%</b></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><b>Importe total:</b> </td>
                <td><b>$@{{ importe_total }}</b></td>
            </tr>
        </tbody>
</table>

