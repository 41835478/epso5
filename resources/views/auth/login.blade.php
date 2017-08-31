@extends('dashboard')

@section('content')

    <div id="auth" class="mx-auto my-4">
        <div class="card">
            
            <div class="card-header text-center bg-gray">
                <h2>{!! icon('user', trans('auth.user:access')) !!}</h2>
            </div>

            <div class="card-block bg-white">
                {!! BootForm::open()->action(url('login'))->id('login') !!}
                    
                    {!! BootForm::inputGroup(null, 'email')
                        ->addGroupClass('my-4')
                        ->addClass('form-control-lg')
                        ->afterAddon(icon('email'))
                        ->placeholder(__('Email'))
                        ->required()
                    !!}
                    
                    {!! BootForm::inputGroup(null, 'password')
                        ->type('password')
                        ->addGroupClass('my-4')
                        ->addClass('form-control-lg')
                        ->afterAddon(icon('password'))
                        ->placeholder(__('Password'))
                        ->required()
                    !!}

                    <br>

                    <div class="d-flex justify-content-center">
                        {!! BootForm::button(icon('submit', trans('buttons.access')))
                            ->addClass('btn-primary btn-lg')
                            ->type('submit')
                         !!}
                    </div>

                    <br>

                    <div class="text-center">
                        <a class="btn btn-link" href="{{ url('/password/reset') }}">{{ trans('auth.password:forgot') }}</a>
                    </div>

                    <div class="text-center">
                        <a class="btn btn-link" href="{{ url('/register') }}">{{ trans('auth.user:register') }}</a>
                    </div>

                {!! BootForm::close() !!}   
            </div>
        </div>
    </div>
@endsection
