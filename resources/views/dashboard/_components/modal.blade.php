<div id="{{ $modalID ?? null }}" class="modal fade">
    <div class="modal-dialog {{ $modalSize ?? null }}" role="document">
        <div class="modal-content">
            <div class="modal-header {{ $bgColor ?? null }}">
                <h4 class="modal-title">{!! $modalTitle ?? null !!}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    @foreach($modalBody as $body)
                        <p>{!! icon('form', $body) ?? null !!}</p>
                    @endforeach
                <br>
                @if(!empty($modalForm))
                    <div class="row">
                        {!! $modalForm ?? null !!}
                    </div>
                @else
                    <div id="{!! $modalAjaxId ?? null !!}"></div>
                @endif
            </div>
            <div class="modal-footer">
                {!! Form::cancelButton(['modal' => true]) !!}
                {!! $modalButtons ?? null !!}
            </div>
        </div>
    </div>
</div>