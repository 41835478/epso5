<div class="row">
    {{-- List of regions --}}
    @foreach($regions as $value)
        {!! Html::model($data ?? null)
            ->item($value->id, $value->region_name)
            ->relationship('region')
            ->checkbox() 
        !!}
    @endforeach  
</div>