@extends('dashboard')

@section('content')

    {{-- Breadcrumb --}}
    @component(component_path('create'))
        {{-- Breadcrumb items [title, link] --}}
        @slot('breadcrumbItems', [
            [trans_title($parent), route('dashboard.user.' . $parent . '.index')],
            [sections('plots.title') . ': ' . $plot->plot_name, route('dashboard.user.' . $section . '.show', $plot->id)],
            [trans('base.create')], 
        ])
        {{-- Add other slot --}}
        @slot('clients', $clients ?? [])
    @endcomponent

@endsection