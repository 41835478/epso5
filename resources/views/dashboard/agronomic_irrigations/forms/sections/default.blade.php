{{-- Add client, user and plot... if needed --}}
@include(component_path('formByRole'), ['withPlot' => true])

<div class="row">

    {{-- Row id --}}
    {!! BootForm::hidden('row_id')->value($data->id ?? null) !!}

    {{-- Field: Application date --}}
    {!!  Form::agronomicDate() !!}

    {{-- Field: Quantity  --}}
    {!! Form::agronomicQuantity() !!}

    {{-- Field: Quantity units --}}
    {!! Form::agronomicUnits($section) !!}

    {{-- Field: observations --}}
    {!! Form::autoTextArea('agronomic_observations') !!}
</div>