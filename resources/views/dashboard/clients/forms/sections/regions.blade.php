<div class="row">
    {{-- List of regions --}}
    @foreach($regions as $value)
        {!! Form::checkboxWithPivotTable($data, 'region', $value->id, $value->region_name) !!}
    @endforeach  
</div>