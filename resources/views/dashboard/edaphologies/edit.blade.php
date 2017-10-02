@extends('dashboard')

@section('content')

    {{-- Breadcrumb --}}
    @component(component_path('edit'))
        {{-- Breadcrumb items [title, link] --}}
        @slot('breadcrumbItems', [
            [trans_title($parent), route('dashboard.user.' . $parent . '.index')],
            [sections('plots.title') . ': ' . $data->plot->plot_name, route('dashboard.user.' . $section . '.show', $data->plot_id)],
            [trans('base.edit') . ' - Ref: ' . $data->edaphology_reference], 
        ])
        {{-- Add the data --}}
        @slot('data', $data)
        {{-- Add other slot --}}
        @slot('clients', $clients ?? [])
    @endcomponent

@endsection