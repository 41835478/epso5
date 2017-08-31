@extends('dashboard')

@section('content')
    <div class="row">
        <div class="col-md-12">
            {{ Credentials::userRole(auth()->user()) }}
        </div>
    </div>
@endsection
