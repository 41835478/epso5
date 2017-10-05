{{-- All the machine information --}}
<legend class="title">@lang('sections/machines.info')</legend>
@include(dashboard_path('machines.forms.sections.default'))

{{-- Inspection information --}}
<legend class="title">@lang('sections/machines.inspection:info')</legend>
@include(dashboard_path('machines.forms.sections.inspection'))