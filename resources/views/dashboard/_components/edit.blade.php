<div class="row justify-content-center">
    <div class="col-md-12 max-width-container">
        {{-- Breadcrumb --}}
        @component(component_path('breadcrumb'))
            {{-- Breadcrumb items --}}
            @slot('breadcrumbItems', $breadcrumbItems ?? null)
            {{-- Dropdown items --}}
            @slot('dropdownItems', $dropdownItems ?? null)
        @endcomponent
    </div>

    {{-- The content --}}
    <div class="col-md-12 max-width-container">
        <div class="card card-form">
            <div class="card-header bg-primary">{!! icon('form', trans('base.form')) !!}</div>
            <div class="card-block">

                {{-- Edit form --}}
                {!! BootForm::open()->action(($routeAction ?? route('dashboard.' . $role . '.' . $section . '.update', $data->id)))->patch()->enctype('multipart/form-data') !!}
                    {{-- Bind the data to the forms --}}
                    {!! BootForm::bind($data) !!}

                    {{-- Include the custom blade form --}}
                    @include('dashboard.' . $section . '.forms.builder')
                    
                    {{-- The required legend --}}
                    <legend class="legend-required">{{ __('* Mandatory fields') }}</legend>

                    <div class="form-group text-center">
                        {!! Form::cancelButton() !!}
                        {!! Form::editButton() !!}
                    </div>

                {!! BootForm::close() !!}
                {{-- Edit form --}}
            </div>
        </div>
    </div>
</div>