<div class="row">
   {{-- List of regions --}}
   @foreach($regions as $value)
       <div class="col-lg-2">
            @if(isset($data) && in_array($value->id, $data->region->pluck('id')->all()))
                {!! BootForm::checkbox($value->region_name, 'region_id[]')->value($value->id)->addClass('checkBoxCustom')->check() !!}
            @else 
                {!! BootForm::checkbox($value->region_name, 'region_id[]')->value($value->id)->addClass('checkBoxCustom') !!}
            @endif
       </div>
   @endforeach  
</div>