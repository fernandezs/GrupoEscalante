<template>
    <div>
        <ul class="timeline">
            <!-- timeline item -->
            <li v-for="estado in estados">
                <!-- timeline icon -->
                <i :class="['fa', 'fa-sitemap', bg_color(estado.estado.id)]"></i>
                <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> {{ full_fecha(estado.created_at ) }}</span>
        
                    <h3 class="timeline-header"><strong>{{ estado.estado.estado}}</strong></h3>
        
                    <div class="timeline-body">
                        {{ estado.detalle }}
                    </div>
        
                    <div class="timeline-footer">
                        <div class="text-muted">
                            <i class="fa fa-user"> {{ estado.user.name }} </i>
                        </div>
                    </div>
                </div>
            </li>
            <!-- END timeline item -->
        
        </ul>
    </div>
</template>

<script>
    import moment from 'moment'
    moment.locale('es');
    export default {
        props : ['estados'],
        methods: {
            full_fecha(date) {
                return  moment(date).format('DD MMM YYYY, h:mm a');
            },
            bg_color(estado){
                switch(estado) {
                    case 1 : return 'bg-blue';
                    case 2 : return 'bg-yellow';
                    case 3 : return 'bg-orange';
                    case 4 : return 'bg-red';
                    case 5 : return 'bg-green';
                    default: return '';break;
                }
            }
        }
    }
</script>
