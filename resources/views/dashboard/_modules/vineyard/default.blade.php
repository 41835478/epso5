<div class="row">
    {{-- Field: Crop --}}
    <div class="form-group col-md-2">
        <label class="control-label" for="plot_crop_name">{{ sections('crops.title') }}</label>
        <input type="text" name="plot_crop_name" class="form-control" value="{{ $cropName ?? null }}" readonly="readonly">
    </div>

    {{-- Field: Crop type --}}
    <div class="form-group col-md-2">
        <label class="control-label" for="plot_crop_type">{{ sections('crop_variety_types.title') }}</label>
        <select name="plot_crop_type" id="plot_crop_type" class="form-control" required="required">
            @foreach($cropTypes as $key => $value)
                {!! selected($data->plot_crop_type ?? null, $key, $value) !!}
            @endforeach
        </select>
    </div>
</div>