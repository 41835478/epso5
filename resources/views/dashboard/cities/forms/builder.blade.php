{{-- All the personal information --}}
<legend class="title">@lang('sections/cities.info')</legend>
@include(dashboard_path('cities.forms.sections.default'))

{{-- Localization information --}}
<legend class="title">@lang('sections/cities.localization')</legend>
@include(dashboard_path('cities.forms.sections.localization'))