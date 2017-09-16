{!! BootForm::open()->action(route('dashboard.admin.crop_variety_types.store'))->post() !!}
    
    {{-- Crop: id --}}
    {!! BootForm::hidden('crop_id')->value($cropId ?? null) !!}

    @foreach($cropData as $crop)
        <div class="row">
            {{-- Crop: name --}}
            {!! BootForm::text(trans_title('crops', 'singular'), 'crop_name')
                ->addGroupClass('col-md-4')
                ->value($cropName ?? null)
                ->disabled()
            !!}

            {{-- Crop: Variety --}}
            {!! BootForm::text(trans_title('crop_variety_types', 'singular'), 'crop_variety_type_name[' . $loop->index . ']')
                ->addGroupClass('col-md-4')
                ->value($crop->crop_variety_type_name ?? null)
                ->autofocus()
            !!}

            {{-- Crop: Variety code --}}
            {!! BootForm::text(trans('base.code'), 'crop_variety_type_code[' . $loop->index . ']')
                ->value($crop->crop_variety_type_code ?? null)
                ->addGroupClass('col-md-4')
                ->addClass('number')
                ->min(1)
                ->max(100)
            !!}
        </div>
        
        {{-- Get the loop index for the las input field --}}
        @if($loop->last)
            @php $last = $loop->index + 1; @endphp
        @endif
    @endforeach

    <div class="row">
        {{-- Crop: name --}}
        {!! BootForm::text(trans_title('crops', 'singular'), 'crop_name')
            ->addGroupClass('col-md-4')
            ->value($cropName ?? null)
            ->disabled()
        !!}

        {{-- Crop: Variety --}}
        {!! BootForm::text(trans_title('crop_variety_types', 'singular'), 'crop_variety_type_name[' . ($last ?? 0) . ']')
            ->addGroupClass('col-md-4')
            ->autofocus()
        !!}

        {{-- Crop: Variety code --}}
        {!! BootForm::text(trans('base.code'), 'crop_variety_type_code[' . ($last ?? 0) . ']')
            ->addGroupClass('col-md-4')
            ->addClass('number')
            ->defaultValue($last ? $last + 1 : 1)
            ->min(1)
            ->max(100)
        !!}
    </div>

{!! BootForm::close() !!}