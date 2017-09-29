@extends('dashboard')

@section('content')

    {{-- Breadcrumb --}}
    @component(component_path('breadcrumb'))
        {{-- Breadcrumb items [title, link] --}}
        @slot('breadcrumbItems', [
            [trans_title($section), route('dashboard.user.' . $section . '.show', request('plot'))],
            [trans('base.list')], 
        ])
        @slot('dropdownItems', [
            [Html::createLink($section, $role)], 
            [Html::deleteLink()], 
            {{-- [Html::newLink(
                [
                    'title' => icon('form', trans('buttons.tools')),
                    'route' => route('dashboard.admin.biocides.tools'), 
                    'class' => 'dropdown-item',
                ]
            )], --}}
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
        pass the $legend variable to the legend_path() function, 
        or keep it empty for default 
    --}}
    @component(component_path('legend'))
        @slot('legendContent', legend_path($legend ?? null))
    @endcomponent
@endsection