<input type="hidden" value="{{ $deuda->id }}" id="deuda_id">
<input type="hidden" value="{{ $deuda->cliente_id}}" name="cliente_id">
<input type="hidden" value="{{ $deuda->estado }}" id="estado_real">
<div class="row">
    <div class="col-md-4 col-sm-12">
        @include('deudas.partials.cliente')

    </div>
    <div class="col-md-5 col-sm-12" v-if="estado_real == 'INPAGO'">
        @include('deudas.partials.articulo-select')
    </div>

    <div class="col-md-3 col-sm-12">
        @include('deudas.partials.estado')
        </div>



    <div class="col-md-12">

        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">
                    <i class="fa fa-cubes"></i> Lista de articulos adeudados
                </h3>
            </div>

            <div class="box-body">
                    <div class="table table-responsive">
                        @include('deudas.table_articulos')
                    </div>
            </div>
        </div>


    </div>

</div>



@push('scripts')
<script src="{{ asset('/deudas/main.js')}}"></script>
<script>
    $(document).ready(function()
    {
        if($(window).width() > 650)
        {
            var heights = $('.contenedor').map(function()
            {
                 return $(this).height();
            }).get();
            maxHeight = Math.max.apply(null, heights);
            $('.contenedor').height(maxHeight);
        }

    })
</script>
@endpush