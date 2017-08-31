@component(component_path('modal'))
    @slot('bgColor', 'bg-danger')
    @slot('modalID', 'modal-error')
    @slot('modalTitle', icon('alert', __('Selection error')))
    @slot('modalBody', [
        __('You must select at least one item from the table'),
    ])
@endcomponent