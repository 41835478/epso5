@extends('dashboard')

@section('content')

    {{-- Breadcrumb --}}
    @component(component_path('breadcrumb'))
        {{-- Breadcrumb items [title, link] --}}
        @slot('breadcrumbItems', [
            [trans_title($section), route('dashboard.' . $role . '.' . $section . '.index')],
            [trans('base.list')], 
        ])
        
        {{-- Breadcrumb Dropdow Items --}}
{{--         [
            'title' => icon('form', 'TitleExample'),
            'route' => 'http://www.example1.com',
            'type' => 'delete',
            'class' => 'classExample',
        ], --}}
        @slot('dropdownItems', [
            [Html::class('dropdown-item')->linkCreate($role, $section)], 
        ])
    @endcomponent

    {{-- Search --}}
    @include(component_path('search'))

    {{-- DataTables --}}
    @include(component_path('dataTables'), ['tableFooter' => false])

    {{-- Legends --}}
    @component(component_path('legend'))
        @slot('legendContent', legend_path())
    @endcomponent
@endsection