@extends('dashboard')

@section('content')
    <div class="row">
        <div class="col-md-12">
            {!! print_r(Credentials::config()->get('irrigations')) !!}
        </div>
    </div>
@endsection
