<div class="text-right align-middle">
    <a href="{{ route('dashboard.' . $role . '.' . $section . '.edit', $data->id) }}" class="btn btn-icon btn-warning">
        {!! icon('edit') !!}
    </a>
    <a href="{{ route('dashboard.' . $role . '.crop_varieties.show', $data->id) }}" class="btn btn-icon btn-success">
        {!! icon('crops') !!}
    </a>
    {{-- Crops types --}}
    @if($data->crop_type)
        <a href="#" class="btn btn-icon btn-terciary" 
            data-toggle="modal" 
            data-target="#modal-crop-variety-types" 
            data-cropId="{{ $data->id }}" 
            data-cropName="{{ $data->crop_name }}">
                {!! icon('crop-alt') !!}
        </a>
    @endif
    {{-- Crops types --}}
    <a href="{{ route('dashboard.' . $role . '.' . $section . '.edit', $data->id) }}" class="btn btn-icon btn-danger">
        {!! icon('pests') !!}
    </a>
    <a href="{{ route('dashboard.' . $role . '.' . $section . '.edit', $data->id) }}" class="btn btn-icon btn-info">
        {!! icon('tree') !!}
    </a>
</div>