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
                    <div class="row" id="{!! $modalAjaxId ?? null !!}"></div>
                @endif
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" data-dismiss="modal" id="button-modal-cancel">{!! icon('cancel', trans('buttons.cancel')) !!}</button>
                {!! $modalButtons ?? null !!}
            </div>
        </div>
    </div>
</div>