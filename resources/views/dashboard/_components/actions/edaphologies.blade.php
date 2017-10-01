<div class="text-right align-middle">
    @Role('admin')
        <a href="{{ route('dashboard.' . $role . '.' . $section . '.edit', $data->id) }}" class="btn btn-icon btn-warning button-edit-click">
            {!! icon('edit') !!}
        </a>
    @endRole
</div>