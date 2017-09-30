@extends('dashboard')

@section('content')

    {{-- Breadcrumb --}}
    @component(component_path('edit'))
        {{-- Breadcrumb items [title, link] --}}
        @slot('breadcrumbItems', [
            [trans_title($section), route('dashboard.' . $role . '.' . $section . '.index')],
            [trans('base.edit') . ' ' . trans_title($section, 'singular') . ': ' . $data->plot_name], 
        ])
        @slot('dropdownItems', [
            [Html::createLink($section, $role)], 
        ])
        {{-- Add the data --}}
        @slot('data', $data)
        {{-- Add other slot --}}
        @slot('clients', $clients ?? [])
        @slot('cropName', getCropName($data ?? null))
        @slot('cropTrainig', $cropTrainig ?? [])
        @slot('cropTypes', $cropTypes ?? [])
        @slot('cropVarieties', $cropVarieties ?? [])
        @slot('cropPatterns', $cropPatterns ?? [])
        @slot('users', $users ?? [])
    @endcomponent

@endsection