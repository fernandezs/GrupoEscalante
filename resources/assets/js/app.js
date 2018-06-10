
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import moment from 'moment'
moment.locale('es');
window.Vue = require('vue');
window.EventBus = new Vue();
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.filter('fecha-local', function(date){
    return moment(date).format("DD/MM/YYYY")
});

Vue.filter('timeago', function(date){
    return moment(date,"YYYYMMDD").fromNow()
});

Vue.component('example', require('./components/Example.vue'));
Vue.component('cliente', require('./components/Cliente.vue'));
Vue.component('maquina', require('./components/Maquina.vue'));
Vue.component('reparacion-estados', require('./components/ReparacionEstados.vue'));
Vue.component('reparacion-estados-tabla', require('./components/EstadosReparacionTabla.vue'));
Vue.component('articulos', require('./components/deudas/Articulos.vue'));
Vue.component('tabla-deuda-articulos', require('./components/deudas/Tabla.vue'));
Vue.component('facturacion', require('./components/deudas/Facturacion.vue'));
Vue.component('articulos-reparacion', require('./components/reparaciones/Articulos.vue'));
Vue.component('tabla-reparacion-articulos', require('./components/reparaciones/TablaArticulos.vue'));


const app = new Vue({
    el: '#app'
});
