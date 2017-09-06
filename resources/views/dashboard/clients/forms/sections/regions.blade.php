<div class="row">
   {{-- List of regions --}}
   @foreach($regions as $value)
       <div class="col-lg-2">
           {!! BootForm::checkbox($value->region_name, 'region_id[]')->value($value->id)->addClass('checkBoxCustom') !!}
       </div>
   @endforeach  
</div>