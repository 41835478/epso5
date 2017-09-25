@extends('dashboard')

@section('content')

    {{-- Breadcrumb --}}
    @component(component_path('create'))
        {{-- Breadcrumb items [title, link] --}}
        @slot('breadcrumbItems', [
            [trans_title($section), route('dashboard.' . $role . '.' . $section . '.index')],
            [trans('base.create')], 
        ])
        {{-- Add other slot --}}
        @slot('catastro', $catastro ?? null)
        @slot('clients', $clients ?? [])
        @slot('cropName', getCropName($data ?? null))
        @slot('cropTrainig', $cropTrainig ?? [])
        @slot('cropTypes', $cropTypes ?? [])
        @slot('cropVarieties', $cropVarieties ?? [])
        @slot('cropPatterns', $cropPatterns ?? [])
        @slot('sigpac', $sigpac ?? [])
        @slot('users', $users ?? [])
    @endcomponent

@endsection