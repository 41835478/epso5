@extends('dashboard')

@section('content')

    {{-- Breadcrumb --}}
    @component(component_path('edit'))
        {{-- Breadcrumb items [title, link] --}}
        @slot('breadcrumbItems', [
            [trans_title($parent), route('dashboard.user.' . $parent . '.index')],
            [trans('base.edit') . ' ' . trans_title($section, 'singular') . ': ' . $data->plot->plot_name], 
        ])
        {{-- Add the data --}}
        @slot('data', $data)
        {{-- Add other slot --}}
        {{-- @slot('slotName', $slotValue ?? null) --}}
    @endcomponent

@endsection