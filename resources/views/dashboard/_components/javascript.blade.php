<script>
    {{-- No module found --}}
    window.errorModule = '<h4 class="alert alert-danger fade show text-center">@lang('sections/plots.loading')</h4 class="alert alert-danger fade show text-center">';
    {{-- CSRF protection --}}
    window.Laravel  = <?php echo json_encode(['csrfToken' => csrf_token()]); ?>
</script>
<script src="@yield('default-javascript', mix('js/dashboard.js'))"></script>
@yield('javascript')
@yield('dataTables')