<div class="row">
    {{-- List of trainings --}}
    @foreach($trainings as $value)
        {!! Html::checkbox($data, 'training', $value->id, $value->training_name) !!}
    @endforeach  
</div>