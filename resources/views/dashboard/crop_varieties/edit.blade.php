@extends('dashboard')

@section('content')

    {{-- Breadcrumb --}}
    @component(component_path('edit'))
        {{-- Breadcrumb items [title, link] --}}
        @slot('breadcrumbItems', [
            [trans_title($parent), route('dashboard.' . $role . '.' . $parent . '.index')],
            [trans_title($section) . ': ' . $crop->crop_name, route('dashboard.' . $role . '.' . $section . '.show', $crop->id)],
            [trans('base.edit')], 
        ])
        {{-- Add the data --}}
        @slot('data', $data)
        {{-- Add other slot --}}
        @slot('crop', $crop ?? null)
        @slot('types', $types ?? [])
    @endcomponent

@endsection