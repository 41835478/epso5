{{-- Add client, user and plot... if needed --}}
@include(component_path('formByRole'), ['withPlot' => true, 'withModule' => 'harvests'])

<div class="row">

    {{-- Row id --}}
    {!! BootForm::hidden('row_id')->value($data->id ?? null) !!}
    
    {{-- Field: crop --}}
    {!! BootForm::hidden('crop_id')->id('crop_id')->value(Credentials::isOnlyRole('user') ? getCropId() : null) !!}

    {{-- Field: Application date --}}
    {!!  Form::agronomicDate($data ?? null) !!}

    {{-- Field: Quantity  --}}
    {!! Form::agronomicQuantity($data ?? null) !!}

    {{-- Field: Quantity units --}}
    {!! Form::agronomicUnits($data ?? null, $section ?? null) !!}

    {{-- Kg/ha of production --}}
    {!! Form::agronomicProduction($data ?? null) !!}

    {{-- º Baume * Kg --}}
    {!! Form::agronomicBaumeKg($data ?? null) !!}

    <div class="col-md-12"></div>

    {{-- Load module --}}
    <div class="p-3">
        @if(isset($data))
            @include(dashboard_path('_modules.' . $data->module . '.harvest'))
        @else 
            @if(Credentials::isAdmin())
                @include(dashboard_path('_modules.module'))
            @else 
                @include(dashboard_path('_modules.' . getModule() . '.harvest'))
            @endif
        @endif
    </div>

    {{-- Field: observations --}}
    {!! Form::autoTextArea('agronomic_observations') !!}
</div>