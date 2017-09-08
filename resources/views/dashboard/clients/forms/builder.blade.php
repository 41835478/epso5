{{-- Default forms --}}
<legend class="title">@lang('sections/users.info:personal')</legend>
@include(dashboard_path('clients.forms.sections.default'))
@include(dashboard_path('clients.forms.sections.file'))

{{-- Regions alloweds --}}
<legend class="title">@lang('sections/clients.form:regions')</legend>
@include(dashboard_path('clients.forms.sections.regions'))

{{-- Crops alloweds --}}
<legend class="title">@lang('sections/clients.form:crops')</legend>
@include(dashboard_path('clients.forms.sections.crops'))

{{-- Trainings alloweds --}}
<legend class="title">@lang('sections/clients.form:trainings')</legend>
@include(dashboard_path('clients.forms.sections.trainings'))

{{-- Irrigations alloweds --}}
<legend class="title">@lang('sections/clients.form:irrigations')</legend>
@include(dashboard_path('clients.forms.sections.irrigations'))