{{-- Custom values --}}

{{-- Baume degrees --}}
<div class="row">
    <div class="form-group col-md-2">
        <label class="control-label" for="agronomic_baume">@lang('agronomics.baume:extended')</label>
        <div class="input-group">
            <input type="text" name="agronomic_baume" id="agronomic_baume" class="form-control number" value="{{ $data->agronomic_baume ?? null }}">
            <span class="input-group-addon">º</span>
        </div>
    </div>

    {{-- Acidity --}}
    <div class="form-group col-md-2">
        <label class="control-label" for="agronomic_acidity">@lang('agronomics.acidity:extended')</label>
        <div class="input-group">
            <input type="text" name="agronomic_acidity" id="agronomic_acidity" class="form-control number" value="{{ $data->agronomic_acidity ?? null }}">
            <span class="input-group-addon">@lang('units.acidity')</span>
        </div>
    </div>

    {{-- Ph --}}
    <div class="form-group col-md-2">
        <label class="control-label" for="agronomic_ph">@lang('agronomics.ph')</label>
        <input type="text" name="agronomic_ph" id="agronomic_ph" class="form-control number" value="{{ $data->agronomic_ph ?? null }}">
    </div>

    {{-- Poliphenol --}}
    <div class="form-group col-md-2">
        <label class="control-label" for="agronomic_poliphenol">@lang('agronomics.poliphenol:extended')</label>
        <input type="text" name="agronomic_poliphenol" id="agronomic_poliphenol" class="form-control number" value="{{ $data->agronomic_poliphenol ?? null }}">
    </div>

    {{-- Anthocyanin total --}}
    <div class="form-group col-md-2">
        <label class="control-label" for="agronomic_anthocyanin_total">@lang('agronomics.anthocyanin:extended')</label>
        <input type="text" name="agronomic_anthocyanin_total" id="agronomic_anthocyanin_total" class="form-control number" value="{{ $data->agronomic_anthocyanin_total ?? null }}">
    </div>

    {{-- Anthocyanin removable --}}
    <div class="form-group col-md-2">
        <label class="control-label" for="agronomic_anthocyanin_removable">@lang('agronomics.anthocyanin:e:extended')</label>
        <input type="text" name="agronomic_anthocyanin_removable" id="agronomic_anthocyanin_removable" class="form-control number" value="{{ $data->agronomic_anthocyanin_removable ?? null }}">
    </div>
</div>