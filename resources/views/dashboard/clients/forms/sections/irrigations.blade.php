<div class="row">
    {{-- List of irrigations --}}
    @foreach($irrigations as $value)
        {!! Html::checkbox($data, 'irrigation', $value->id, $value->irrigation_name) !!}
    @endforeach  
</div>