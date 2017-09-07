<div class="row">
    {{-- List of crops --}}
    @foreach($crops as $value)
        {!! Html::model($data ?? null)
            ->item($value->id, $value->crop_name)
            ->relationship('crop')
            ->checkbox() 
        !!}
    @endforeach  
</div>