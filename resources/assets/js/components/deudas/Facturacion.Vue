<template>
    <div>
        <div class="form-group">
            <label>Interes:</label>
            <input type="number" min="0" max="100" :disabled="pagado" name="interes" v-model="interes" class="form-control">
        </div>
        <div class="form-group">
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>${{ subtotal }}</td>
                    </tr>
                    <tr>
                        <th style="width:50%">Intereses:</th>
                        <td>${{ interes_calculado }}</td>
                    </tr>
                    <tr>
                        <th>Total:</th>
                        <td>${{ importe_total }}</td>
                    </tr>
                </table>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        props : ['valor_interes', 'imp_subtotal', 'imp_total', 'estado'],
        data() {
            return {
                interes  : 0,
                subtotal : 0,
                total    : 0
            }
        },
        created() {
            this.interes  = this.valor_interes;
            this.subtotal = this.imp_subtotal;
            this.imp_total ? this.total = this.imp_total : 0;
            EventBus.$on('actualizarImportes', function(subtotal) {
                this.actualizarImportes(subtotal);
            }.bind(this)) 
        },
        mounted() {
            
        },
        computed : {
            importe_total() {
                var interes = parseFloat(this.interes*0.01).toFixed(2)
                var importe_interes = interes * this.subtotal;
                return (this.subtotal + importe_interes).toFixed(2);
            },
            interes_calculado() {
                return ((this.interes*0.01)*this.subtotal).toFixed(2);
            },
            pagado() {
                return this.estado == 'PAGADO';
            }
        },
        methods : {
            actualizarImportes(subtotal) {
                this.subtotal = subtotal;
                console.log(this.subtotal)
            }

            
        }
    }
</script>