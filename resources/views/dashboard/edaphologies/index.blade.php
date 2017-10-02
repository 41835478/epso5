@extends('dashboard')

@section('content')

    {{-- Breadcrumb --}}
    @component(component_path('breadcrumb'))
        {{-- Breadcrumb items [title, link] --}}
        @slot('breadcrumbItems', [
            [trans_title($parent), route('dashboard.user.' . $parent . '.index')],
            [sections($section . '.info')], 
        ])
        @Role('admin')
            @slot('dropdownItems', [
                [Html::createLink($section, $role, $plot->id)], 
                [Html::deleteLink()], 
                [Html::newLink([
                    'title' => icon('download', trans('buttons.pdf')),
                    'route' => route('dashboard.user.' . $section . '.download', $plot->id), 
                    'class' => 'dropdown-item'
                ])],
            ])
        @endRole
    @endcomponent

    {{-- Plot data --}}
    <div class="card mb-4 card-inverse card-danger">
        <div class="card-block">
            <h4 class="card-title">{{ trans_title('plots', 'singular') }}</h4>
            <div class="row">
                <div class="col-md-3"><b>{!! trans('persona.name') !!}</b>: {!! $plot->plot_name !!}</div>
                <div class="col-md-3"><b>{!! trans_title('cities', 'singular') !!}</b>: {!! $plot->city->city_name !!}</div>
                <div class="col-md-3"><b>{!! trans_title('crops', 'singular') !!}</b>: {!! $plot->crop->crop_name !!}</div>
                <div class="col-md-3"><b>{!! trans_title('crop_varieties', 'singular') !!}</b>: {!! $plot->crop_variety->crop_variety_name !!}</div>
            </div>
        </div>
    </div>

    {{-- DataTables --}}
    @include(component_path('dataTables'), ['tableFooter' => false])

    {{-- Modals --}}
    @section('modals')
        @include(modal_path('delete'))
    @endsection

    {{-- 
        Legends: For a customized legend, 
        pass the $legend variable to the legend_path() function, 
        or keep it empty for default 
    --}}
    @component(component_path('legend'))
        @slot('legendContent', legend_path($legend ?? null))
        @slot('legendCustom')
            <div class="col-md-8">
                {{-- Map container --}}
                <div id="simpleMap" class="col-md-12 h-50"></div>
            </div>
        @endslot
    @endcomponent
@endsection

{{-- Customize JS --}}
@section('default-javascript')
    {!! mix('js/edaphologies.js') !!}
@endsection

{{-- Leaflet libraries --}}
@section('leaflet')
    <script src="//unpkg.com/leaflet@1.2.0/dist/leaflet.js" integrity="sha512-lInM/apFSqyy1o6s89K4iQUKg6ppXEgsVxT35HbzUupEVRh2Eu9Wdl4tHj7dZO0s1uvplcYGmt3498TtHq+log==" crossorigin=""></script>
    <link rel="stylesheet" href="//unpkg.com/leaflet@1.2.0/dist/leaflet.css" integrity="sha512-M2wvCLH6DSRazYeZRIm1JnYyh22purTM+FDB5CsyxtQJYeKq83arPe5wgbNmcFXGqiSH2XR8dT/fJISVA1r/zQ==" crossorigin=""/>
@endsection