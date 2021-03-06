<div class="text-right align-middle">
    <a href="{{ route('dashboard.' . $role . '.' . $section . '.edit', $data->id) }}" class="btn btn-icon btn-warning button-edit-click">
        {!! icon('edit') !!}
    </a>
    <a href="{{ route('dashboard.' . $role . '.edaphologies.show', $data->id) }}" class="btn btn-icon btn-success button-edaphology-click">
        {!! icon('edaphology') !!}
    </a>
    @if(isset($data->geolocation->geo_catastro_url))
        <a href="{!! $data->geolocation->geo_catastro_url !!}" target="_blank" class="btn btn-icon btn-info button-catastro-click">
            {!! icon('world') !!}
        </a>
    @endif
</div>