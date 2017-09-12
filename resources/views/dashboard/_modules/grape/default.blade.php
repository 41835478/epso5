<div class="row">
    {{-- Field: example --}}
    <div class="form-group col-md-3">
        <label class="control-label control-label-required label-required" for="plot_name">Parcela</label>
        <input type="text" name="plot_example" id="plot_example" class="form-control" required="required">
    </div>

    {{-- Field: Crop --}}
    <div class="form-group col-md-2">
        <label class="control-label control-label-required label-required" for="plot_crop_name">{{ sections('crops.title') }}</label>
        <input type="text" name="plot_crop_name" class="form-control" value="{{ $moduleName ?? null }}" readonly="readonly">
    </div>
</div>