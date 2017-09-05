{!! BootForm::open()->action('http://action.com') !!}
    @component(component_path('modal'))
        {{-- @slot('modalSize', 'modal-lg or modal-sm or not send this variable to default value') --}}
        @slot('bgColor', 'bg-success')
        @slot('modalID', 'modal-example')
        @slot('modalTitle', icon('alert', __('Example modal')))
        @slot('modalBody', [
            'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus accusamus molestias, ab quibusdam saepe laudantium ipsa quis perspiciatis, sapiente ad deserunt voluptatum consequuntur dolorum ea esse eius natus laboriosam doloribus.',
            'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus accusamus molestias, ab quibusdam saepe laudantium ipsa quis perspiciatis, sapiente ad deserunt voluptatum consequuntur dolorum ea esse eius natus laboriosam doloribus.',
        ])
        @slot('modalForm')
            {!! BootForm::text('InputName1', 'Label1')->addGroupClass('col-md-6')->required() !!}
            {!! BootForm::text('InputName2', 'Label2')->addGroupClass('col-md-6')->required() !!}
        @endslot
        @slot('modalButtons', BootForm::button(trans('buttons.delete'))->type('submit')->class('btn btn-success'))
    @endcomponent
{!! BootForm::close() !!}