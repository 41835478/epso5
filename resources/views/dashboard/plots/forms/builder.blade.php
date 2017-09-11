{{-- All the personal information --}}
<legend class="title">@lang('sections/plots.info'): {{ getConfig('crop', 'name') }}</legend>
@include(dashboard_path('plots.forms.sections.info'))