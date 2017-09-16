<div class="row">
    {{-- Field: Crop --}}
    <div class="form-group col-md-2">
        <label class="control-label" for="plot_crop_name">{{ sections('crops.title') }}</label>
        <input type="text" name="plot_crop_name" class="form-control" value="{{ $cropName ?? null }}" readonly="readonly">
    </div>

    {{-- Field: Crop type --}}
    <div class="form-group col-md-2">
        <label class="control-label" for="crop_variety_type">{{ sections('crop_variety_types.title') }}</label>
        <select name="crop_variety_type" id="crop_variety_type" class="form-control" required="required">
            <option></option>
            @foreach($cropTypes as $key => $value)
                {!! Form::optionSelected($data->crop_variety_type ?? null, $key, $value) !!}
            @endforeach
        </select>
    </div>

    {{-- Field: Crop Variety --}}
    <div class="form-group col-md-3">
        <label class="control-label" for="crop_variety_id">{{ sections('crop_varieties.title') }}</label>
        <select name="crop_variety_id" id="crop_variety_id" class="form-control" required="required">
            <option></option>
            @foreach($cropVarieties as $key => $value)
            {!! Form::optionSelected($data->crop_variety_id ?? null, $key, $value) !!}
            @endforeach
        </select>
    </div>

    {{-- Field: Crop Patterns --}}
    <div class="form-group col-md-3">
        <label class="control-label" for="pattern_id">{{ sections('patterns.title') }}</label>
        <select name="pattern_id" id="pattern_id" class="form-control">
            <option></option>
            @foreach($cropPatterns as $key => $value)
                {!! Form::optionSelected($data->pattern_id ?? null, $key, $value) !!}
            @endforeach
        </select>
    </div>

    {{-- Field: Crop quantity --}}
    <div class="form-group col-md-2">
        <label class="control-label" for="crop_quantity">{{ sections('plots.quantity') }}</label>
        <div class="input-group">
            <input type="text" name="crop_quantity" value="{{ isset($data) ? $data->crop_quantity : null }}" id="crop_quantity" class="form-control number">
            <span class="input-group-addon">uds</span>
        </div>
    </div>
</div>

<div class="row">
    {{-- Field: Crop --}}
    <div class="form-group col-md-2">
        <label class="control-label" for="crop_training">{{ sections('trainings.title') }}</label>
        <select name="crop_training" id="crop_training" class="form-control">
            <option></option>
            @foreach($cropTrainig as $key => $value)
                {!! Form::optionSelected($data->crop_training ?? null, $key, $value) !!}
            @endforeach
        </select>
    </div>
</div>

{{-- Add the custom JS --}}
@if(Request::ajax())
<script>
    {!! Minify::folder('vineyard')->js() !!}
</script>
@else
@section('javascript')
<script>
    {!! Minify::folder('vineyard')->js() !!}
</script>
@endsection
@endif