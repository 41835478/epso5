<div class="text-center align-middle">
    <a href="{{ route('dashboard.' . $role . '.' . $section . '.edit', [$data->id, $data->crop_id]) }}" class="btn btn-icon btn-warning">
        {!! icon('edit') !!}
    </a>
</div>