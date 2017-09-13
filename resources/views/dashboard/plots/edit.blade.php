@extends('dashboard')

@section('content')

    {{-- Breadcrumb --}}
    @component(component_path('edit'))
        {{-- Breadcrumb items [title, link] --}}
        @slot('breadcrumbItems', [
            [trans_title($section), route('dashboard.' . $role . '.' . $section . '.index')],
            [trans('base.edit')], 
        ])
        @slot('dropdownItems', [
            [Html::class('dropdown-item')->linkCreate($role, $section)], 
        ])
        {{-- Add the data --}}
        @slot('data', $data)
        {{-- Add other slot --}}
        @slot('clients', $clients ?? [])
        @slot('cropName', getCropName($data ?? null))
        @slot('cropTypes', $cropTypes ?? [])
        @slot('cropVarieties', $cropVarieties ?? [])
        @slot('users', $users ?? [])
    @endcomponent

@endsection