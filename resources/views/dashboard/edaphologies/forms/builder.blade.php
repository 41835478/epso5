{{-- All the general information --}}
<legend class="title">@lang('sections/edaphologies.info:sample')</legend>
@include(dashboard_path('edaphologies.forms.sections.default'))

{{-- All the analysis information --}}
<legend class="title">@lang('sections/edaphologies.info')</legend>
@include(dashboard_path('edaphologies.forms.sections.analysis'))