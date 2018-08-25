<template>
    <li class="dropdown notifications-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-bell-o"></i>
            <span class="label label-warning">{{ notificaciones.length }}</span>
        </a>
        <ul class="dropdown-menu">
            <li class="header">Tiene {{ notificaciones.length }} notificacion/es</li>
            <li>
                <ul class="menu">
                    <li v-for="notificacion in notificaciones">
                        <a :href="notificacion.data.link" style="margin-left: 10px;" @click="read(notificacion)">
                            <i class="fa"  :class="[notificacion.data.icono, notificacion.data.text_color]"></i> {{ notificacion.data.mensaje_corto }}<br>
                            <small class="text-muted">
                            <i class="fa fa-clock-o" style="margin-left: 10px;"></i>
                                {{ notificacion.created_at | timeago }}
                            </small>
                        </a>
                    </li>
                    
                </ul>
            </li>
            <li class="footer"><a href="/notificaciones" class="text-center">Ver todas</a></li>
        </ul>
    </li>
</template>

<script>
    export default {
        data() {
            return {
                notificaciones : []
            }
        },
        methods : {
            read(notificacion) {
                axios.patch('/notificaciones/' + notificacion.id).then(res => {
                    console.log(res);
                }).catch(err => {
                    alert(url);
                })
            }
        },
        mounted() {
            axios.get('/notificaciones').then(res => {
                this.notificaciones = res.data;
            }).catch(error => {
                console.log('paso por el error');
                console.log(error);
            });

        }
    }
</script>
