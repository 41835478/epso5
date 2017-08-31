{!! BootForm::open('form-delete')->action(route('dashboard.editor.users.eliminate')) !!}
    @component(component_path('modal'))
        @slot('bgColor', 'bg-danger')
        @slot('modalID', 'modal-delete')
        @slot('modalTitle', icon('alert', __('Delete item')))
        @slot('modalBody', [
            __('If you delete the message, you can not retrieve it'),
            __('It is an irreversible procedure. Are you sure?'),
        ])
        @slot('modalButtons', BootForm::button(icon('delete', trans('buttons.delete')))->class('btn btn-success')->type('submit')->id('button-modal-delete'))
    @endcomponent
    {{-- Add Item list --}}
    {!! BootForm::hidden('item-list')->id('item-list') !!}
{!! BootForm::close() !!}