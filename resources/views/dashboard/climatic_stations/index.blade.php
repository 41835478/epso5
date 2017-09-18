@extends('dashboard')

@section('content')

    {{-- Breadcrumb --}}
    @component(component_path('breadcrumb'))
        {{-- Breadcrumb items [title, link] --}}
        @slot('breadcrumbItems', [
            [trans_title($section), route('dashboard.' . $role . '.' . $section . '.index')],
            [$breadcrumb ?? trans('base.list')], 
        ])
        @slot('dropdownItems', [
            [Html::createLink($section, $role)], 
            [Html::newLink(
                [
                    'title' => icon('form', sections('climatic_stations.active')),
                    'route' => route('dashboard.admin.climatic_stations.active'), 
                    'class' => 'dropdown-item',
                ]
            )],
        ])
    @endcomponent

    {{-- Search --}}
    @include(component_path('search'))

    {{-- DataTables --}}
    @include(component_path('dataTables'), ['tableFooter' => false])

    {{-- 
        Legends: For a customized legend, 
        pass the $legend variable to the legend_path() function, 
        or keep it empty for default 
    --}}
    @component(component_path('legend'))
        @slot('legendContent', legend_path($legend ?? null))
    @endcomponent
@endsection