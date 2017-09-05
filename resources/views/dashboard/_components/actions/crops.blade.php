<div class="text-center align-middle">
    <a href="{{ route('dashboard.' . $role . '.' . $section . '.edit', $data->id) }}" class="btn btn-icon btn-warning">
        {!! icon('edit') !!}
    </a>
    <a href="{{ route('dashboard.' . $role . '.crop-varieties.show', $data->id) }}" class="btn btn-icon btn-success">
        {!! icon('crops') !!}
    </a>
    <a href="{{ route('dashboard.' . $role . '.' . $section . '.edit', $data->id) }}" class="btn btn-icon btn-danger">
        {!! icon('pests') !!}
    </a>
    <a href="{{ route('dashboard.' . $role . '.' . $section . '.edit', $data->id) }}" class="btn btn-icon btn-info">
        {!! icon('tree') !!}
    </a>
</div>