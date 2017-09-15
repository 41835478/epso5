<div class="row">
    {{-- List of Configurations --}}
    @foreach($configs as $value)
        {!! Form::checkboxWithPivotTable($data, 'config', $value->id, $value->config_name) !!}
    @endforeach  
</div>