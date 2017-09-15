@extends('dashboard')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div>{!! print_r(Credentials::config()) !!}</div>
            <div>Tipo de cultivo: {!! print_r(getCropType()) !!}</div>
        </div>
    </div>
@endsection
