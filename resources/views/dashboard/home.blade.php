@extends('dashboard')

@section('content')
    <div class="row">
        <div class="col-md-12">
            {!! print_r(Credentials::config()) !!}
        </div>
    </div>
@endsection
