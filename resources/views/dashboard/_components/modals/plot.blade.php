@component(component_path('modal'))
    @slot('bgColor', 'bg-info')
    @slot('modalID', 'modal-plot-info')
    @slot('modalTitle', icon('alert', sections('plots.plot')))
    @slot('modalBody', [
        icon('alert', sections('plots.plot')),
        icon('alert', sections('plots.plot')),
    ])
@endcomponent