@extends('dashboard')

@section('content')
    <div class="row">
        <div class="col-md-12">
            {!! randonWithDecimals(10, 12) !!}
        </div>
    </div>
@endsection
