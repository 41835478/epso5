<div class="text-right align-middle">
    <a href="{{ route('dashboard.' . $role . '.' . $section . '.edit', $data->id) }}" class="btn btn-icon btn-warning button-edit-click">
        {!! icon('edit') !!}
    </a>
    <a href="{{ route('dashboard.' . $role . '.' . $section . '.download', $data->id) }}" class="btn btn-icon btn-info button-download-click">
        {!! icon('download') !!}
    </a>
</div>