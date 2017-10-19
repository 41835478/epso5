{{-- Add client, user and plot... if needed --}}
@include(component_path('formByRole'), ['withPlot' => true, 'withModule' => 'harvests'])

<div class="row">

    {{-- Row id --}}
    {!! BootForm::hidden('row_id')->value($data->id ?? null) !!}
    
    {{-- Field: crop --}}
    {!! BootForm::hidden('crop_id')->id('crop_id')->value(Credentials::isOnlyRole('user') ? getCropId() : null) !!}

    {{-- Field: Application date --}}
    {!!  Form::agronomicDate() !!}

    {{-- Field: Quantity  --}}
    {!! Form::agronomicQuantity() !!}

    {{-- Field: Quantity units --}}
    {!! Form::agronomicUnits($section) !!}

    {{-- Field: observations --}}
    {!! Form::autoTextArea('agronomic_observations') !!}

    {{-- Load module --}}
    @if(isset($data))
        @include(dashboard_path('_modules.' . $data->module . '.harvest'))
    @else 
        @include(dashboard_path('_modules.module'))
    @endif
</div>