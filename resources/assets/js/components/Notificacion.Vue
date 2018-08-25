<template>
    <div>
        <a :href="notificacion.data.link" :class="setClases" @click="markAsRead()"><span :class="['fa', notificacion.data.icono]"></span> {{ notificacion.data.mensaje }}
            <small class="text-muted">
                <i class="fa fa-clock-o" style="margin-left: 10px;"></i>
                {{ notificacion.created_at | timeago }}
            </small>
        </a>
        
    </div>
</template>

<script>
    export default {
        props : ['notificacion'],
        methods : {
                markAsRead() {
                    axios.patch('/notificaciones/' + this.notificacion.id).then(res => {
                        console.log('respuesta: ' + res.data);
                    }).catch(err => {
                        alert(url);
                    })
                },
                destroy() {
                    axios.delete('/notificaciones/' + this.notificacion).then(res => {
                        console.log('respuesta del destroy: ' + res);
                    });

                }
        },
        computed : {
            setClases() {
                return ['list-group-item', this.notificacion.read_at == null ? 'list-group-item-info' : '', 'clearfix']
            }
        }
        
    }
</script>
