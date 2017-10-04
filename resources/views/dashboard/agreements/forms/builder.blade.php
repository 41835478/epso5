{{-- All the personal information --}}
<legend class="title">@lang('legals.title')</legend>

{!! BootForm::textarea(trans('legals.title'), 'agreement_text')
    ->value($text ?? null)
    ->row(10)
!!}