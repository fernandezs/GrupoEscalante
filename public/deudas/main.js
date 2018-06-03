var vm = new Vue({
    el : '#deudas',
    data: {
        deuda : { },
        articulo : {marca : {}},
        selected : 0,
        descuento: 0,
        cantidad : 1,
        interes : 0,
        deuda_id : 0,
        estado : null,
        estado_real : null,
        detalles_subtotal : 0,
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
    computed : {
      importe_total() {
          interes = parseFloat(this.interes*0.01).toFixed(2)
          importe_interes = interes * this.importe_subtotal;
          return this.importe_subtotal + importe_interes;
      },
      importe_subtotal() {
          return this.detalles.reduce(function(total, detalle){
              return total + parseFloat(detalle.subtotal);
          }, 0);
        }
    },
    methods : {

        borrarArt(index)
        {
            Swal({
                title: 'Estas segudo de eliminar este articulo?',
                text: 'Este articulo ya no se volvera a recuperar!',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Si, borralo!',
                cancelButtonText: 'No, mantenlo'
            }).then((result) => {
                if (result.value) {
                    url = '/api/detalle_deudas/' + index;
                    axios.delete(url).then(response => {
                        this.detalles = this.obtenerDetalles();
                        this.actualizarSubtotal();
                        Swal(
                            'Eliminado!',
                            'El articulo fue eliminado.',
                            'success'
                        )
                    }).catch(error => {
                        console.log(error.response.data.data.message);
                    });

                    // For more information about handling dismissals please visit
                    // https://sweetalert2.github.io/#handling-dismissals
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal(
                        'Cancelado',
                        'El articulo no fue eliminado!',
                        'error'
                    )
                }
            })
        },

        obtenerDetalles()
        {
            var url = '/detalle_deudas/deuda/' + this.deuda_id;
            var self = this;
            axios.get(url).then(response => {
                self.detalles = response.data.data;
            }).catch(error => {
                console.log(error.response.data);
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
                    this.articulo = {marca: {}};
                    this.selected = 0;
                    this.detalles = this.obtenerDetalles();
                    this.actualizarSubtotal();
                    this.actualizarImporteTotal();
                    this.descuento = 0,
                    this.cantidad = 1,
                    swal({
                        position: 'top-end',
                        type: 'success',
                        title: 'Articulo agregado correctamente',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }).catch(error => {
                    toastr.error(error);
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

            var articulo = { id : 0, nombre: 'Seleccione un articulo'};
            axios.get('/api/articulos').then(response => {
                var articulos = response.data.data;
                articulos.unshift(articulo);
                this.articulos = articulos;
            }).catch(error => {
                //toastr.error(error.response.data.message);

            });
        },
        actualizarSubtotal()
        {
            url = '/admin/deudas/subtotal/' + this.deuda_id;
            axios.get(url).then(response => {
                this.detalles_subtotal = response.data;
                this.actualizarImporteTotal(response.data);
            }).catch(error => {
                console.log(error.response.data.message);
            });
        },
        actualizarImporteTotal(subtotal)
        {
            url = '/admin/deudas/total/' + this.deuda_id;
            axios.get(url).then(response => {

            })


        },
        obtenerDeuda()
        {
            url = '/api/deudas/'+ this.deuda_id;
            axios.get(url).then(response => {
                this.estado = response.data.data.estado;
                response.data.data.interes ? this.interes = response.data.data.interes : 0 ;
                this.deuda = response.data.data;
            });
        },
        obtenerArticulo()
        {
            if(this.selected != 0)
            {
                let self = this;
                url = '/api/articulos/'+ this.selected;

                axios.get(url).then(response => {
                    let articulo = response.data.data;
                    self.articulo = articulo;
                });
            }
        },
        validaCantidad()
        {
            if(this.cantidad < 1 )
            {
                this.cantidad = 1;
            }
            if(this.cantidad > this.articulo.cantidad)
            {
                this.cantidad = this.articulo.cantidad;
            }

        },
        validaDescuento()
        {
            if(this.descuento < 0)
            {
                this.descuento = 0;
            }
            if(this.descuento > 100)
            {

                this.descuento = 100;
            }
        },
        validaInteres()
        {
            if(this.interes < 0)
            {
                this.interes = 0;
            }
        },
        simular()
        {
            var self = this;
            var interes = parseFloat(self.interes*0.01).toFixed(2);
            var importe_interes =interes*self.detalles_subtotal;


            Swal({
                type: 'info',
                title: 'Nuevo importe: $' + this.importe_total,
                text: 'Se refleja el importe subtotal + $' + importe_interes + ' de intereses!',
                customClass: 'swal-wide',

            });
        }
    },
    mounted(){
            this.deuda_id = document.querySelector("#deuda_id").value;
            this.estado_real = document.querySelector("#estado_real").value;
            this.obtenerDetalles();
            this.obtenerArticulos();
            this.actualizarSubtotal();
            this.obtenerDeuda();

        }
});