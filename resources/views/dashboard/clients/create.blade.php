@extends('dashboard')

@section('content')

    {{-- Breadcrumb --}}
    @component(component_path('create'))
        {{-- Breadcrumb items [title, link] --}}
        @slot('breadcrumbItems', [
            [trans_title($section), route('dashboard.' . $role . '.' . $section . '.index')],
            [trans('base.create')], 
        ])
        @slot('configs', $configs ?? null)
        @slot('crops', $crops ?? null)
        @slot('data', $data ?? null)
        @slot('irrigations', $irrigations ?? null)
        @slot('regions', $regions ?? null)
        @slot('trainings', $trainings ?? null)
    @endcomponent

@endsection
