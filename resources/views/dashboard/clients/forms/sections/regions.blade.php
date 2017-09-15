<div class="row">
    {{-- List of regions --}}
    @foreach($regions as $value)
        {!! Html::checkbox($data, 'region', $value->id, $value->region_name) !!}
    @endforeach  
</div>