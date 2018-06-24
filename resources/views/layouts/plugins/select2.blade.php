@push('css')
<link rel="stylesheet" href="{{asset('bower/select2/dist/css/select2.min.css')}}" />

<style type="text/css">
	.select2-container .select2-selection--single {
    box-sizing: border-box;
    cursor: pointer;
    display: block;
    height: 34px;
    user-select: none;
    -webkit-user-select: none; }

/* line 131 */
.select2-container--default .select2-selection--single .select2-selection__rendered {
    color: #444;
    line-height: 32px; }
    
/* line 139 */
.select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 32px;
    position: absolute;
    top: 1px;
    right: 1px;
width: 20px; }

.select2-selection__rendered {
  line-height: 32px !important;
}

.select2-selection {
  height: 34px !important;
}
</style>
@endpush
@push('scripts')
<script type="text/javascript" src="{{asset('bower/select2/dist/js/select2.full.js')}}"></script>
<script type="text/javascript" src="{{asset('bower/select2/dist/js/i18n/es.js')}}"></script>
@endpush