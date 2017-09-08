<div class="row">
    {{-- List of trainings --}}
    @foreach($trainings as $value)
        {!! Html::model($data ?? null)
            ->item($value->id, $value->training_name)
            ->relationship('training')
            ->checkbox() 
        !!}
    @endforeach  
</div>