@if(!empty($dropdownItems))
    <div class="btn-group float-right">
        <button type="button" id="button-config" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {!! $dropdownName ?? null !!}
        </button>

        <div class="dropdown-menu dropdown-menu-right">
            @foreach($dropdownItems as $item)
                {!! $item[0] !!}
            @endforeach
        </div>
    </div>
@endif