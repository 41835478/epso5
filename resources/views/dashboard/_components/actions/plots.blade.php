<div class="text-right align-middle">
    <a href="{{ route('dashboard.' . $role . '.' . $section . '.edit', $data->id) }}" class="btn btn-icon btn-warning button-edit-click">
        {!! icon('edit') !!}
    </a>
    @if(isset($data->geolocation->geo_catastro_url))
        <a href="{!! $data->geolocation->geo_catastro_url !!}" target="_blank" class="btn btn-icon btn-info button-catastro-click">
            {!! icon('info') !!}
        </a>
    @endif
</div>