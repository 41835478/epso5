<div class="row">
    {{-- List of Configurations --}}
    @foreach($configs as $value)
        {!! Html::checkbox($data, 'config', $value->id, $value->config_name) !!}
    @endforeach  
</div>