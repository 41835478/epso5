@extends('dashboard')

@section('content')

    {{-- Breadcrumb --}}
    @component(component_path('create'))
        {{-- Breadcrumb items [title, link] --}}
        @slot('breadcrumbItems', [
            [trans_title($section), route('dashboard.user.' . $section . '.show', request('plot'))],
            [trans('base.create')], 
        ])
        {{-- Add other slot --}}
        {{-- @slot('slotName', $slotValue ?? null) --}}
    @endcomponent

@endsection