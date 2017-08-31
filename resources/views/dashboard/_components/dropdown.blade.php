@if(!empty($dropdownItems))
    <div class="btn-group float-right">
        <button type="button" id="button-config" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {!! $dropdownName !!}
        </button>

        <div class="dropdown-menu dropdown-menu-right">
            @foreach($dropdownItems as $item)
                {!! Html::class('dropdown')->link($item) !!}
            @endforeach
        </div>
    </div>
@endif