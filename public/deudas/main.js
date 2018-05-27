
new Vue({
    el : '#deudas',
    data: {
        articulo : null,
        descuento: 0,
        cantidad : 1,
        interes : 0,
        deuda_id : 0,
        estado : null,
        detalles_subtotal : 0,
        importe_total : 0,
        articulos : [],
        detalles: [],
        detalle : { deuda_id : '',
                    articulo_id : '', 
                    precio_costo : '', 
                    precio_venta : '',
                    cantidad : '',
                    descuento : '', 
                    subtotal : ''}
    },
    methods : {
        obtenerDetalles()
        {
            url = '/detalle_deudas/deuda/' + this.deuda_id;
            axios.get(url).then(response => {
                this.detalles = response.data.data;
            }).catch(error => {
                console.log(error.response.data);
            });
        },
        borrarArticulo(index){
            url = '/api/detalle_deudas/' + index;
            axios.delete(url).then(response => {
                toastr.warning('Articulo eliminado correctamente!');
                this.detalles = this.obtenerDetalles();
                this.actualizarSubtotal();
            }).catch(error => {
                console.log(error.response.data.message);
            });
            
        },
        agregarArticulo(){
            if(this.articulo != null){
                url = '/api/detalle_deudas';
                this.detalle.deuda_id = parseInt(this.deuda_id);
                this.detalle.articulo_id = parseInt(this.articulo.id);
                this.detalle.precio_costo = this.articulo.precio_costo;
                this.detalle.precio_venta = this.articulo.precio_venta;
                this.detalle.cantidad  = this.cantidad;
                this.detalle.descuento = this.descuento;
                this.detalle.subtotal = this.subtotal(this.articulo.precio_venta, this.descuento, this.cantidad);
                axios.post(url, this.detalle).then(response => {
                    this.detalles = this.obtenerDetalles();
                    this.actualizarSubtotal();
                    this.descuento = 0,
                    this.cantidad = 1,
                    toastr.success('Detalle guardado exitosamente!');
                }).catch(error => {
                    toastr.error(error.response.data.message);
                });
            }
            else{
                toastr.warning('Debes seleccionar un articulo!');
            }
        },
        subtotal(precio, descuento, cantidad)
        {   descuento = parseInt(descuento);
            cantidad = parseInt(cantidad);
            vDescuento = (descuento*precio)/100;
            realPrecio = precio - vDescuento;
            subtotal = realPrecio*cantidad;
            return subtotal.toFixed(2);
        },
        obtenerArticulos()
        {
            axios.get('/api/articulos').then(response => {
                this.articulos = response.data.data;
            });
        },
        actualizarSubtotal()
        {
            url = '/admin/deudas/importe/' + this.deuda_id;
            axios.get(url).then(response => {
                this.detalles_subtotal = response.data;
            }).catch(error => {
                console.log(error.response.data.message);
            });
        },
        obtenerDeuda()
        {
            url = '/api/deudas/'+ this.deuda_id;
            axios.get(url).then(response => {
                this.estado = response.data.data.estado;
                this.interes = response.data.data.interes;
                this.importe_total = response.data.data.importe_total;
            });
        }
    },
    mounted(){
            this.deuda_id = document.querySelector("#deuda_id").value;
            this.obtenerDetalles();
            this.obtenerArticulos();
            this.actualizarSubtotal();
            this.obtenerDeuda();
        }
});