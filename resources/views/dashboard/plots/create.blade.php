@extends('dashboard')

@section('content')
    {!! BootForm::open()->action(route('dashboard.' . $role . '.' . $section . '.configurate'))->post()->id('createGeolocation') !!}

        {{-- Plot geolocation search --}}
        @include(dashboard_path('plots.forms.sections.maps.search'))
        
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

        {{-- Information alerts: zoom success --}}
        @component(component_path('info'))
            @slot('containerID',    'alert-zoom-success')
            @slot('backgrounColor', 'success')
            @slot('title', trans('geolocations.new.ready'))
            @slot('content')
                <ul>
                    <li>{!! trans('geolocations.new.instructions', ['icon' => Html::image('images/marker-icon.png', null, ['class' => 'btn btn-secondary btn-sm icon'] )]) !!}</li>
                    <li>{!! trans('geolocations.new.instructions_next', ['icon' => '<span class="btn btn-danger btn-sm">' . icon('world', trans('geolocations.new.add')) . '</span>']) !!}</li>
                </ul>
            @endslot
        @endcomponent

        {{-- Map container --}}
        <div id="map" class="col-md-12 h-75"></div>

    {!! BootForm::close() !!}
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
            textButton  = '{!! icon("world", trans("geolocations.new.add")) !!}';
    </script>
@endsection

{{-- Leaflet libraries --}}
@section('leaflet')
    <script src="//unpkg.com/leaflet@1.2.0/dist/leaflet.js" integrity="sha512-lInM/apFSqyy1o6s89K4iQUKg6ppXEgsVxT35HbzUupEVRh2Eu9Wdl4tHj7dZO0s1uvplcYGmt3498TtHq+log==" crossorigin=""></script>
    <link rel="stylesheet" href="//unpkg.com/leaflet@1.2.0/dist/leaflet.css" integrity="sha512-M2wvCLH6DSRazYeZRIm1JnYyh22purTM+FDB5CsyxtQJYeKq83arPe5wgbNmcFXGqiSH2XR8dT/fJISVA1r/zQ==" crossorigin=""/>
@endsection