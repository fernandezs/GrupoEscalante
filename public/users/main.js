new Vue({
    el : 'main',
    data: {
        texto: 'Hola desde el main',
        nombre : 'tu nombre',
        peliculas : ['Superman', 'Batman'],
        peliculaNueva : null
    },
    methods : {
        borrarPelicula(index){
            this.peliculas.splice(index, 1);
        },
        agregarPelicula(){
            this.peliculas.push(this.peliculaNueva);
            this.peliculaNueva = null
        }
    }
});