<div class="row">
    {{-- List of crops --}}
    @foreach($crops as $value)
        {!! Html::checkbox($data, 'crop', $value->id, $value->crop_name) !!}
    @endforeach  
</div>