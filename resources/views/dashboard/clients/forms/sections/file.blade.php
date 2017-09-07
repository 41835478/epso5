<div class="row">
    <div class="col-md-4">
        {!! Html::thumbnail($data->client_image) !!}
    </div>
    <div class="break-line"></div>
    {{-- Field: Image --}}
    {!! BootForm::file(null, 'stored_file')
        ->addGroupClass('col-md-4')
    !!}  
</div>