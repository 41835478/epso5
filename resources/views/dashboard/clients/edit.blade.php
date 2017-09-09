@extends('dashboard')

@section('content')

    {{-- Breadcrumb --}}
    @component(component_path('edit'))
        {{-- Breadcrumb items [title, link] --}}
        @slot('breadcrumbItems', [
            [trans_title($section), route('dashboard.' . $role . '.' . $section . '.index')],
            [trans('base.edit')], 
        ])
        {{-- Add the data --}}
        @slot('configs', $configs ?? null)
        @slot('crops', $crops ?? null)
        @slot('data', $data)
        @slot('irrigations', $irrigations ?? null)
        @slot('regions', $regions ?? null)
        @slot('trainings', $trainings ?? null)
    @endcomponent

@endsection
