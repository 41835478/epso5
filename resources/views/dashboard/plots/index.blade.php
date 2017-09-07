@extends('dashboard')

@section('content')

    {{-- Breadcrumb --}}
    @component(component_path('breadcrumb'))
        {{-- Breadcrumb items [title, link] --}}
        @slot('breadcrumbItems', [
            [trans_title($section), route('dashboard.' . $role . '.' . $section . '.index')],
            [trans('base.list')], 
        ])
        @slot('dropdownItems', [
            [Html::class('dropdown-item')->linkCreate($role, $section)], 
            [Html::class('dropdown-item')->linkEliminate($role, $section)],
            {{-- Breadcrumb Dropdow Items: Example --}}
            {{--[
                'title' => icon('form', 'TitleExample'),
                'route' => 'http://www.example1.com',
                'type' => 'delete',
                'class' => 'classExample',
            ],--}} 
        ])
    @endcomponent

    {{-- Search --}}
    @include(component_path('search'))

    {{-- DataTables --}}
    @include(component_path('dataTables'), ['tableFooter' => false])

    {{-- Modals --}}
    @section('modals')
        @include(modal_path('delete'))
    @endsection

    {{-- 
        Legends: For a customized legend, 
        pass the $section variable to the legend_path() function, 
        or keep it empty for default 
    --}}
    @component(component_path('legend'))
        {{-- @slot('legendContent', legend_path($section)) --}}
        @slot('legendContent', legend_path())
    @endcomponent
@endsection