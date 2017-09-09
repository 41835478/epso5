<div class="row">
    {{-- List of Configurations --}}
    @foreach($configs as $value)
        {!! Html::model($data ?? null)
            ->item($value->id, $value->config_name)
            ->relationship('config')
            ->checkbox() 
        !!}
    @endforeach  
</div>