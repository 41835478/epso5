<div class="row">
    {{-- Field: Website --}}
    {!! BootForm::text(trans('persona.website'), 'profile_url')
        ->value($data->profile->profile_url ?? null)
        ->addGroupClass('col-md-6')
    !!}

    {{-- Field: Facebook --}}
    {!! BootForm::text(__('Facebook'), 'profile_social_facebook')
        ->value($data->profile->profile_social_facebook ?? null)
        ->addGroupClass('col-md-6')
    !!}

    {{-- Field: Twitter --}}
    {!! BootForm::text(__('Twitter'), 'profile_social_twitter')
        ->value($data->profile->profile_social_twitter ?? null)
        ->addGroupClass('col-md-6')
    !!}
</div>


<div class="row">
    {{--<div class="col-md-2">
        <img src="{{ image_path($data->profile ?? null) }}">
    </div> --}}

    {{-- Field: Image --}}
    {{--{!! BootForm::file('Imagen', 'stored_file')
        ->addGroupClass('col-md-2')
    !!}  --}}

    {{-- Field: Image --}}
    {{-- {!! BootForm::hidden('delete_uploded_file')->value($data->profile->stored_file ?? null) !!} --}}
</div>