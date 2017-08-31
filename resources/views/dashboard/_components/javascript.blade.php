<script>
    {{-- CSRF protection --}}
    window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token()]); ?>
</script>
<script src="{!! mix('js/dashboard.js')!!}"></script>
@yield('javascript')
@yield('dataTables')