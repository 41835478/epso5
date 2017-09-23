{{--  Information alert --}}
<div id="{{ $containerID ?? null }}" class="alert alert-message alert-{{ $backgrounColor ?? 'success' }} alert-dismissible show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <h4 class="alert-heading text-center">{!! $title ?? icon('alert', trans('base.advice')) !!}</h4>
    <hr>
    {{ $content ?? null }}
</div>
