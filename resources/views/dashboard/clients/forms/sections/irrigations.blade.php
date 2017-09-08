<div class="row">
    {{-- List of irrigations --}}
    @foreach($irrigations as $value)
        {!! Html::model($data ?? null)
            ->item($value->id, $value->irrigation_name)
            ->relationship('irrigation')
            ->checkbox() 
        !!}
    @endforeach  
</div>