@extends('dashboard')

@section('content')
    <div class="row">
        <div class="col-md-12">
            {!! Html::image('images/marker-icon.png', null, ['class' => 'btn btn-secondary btn-sm icon']) !!}
            {!! print_r(array_diff([1, 2, 3, 4, 5], [1])) !!}
        </div>
    </div>
@endsection
