@extends('dashboard')

@section('content')

    {{-- Breadcrumb --}}
    @component(component_path('create'))
        {{-- Breadcrumb items [title, link] --}}
        @slot('breadcrumbItems', [
            [trans_title($parent), route('dashboard.' . $role . '.' . $parent . '.index')],
            [trans_title($section) . ': ' . $crop->crop_name, route('dashboard.' . $role . '.crop_varieties.show', $crop->id)],
            [sections('crop_variety_types.create')], 
        ])
        {{-- Add the data --}}
        @slot('types', $types)
        @slot('routeAction', route('dashboard.' . $role . '.' . $section . '.store'))
        {{-- Add other slot --}}
        @slot('crop', $crop ?? null)
    @endcomponent

@endsection