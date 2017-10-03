@extends('dashboard')

@section('content')

    <div class="row justify-content-center">
        {{-- The content --}}
        <div class="col-md-12 max-width-container">
            <div class="card card-form">
                <div class="card-header bg-primary">{!! icon('form', trans('base.form')) !!}</div>
                <div class="card-block">

                    {{-- Edit form --}}
                    {!! BootForm::open()->action((route('dashboard.' . $role . '.' . $section . '.update', $data->id)))->patch()->enctype('multipart/form-data') !!}
                        {{-- Bind the data to the forms --}}
                        {!! BootForm::bind($data) !!}

                        {{-- Include the custom blade form --}}
                        @include('dashboard.' . $section . '.forms.builder')

                        <div class="form-group text-center">
                            {!! Form::agreementButton() !!}
                        </div>

                    {!! BootForm::close() !!}
                    {{-- Edit form --}}
                </div>
            </div>
        </div>
    </div>
@endsection