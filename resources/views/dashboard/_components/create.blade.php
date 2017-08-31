<div class="row justify-content-center">
    <div class="col-md-12 max-width-container">
        {{-- Breadcrumb --}}
        @component(component_path('breadcrumb'))
            {{-- Breadcrumb items --}}
            @slot('breadcrumbItems', $breadcrumbItems)
        @endcomponent
    </div>

    {{-- The content --}}
    <div class="col-md-12 max-width-container">
        <div class="card card-form">
            <div class="card-header bg-primary">{!! icon('form', trans('base.form')) !!}</div>
            <div class="card-block">

                {{-- Edit form --}}
                {!! BootForm::open()->action(route('dashboard.' . $role . '.' . $section . '.store'))->post()->enctype('multipart/form-data') !!}

                    {{-- Include the custom blade form --}}
                    @include('dashboard.' . $section . '.forms.form')
                    
                    {{-- The required legend --}}
                    <legend class="legend-required">{{ __('* Mandatory fields') }}</legend>

                    <div class="form-group text-center">
                        <a href="{{ url()->previous() }}" class="btn btn-danger btn-lg">{!! icon('cancel', trans('buttons.cancel')) !!}</a>
                        {!! BootForm::button(icon('new', trans('buttons.new')))->addClass('btn-success btn-lg')->type('submit') !!}
                    </div>

                {!! BootForm::close() !!}
                {{-- Edit form --}}
            </div>
        </div>
    </div>
</div>