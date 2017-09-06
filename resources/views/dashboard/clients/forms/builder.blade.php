{{-- Default forms --}}
<legend class="title">@lang('sections/users.info:personal')</legend>
@include(dashboard_path('clients.forms.sections.default'))
@include(dashboard_path('clients.forms.sections.file'))

{{-- Regions alloweds --}}
<legend class="title">@lang('sections/clients.form:regions')</legend>
@include(dashboard_path('clients.forms.sections.regions'))