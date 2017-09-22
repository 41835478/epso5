<script>
    {{-- No module found --}}
    window.errorModule = '<h4 class="alert alert-danger fade show text-center">@lang('sections/plots.loading')</h4 class="alert alert-danger fade show text-center">';
    {{-- Map geolocation --}}
    window.currentLat = '{!! $data->geolocation->geo_lat ?? null !!}';
    window.currentLng = '{!! $data->geolocation->geo_lng ?? null !!}';
    {{-- CSRF protection --}}
    window.Laravel  = <?php echo json_encode(['csrfToken' => csrf_token()]); ?>
</script>
<script rel="preload" src="@yield('default-javascript', mix('js/dashboard.js'))" as="script"></script>
@yield('javascript')
@yield('dataTables')