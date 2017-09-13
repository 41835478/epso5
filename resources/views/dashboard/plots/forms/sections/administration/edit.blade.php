<div class="row">

    {{-- Admin && Editor fields --}}
    @Role('editor')

        {{-- Field: Client --}}
        {!! BootForm::hidden('client_id') !!}

        {{-- Field: Crop id --}}
        {!! BootForm::hidden('crop_id') !!}

        {{-- Field: Crop module --}}
        {!! BootForm::hidden('crop_module') !!}

        {{-- Field: User ID --}}
        {!! BootForm::select(sections('users.title'), 'user_id')
            ->addGroupClass('col-md-4')
            ->options($users)
            ->defaultValue(0)
        !!}

    {{-- User fields --}}
    @else
        
        {{-- Field: Client --}}
        {!! BootForm::hidden('client_id') !!}

        {{-- Field: Crop --}}
        {!! BootForm::hidden('crop_id') !!}

        {{-- Field: Crop module --}}
        {!! BootForm::hidden('crop_module') !!}

        {{-- Field: User ID --}}
        {!! BootForm::hidden('user_id') !!}

    @endRole
</div>