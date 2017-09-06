{!! BootForm::open('form-delete')->action(route($setCustomRoute ?? 'dashboard.admin.crop_variety_types.store')) !!}
    @component(component_path('modal'))
        @slot('modalAjaxId', 'ajax-crop-variety-types')
        @slot('modalSize', 'modal-lg')
        @slot('bgColor', 'bg-warning')
        @slot('modalID', 'modal-crop-variety-types')
        @slot('modalTitle', icon('alert', 'Administrar tipos de cultivo: <span id="title-crop-variety-types"></span>'))
        @slot('modalBody', [
            sections('crop_variety_types.modal:message'),
        ])
        @slot('modalButtons', BootForm::button(icon('new', trans('buttons.new')))->class('btn btn-success')->type('submit')->id('button-modal-delete'))
    @endcomponent
{!! BootForm::close() !!}