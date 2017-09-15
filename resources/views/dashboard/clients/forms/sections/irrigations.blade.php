<div class="row">
    {{-- List of irrigations --}}
    @foreach($irrigations as $value)
        {!! Form::checkboxWithPivotTable($data, 'irrigation', $value->id, $value->irrigation_name) !!}
    @endforeach  
</div>