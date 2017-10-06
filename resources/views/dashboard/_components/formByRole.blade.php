{{-- If the role is user or we are editing... --}}
@if(isset($data) || Credentials::isOnlyRole('user'))

    {{-- Fields: user --}}
    {!! BootForm::hidden('user_id')->value(Credentials::id() ?? null) !!}
    {{-- Fields: client --}}
    {!! BootForm::hidden('client_id')->value(getClientId()) !!}

@else 

    <div class="row">
        {{-- Field: Client and users. See controller for role assigment. --}}
        {!! Form::clientsAndUsers($clients ?? null, $users ?? null, $loadModule = false)!!}   
    </div>
    <hr>

@endif

{{-- Add plots --}}
@if(!empty($plot))
    Plots
@endif