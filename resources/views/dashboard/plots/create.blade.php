@extends('dashboard')

@section('content')
    {{-- Plot geolocation search --}}
    @include(dashboard_path('plots.forms.geolocation.search'))
    
    {{-- Information alerts: city alert --}}
    @component(component_path('info'))
        @slot('containerID',    'alert-city-info')
        @slot('backgrounColor', 'warning')
        @slot('content')
            <ul>
                <li>{!! trans('geolocations.new.city.1') !!}</li>
                <li>{!! trans('geolocations.new.city.2') !!}</li>
            </ul>
        @endslot
    @endcomponent

    {{-- Information alerts: push button --}}
    @component(component_path('info'))
        @slot('containerID',    'alert-push-info')
        @slot('backgrounColor', 'warning')
        @slot('content')
            <ul>
                <li>{!! trans('geolocations.new.city.3') !!}</li>
            </ul>
        @endslot
    @endcomponent

    {{-- Information alerts: browse alert --}}
    @component(component_path('info'))
        @slot('containerID',    'alert-zoom-info')
        @slot('backgrounColor', 'info')
        @slot('content')
            <ul>
                <li>{!! trans('geolocations.new.browse.1') !!}</li>
                <li>{!! trans('geolocations.new.browse.2') !!}</li>
                <li>{!! trans('geolocations.new.browse.3') !!}</li>
            </ul>
        @endslot
    @endcomponent

    <div id="alert-zoom-success" class="alert alert-message alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <div class="card-header bg-success">{!! icon('ok', trans('geolocations.add.ready')) !!}</div>
        <div class="card-block">
            {{ trans('geolocations.marker.text') }} {!! Html::image('images/marker-icon.png', null, ['class' => 'icon']) !!}. 
            {{ trans('geolocations.marker.text_next') }} 
            <a href="#" class="btn btn-danger">{!! icon('globe', trans('geolocations.add.title')) !!}</a>
        </div>
    </div>
    <div id="map" class="col-md-12 h-75"></div>
@endsection

{{-- Customize JS --}}
@section('default-javascript')
    {!! mix('js/geolocations.js') !!}
@endsection

@section('javascript')
    <script>
        {{-- Default variables --}}
        var textError = '{{ trans("geolocations.submit.error") }}',
            textConfirm = '{{ trans("geolocations.submit.confirm") }}',
            textButton  = '{{ icon("globe", trans("geolocations.new.add")) }}';
    </script>
@endsection

{{-- Leaflet libraries --}}
@section('leaflet')
    <script src="//unpkg.com/leaflet@1.2.0/dist/leaflet.js" integrity="sha512-lInM/apFSqyy1o6s89K4iQUKg6ppXEgsVxT35HbzUupEVRh2Eu9Wdl4tHj7dZO0s1uvplcYGmt3498TtHq+log==" crossorigin=""></script>
    <link rel="stylesheet" href="//unpkg.com/leaflet@1.2.0/dist/leaflet.css" integrity="sha512-M2wvCLH6DSRazYeZRIm1JnYyh22purTM+FDB5CsyxtQJYeKq83arPe5wgbNmcFXGqiSH2XR8dT/fJISVA1r/zQ==" crossorigin=""/>
@endsection