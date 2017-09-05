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
            [
                'title' => icon('form', trans('buttons.tools')),
                'route' => route('dashboard.admin.biocides.tools'),
            ],
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