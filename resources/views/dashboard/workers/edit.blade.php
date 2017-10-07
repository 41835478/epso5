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
            [Html::createLink($section, $role)], 
        ])
        {{-- Add the data --}}
        @slot('data', $data)
    @endcomponent

@endsection