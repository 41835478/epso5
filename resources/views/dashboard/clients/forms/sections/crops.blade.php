<div class="row">
    {{-- List of crops --}}
    @foreach($crops as $value)
        {!! Form::checkboxWithPivotTable($data, 'crop', $value->id, $value->crop_name) !!}
    @endforeach  
</div>