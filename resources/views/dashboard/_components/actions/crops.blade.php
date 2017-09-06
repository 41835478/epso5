<div class="text-right align-middle">
    <a href="{{ route('dashboard.' . $role . '.' . $section . '.edit', $data->id) }}" class="btn btn-icon btn-warning button-edit-click">
        {!! icon('edit') !!}
    </a>
    <a href="{{ route('dashboard.' . $role . '.crop_varieties.show', $data->id) }}" class="btn btn-icon btn-success button-crops-click">
        {!! icon('crops') !!}
    </a>
    {{-- Crops types --}}
    @if($data->crop_type)
        <a href="#" class="btn btn-icon btn-terciary button-crop_type-click" 
            data-toggle="modal" 
            data-target="#modal-crop-variety-types" 
            data-cropId="{{ $data->id }}" 
            data-cropName="{{ $data->crop_name }}">
                {!! icon('crop-alt') !!}
        </a>
    @endif
    {{-- Crops types --}}
    <a href="{{ route('dashboard.' . $role . '.' . $section . '.edit', $data->id) }}" class="btn btn-icon btn-danger button-pests-click">
        {!! icon('pests') !!}
    </a>
    <a href="{{ route('dashboard.' . $role . '.' . $section . '.edit', $data->id) }}" class="btn btn-icon btn-info button-pattern-click">
        {!! icon('tree') !!}
    </a>
</div>