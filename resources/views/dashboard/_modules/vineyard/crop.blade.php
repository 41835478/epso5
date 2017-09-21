<div class="row">
    {{-- Field: Crop --}}
    <div class="form-group col-md-2">
        {!! Form::label('plot_crop_name', sections('crops.title'), ['class' => 'control-label']) !!}
        {!! Form::text('plot_crop_name', ($cropName ?? null), ['class' => 'form-control', 'disabled']) !!}
    </div>

    {{-- Field: Crop type --}}
    <div class="form-group col-md-2">
        {!! Form::label('crop_variety_type', sections('crop_variety_types.title'), ['class' => 'control-label']) !!}
        {!! Form::createSelect(
            $data           = ($data ?? null), 
            $optionsValues  = $cropTypes, 
            $fieldName      = 'crop_variety_type'
        ) !!}
    </div>

    {{-- Field: Crop Variety --}}
    <div class="form-group col-md-3">
        {!! Form::label('crop_variety_id', sections('crop_variety_types.title'), ['class' => 'control-label']) !!}
        {!! Form::createSelect(
            $data           = ($data ?? null), 
            $optionsValues  = $cropVarieties, 
            $fieldName      = 'crop_variety_id'
        ) !!}
    </div>

    {{-- Field: Crop Patterns --}}
    <div class="form-group col-md-3">
        {!! Form::label('pattern_id', sections('patterns.title'), ['class' => 'control-label']) !!}
        {!! Form::createSelect(
            $data           = ($data ?? null), 
            $optionsValues  = $cropPatterns, 
            $fieldName      = 'pattern_id', 
            $required       = false
        ) !!}
    </div>

    {{-- Field: Crop quantity --}}
    <div class="form-group col-md-2">
        {!! Form::label('crop_quantity', sections('plots.quantity'), ['class' => 'control-label']) !!}
        {!! Form::imputGroup(
            $value      = ($data->crop_quantity ?? null), 
            $fieldName  = 'crop_quantity', 
            $icon       = 'uds', 
            $class      = 'number',
            $required   = false
        ) !!}
    </div>
</div>

<div class="row">
    {{-- Field: Crop training --}}
    <div class="form-group col-md-2">
        {!! Form::label('crop_training', sections('trainings.title:min'), ['class' => 'control-label']) !!}
        {!! Form::createSelect(
            $value          = ($data ?? null), 
            $optionsValues  = $cropTrainig, 
            $fieldName      = 'crop_training', 
            $required       = false
        ) !!}
    </div>
</div>

{{-- Add the custom JS. --}}
@if(Request::ajax())
    {{-- When load pages with ajax, we need to keep the code in the loaded page. --}}
    <script>
        {!! Minify::folder('vineyard')->js() !!}
    </script>
@else
    {{-- In the other cases... just add the code to the javascript container --}}
    @section('javascript')
        <script>
            {!! Minify::folder('vineyard')->js() !!}
        </script>
    @endsection
@endif