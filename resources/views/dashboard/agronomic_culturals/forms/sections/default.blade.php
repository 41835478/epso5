{{-- Add client, user and plot... if needed --}}
@include(component_path('formByRole'), ['withPlot' => true])

<div class="row">

    {{-- Row id --}}
    {!! BootForm::hidden('row_id')->value($data->id ?? null) !!}
    
    {{-- Field: crop --}}
    {!! BootForm::hidden('crop_id')->id('crop_id')->value(Credentials::isOnlyRole('user') ? getCropId() : null) !!}

    {{-- Field: Cultural field --}}
    <div class="form-group col-md-4">
        <label class="control-label" for="cultural_id">Labor cultural</label>
        <select name="cultural_id" id="cultural_id" class="form-control" data-module="" required="required">
            <option></option>
            @foreach(select('culturals', $firstOptionValue = false) as $key => $value)
                <option value="{{ $key }}" data-type="{{ $value['form'] }}">{{ $value['title'] }}</option>
            @endforeach
        </select>
    </div>
</div>