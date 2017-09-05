@extends('dashboard')

@section('content')

    {{-- Breadcrumb --}}
    @component(component_path('breadcrumb'))
        {{-- Breadcrumb items [title, link] --}}
        @slot('breadcrumbItems', [
            [trans_title($section), route('dashboard.' . $role . '.' . $section . '.index')],
            [trans('base.list')], 
        ])
        @slot('dropdownItems', [
            [Html::class('dropdown-item')->linkCreate($role, $section)], 
        ])
    @endcomponent

    {{-- Search --}}
    @include(component_path('search'))

    {{-- DataTables --}}
    @include(component_path('dataTables'), ['tableFooter' => false])

    {{-- 
        Legends: For a customized legend, 
        pass the $section variable to the legend_path() function, 
        or keep it empty for default 
    --}}
    @component(component_path('legend'))
        @slot('legendContent', legend_path($section))
    @endcomponent

    {{-- Modals --}}
    @section('modals')
        @include(modal_path('crop_variety_types'), ['setCustomRoute' => null])
    @endsection
@endsection

@section('javascript')
    <script>
    $( document ).ready( function() {
        if($('#modal-crop-variety-types')) {
            $('#modal-crop-variety-types').on('shown.bs.modal', function(event) {
                //Set variables
                var $modal      = $(this);
                var $button     = $(event.relatedTarget);
                var $cropName   = $button.attr('data-cropName');
                //Add crop name to the title
                $('#title-crop-variety-types').html($cropName);
                //Load the form
                
            });
        }
    });
    </script>
@endsection