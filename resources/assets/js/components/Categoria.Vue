<template>
    <div>
        <label for="categoria_id">Categoria:</label>
        <div class="input-group select2-bootstrap-prepend">
            <select name="categoria_id" id="categorias" v-model="categoria" placeholder="" class="form-control" style="width: 100%;">
                <option :value="cat.id" v-for="cat in categorias">{{ cat.nombre }}</option>
            </select>
            <span class="input-group-btn">
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modalCategoria">
                    <span class="glyphicon glyphicon-plus"></span> Agregar
                </button>
            </span>
        </div>

<div class="modal fade-scale" id="modalCategoria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title"><i class="fa fa-edit"></i> Nueva categoría</h3>
            </div>
            <div class="modal-body">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" @keyUp.enter="storeCategoria()" v-model="nuevaCategoria" id="categoria">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" @click="storeCategoria()">Guardar</button>
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
        props : ['categoria_id'],
        data() {
            return {
                categorias : [],
                categoria : null,
                nuevaCategoria : null
            }
        },
        methods : {
            storeCategoria() {
                console.log(this.nuevaCategoria);
                axios.post('/api/categorias', { nombre : this.nuevaCategoria}).then( res => {
                    this.nuevaCategoria = null;
                    $("#modalCategoria").modal('toggle');
                    this.categorias.push(res.data.data);
                    this.categoria = res.data.data.id;
                    toastr.info(res.data.message);
                }).catch(res => {
                    toastr.error('Ocurrio un error: ' + res);
                });
            }
        },
        mounted() {
            if(this.categoria_id != 0)
            {
                this.categoria = this.categoria_id;
            }
            axios.get('/api/categorias').then(res => {
                this.categorias = res.data.data;
                console.log(res.data.data);
            }).catch(error => {
                console.log(error);
            });
            $('#categorias')
                .select2({
                    placeholder: 'Seleccione una categoría...',
                    data: self.categorias, // cargas los datos en vez de usar el loop
                    theme : 'bootstrap',
                    language : {
                        noResults : function () {
                            return 'No se han encontrado resultados!'
                        }
                    }
                })
                // nos hookeamos en el evento tal y como puedes leer en su documentación
                .on('select2:select', function () {
                    var value = $("#categorias").select2('data');
                    // nos devuelve un array

                    // ahora simplemente asignamos el valor a tu variable selected de VUE
                    self.categoria = value[0].id;
                })

        }
    }


</script>

