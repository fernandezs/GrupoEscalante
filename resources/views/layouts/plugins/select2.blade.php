@push('css')
<link rel="stylesheet" href="{{asset('bower/select2/dist/css/select2.min.css')}}" />
<link rel="stylesheet" href="{{asset('bower/select2-bootstrap-theme/dist/select2-bootstrap.css')}}" />
<style>
    .select2-selection__rendered {
        margin-top: -20px;
    }

</style>
@endpush
@push('scripts')
<script type="text/javascript" src="{{asset('bower/select2/dist/js/select2.full.js')}}"></script>
<script type="text/javascript" src="{{asset('bower/select2/dist/js/i18n/es.js')}}"></script>
@endpush