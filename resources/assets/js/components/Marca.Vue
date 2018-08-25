<template>
    <div>
        <label for="marca_id">marca:</label>
        <div class="input-group select2-bootstrap-prepend">
            <select name="marca_id" id="marcas" v-model="marca" placeholder="" class="form-control" style="width: 100%;">
                <option :value="m.id" v-for="m in marcas">{{ m.nombre }}</option>
            </select>
            <span class="input-group-btn">
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modalMarca">
                    <span class="glyphicon glyphicon-plus"></span> Agregar
                </button>
            </span>
        </div>

<div class="modal fade-scale" id="modalMarca" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title"><i class="fa fa-edit"></i> Nueva marca</h3>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" @keyUp.enter="storeMarca()" v-model="nuevaMarca" id="marca">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" @click="storeMarca()">Guardar</button>
                <button class="btn" data-dismiss ="modal">Cancelar</button>
            </div>
      </div>
    </div>
  </div>
</div>
    </div>
</template>

<style>
.fade-scale {
  transform: scale(0);
  opacity: 0;
  -webkit-transition: all .25s linear;
  -o-transition: all .25s linear;
  transition: all .25s linear;
}

.fade-scale.in {
  opacity: 1;
  transform: scale(1);
}
</style>
<script>
import 'select2';                       
import 'select2/dist/css/select2.css';
import 'select2-bootstrap-theme/dist/select2-bootstrap.css';
    export default {
        props : ['marca_id'],
        data() {
            return {
                marcas : [],
                marca : null,
                nuevaMarca : null
            }
        },
        methods : {
            storeMarca() {
                console.log(this.nuevaMarca);
                axios.post('/api/marcas', { nombre : this.nuevaMarca}).then( res => {
                    this.nuevaMarca = null;
                    $("#modalMarca").modal('toggle');
                    this.marcas.push(res.data.data);
                    this.marca = res.data.data.id;
                    toastr.info(res.data.message);
                }).catch(res => {
                    toastr.error('Ocurrio un error: ' + res);
                });
            }
        },
        mounted() {
            if(this.marca_id != 0)
            {
                this.marca = this.marca_id;
            }
            axios.get('/api/marcas').then(res => {
                this.marcas = res.data.data;
            }).catch(error => {
                console.log(error);
            });
            $('#marcas')
                .select2({
                    placeholder: 'Seleccione una marca...',
                    data: self.marcas, // cargas los datos en vez de usar el loop
                    theme : 'bootstrap',
                    language : {
                        noResults : function () {
                            return 'No se han encontrado resultados!'
                        }
                    }
                })
                // nos hookeamos en el evento tal y como puedes leer en su documentación
                .on('select2:select', function () {
                    var value = $("#marcas").select2('data');
                    // nos devuelve un array

                    // ahora simplemente asignamos el valor a tu variable selected de VUE
                    self.marca = value[0].id;
                })

        }
    }


</script>