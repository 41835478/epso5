@extends('dashboard')

@section('content')

    {{-- Breadcrumb --}}
    @component(component_path('edit'))
        {{-- Breadcrumb items [title, link] --}}
        @slot('breadcrumbItems', [
            [trans_title($section)],
            [trans('base.edit')], 
        ])
        {{-- Add the data --}}
        @slot('data', $data)
        {{-- Add the clients --}}
        @slot('clients', $clients)
    @endcomponent

@endsection
