{{-- If the role is user or we are editing... --}}
@if(isset($data) || Credentials::isOnlyRole('user'))
    {{-- Fields: user --}}
    {!! BootForm::hidden('user_id')->id('user_id')->value(isset($data) ? $data->user_id : (Credentials::id() ?? null)) !!}
    {{-- Fields: client --}}
    {!! BootForm::hidden('client_id')->id('client_id')->value(isset($data) ? $data->client_id : getClientId()) !!}
    {{-- Add plots --}}
    @if(!empty($withPlot))
        {!! Form::plots($plots ?? null) !!} 
        <hr>
    @endif
@else 
    {{-- Creating a new user or the role is superior to user --}}
    <div class="row">
        {{-- Field: Client and users. See controller for role assigment. --}}
        {!! Form::clientsAndUsers($clients ?? null, $users ?? null, $loadModule = $withModule ?? false) !!}   
        {{-- Add plots --}}
        @if(!empty($withPlot))
            {!! Form::plots($plots ?? null) !!}   
        @endif
        <hr>
    </div>
    <hr>
@endif
