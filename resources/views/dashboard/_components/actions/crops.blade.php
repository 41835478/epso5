<div class="text-right align-middle">
    <a href="{{ route('dashboard.' . $role . '.' . $section . '.edit', $data->id) }}" class="btn btn-icon btn-warning button-edit-click">
        {!! icon('edit') !!}
    </a>
    <a href="{{ route('dashboard.' . $role . '.crop_varieties.show', $data->id) }}" class="btn btn-icon btn-success button-crops-click">
        {!! icon('crops') !!}
    </a>
    {{-- Crops types --}}
    @if($data->crop_type)
        <a href="{{ route('dashboard.' . $role . '.crop_variety_types.create', ['crop' => $data->id]) }}" class="btn btn-icon btn-terciary button-crop_type-click">{!! icon('crop-alt') !!}</a>
    @endif
    {{-- Crops types --}}
    <a href="{{ route('dashboard.' . $role . '.pests.show', $data->id) }}" class="btn btn-icon btn-danger button-pests-click">
        {!! icon('pests') !!}
    </a>
    <a href="{{ route('dashboard.' . $role . '.patterns.show', $data->id) }}" class="btn btn-icon btn-info button-pattern-click">
        {!! icon('tree') !!}
    </a>
</div>