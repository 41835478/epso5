{!! BootForm::open()->action('http://action.com')->id('form-crop-variety-types') !!}
    @component(component_path('modal'))
        @slot('modalAjaxId', 'ajax-crop-variety-types')
        @slot('modalSize', 'modal-lg')
        @slot('bgColor', 'bg-warning')
        @slot('modalID', 'modal-crop-variety-types')
        @slot('modalTitle', icon('alert', 'Administrar tipos de cultivo: <span id="title-crop-variety-types"></span>'))
        @slot('modalBody', [
            'Seleccione los tipo de cultivo disponibles. Por ejemplo, en el caso de la uva: tinta o blanca.',
        ])
        @slot('modalButtons', BootForm::button(trans('buttons.edit'))->type('submit')->class('btn btn-success'))
    @endcomponent
{!! BootForm::close() !!}