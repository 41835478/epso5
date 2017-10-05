<div class="text-right align-middle">
    <a href="{{ route('dashboard.' . $role . '.' . $section . '.edit', $data->id) }}" class="btn btn-icon btn-warning button-edit-click">
        {!! icon('edit') !!}
    </a>
    <a href="#" data-item="{!! $data->id !!}" class="btn btn-icon btn-danger button-inspection-click">
        {!! icon('wrench') !!}
    </a>
</div>