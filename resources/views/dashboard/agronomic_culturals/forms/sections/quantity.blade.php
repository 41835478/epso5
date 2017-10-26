<div class="row">
    {{-- Field: Quantity  --}}
    {!! Form::agronomicQuantity($data ?? null) !!}

    {{-- Field: Quantity units --}}
    <div class="form-group col-md-2">
        <label class="control-label" for="agronomic_quantity_unit">{{ trans('units.title:mix') }}</label>
        <select name="agronomic_quantity_unit" id="agronomic_quantity_unit" class="form-control" required="required">
            <option value="1">Kg</option>
        </select>
    </div>
</div>