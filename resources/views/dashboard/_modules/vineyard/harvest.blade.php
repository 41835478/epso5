{{-- Custom values --}}

{{-- Baume degrees --}}
<div class="row">
    <div class="form-group col-md-2">
        <label class="control-label" for="harvest_baume">@lang('agronomics.baume_extended')</label>
        <div class="input-group">
            <input type="text" name="harvest_baume" id="harvest_baume" class="form-control number" value="{{ $data->harvest_baume ?? null }}">
            <span class="input-group-addon">º</span>
        </div>
    </div>

    {{-- Acidity --}}
    <div class="form-group col-md-2">
        <label class="control-label" for="harvest_acidity">@lang('agronomics.acidity_extended')</label>
        <div class="input-group">
            <input type="text" name="harvest_acidity" id="harvest_acidity" class="form-control number" value="{{ $data->harvest_acidity ?? null }}">
            <span class="input-group-addon">@lang('units.acidity')</span>
        </div>
    </div>

    {{-- Ph --}}
    <div class="form-group col-md-2">
        <label class="control-label" for="harvest_ph">@lang('agronomics.ph')</label>
        <input type="text" name="harvest_ph" id="harvest_ph" class="form-control number" value="{{ $data->harvest_ph ?? null }}">
    </div>

    {{-- Poliphenol --}}
    <div class="form-group col-md-2">
        <label class="control-label" for="harvest_poliphenol">@lang('agronomics.poliphenol_extended')</label>
        <input type="text" name="harvest_poliphenol" id="harvest_poliphenol" class="form-control number" value="{{ $data->harvest_poliphenol ?? null }}">
    </div>

    {{-- Anthocyanin total --}}
    <div class="form-group col-md-2">
        <label class="control-label" for="harvest_anthocyanin_total">@lang('agronomics.anthocyanin_extended')</label>
        <input type="text" name="harvest_anthocyanin_total" id="harvest_anthocyanin_total" class="form-control number" value="{{ $data->harvest_anthocyanin_total ?? null }}">
    </div>

    {{-- Anthocyanin removable --}}
    <div class="form-group col-md-2">
        <label class="control-label" for="harvest_anthocyanin_removable">@lang('agronomics.anthocyanin_e_extended')</label>
        <input type="text" name="harvest_anthocyanin_removable" id="harvest_anthocyanin_removable" class="form-control number" value="{{ $data->harvest_anthocyanin_removable ?? null }}">
    </div>
</div>