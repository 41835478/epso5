@extends('dashboard')

@section('content')
    <div class="row">
        <div class="col-md-12">
            {!! Html::image('images/marker-icon.png', null, ['class' => 'btn btn-secondary btn-sm icon']) !!}
            {{ Form::hiddenFields(['item1', 'item2', 'item3']) }}
        </div>
    </div>
@endsection
