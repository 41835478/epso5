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
        @slot('clients', $clients ?? null)
        @slot('plots', $plots ?? null)
        @slot('users', $users ?? null)
        @slot('workers', $workers ?? [])
    @endcomponent

@endsection