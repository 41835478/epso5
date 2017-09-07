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
        @slot('data', $data)
        @slot('regions', $regions ?? null)
        @slot('crops', $crops ?? null)
    @endcomponent

@endsection
