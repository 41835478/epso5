@extends('dashboard')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @for($x=0; $x < 50; $x++)
                {{ rand(0, 1) }}
            @endfor
        </div>
    </div>
@endsection
