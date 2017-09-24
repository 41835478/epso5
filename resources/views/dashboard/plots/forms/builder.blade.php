{{-- Plot Administration --}}
@include(dashboard_path('plots.forms.sections.administration'))

{{-- Plot information --}}
@include(dashboard_path('plots.forms.sections.plot'))

{{-- Crop information --}}
@include(dashboard_path('plots.forms.sections.crop'))

{{-- Crop Geolocation --}}
@include(dashboard_path('plots.forms.sections.geolocation'))

{{-- Climatic stations --}}
@if(isset($data))
    @include(dashboard_path('plots.forms.sections.climatic'))
@endif

{{-- Customize JS --}}
@section('default-javascript')
    {!! mix('js/maps.js') !!}
@endsection

{{-- Leaflet libraries --}}
@section('leaflet')
    <script src="//unpkg.com/leaflet@1.2.0/dist/leaflet.js" integrity="sha512-lInM/apFSqyy1o6s89K4iQUKg6ppXEgsVxT35HbzUupEVRh2Eu9Wdl4tHj7dZO0s1uvplcYGmt3498TtHq+log==" crossorigin=""></script>
    <link rel="stylesheet" href="//unpkg.com/leaflet@1.2.0/dist/leaflet.css" integrity="sha512-M2wvCLH6DSRazYeZRIm1JnYyh22purTM+FDB5CsyxtQJYeKq83arPe5wgbNmcFXGqiSH2XR8dT/fJISVA1r/zQ==" crossorigin=""/>
@endsection