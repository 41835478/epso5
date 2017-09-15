<div class="row">
    {{-- List of trainings --}}
    @foreach($trainings as $value)
        {!! Form::checkboxWithPivotTable($data, 'training', $value->id, $value->training_name) !!}
    @endforeach  
</div>