{{-- All the application information --}}
<legend class="title">@lang('sections/administrations.app')</legend>
@include(dashboard_path('administrations.forms.sections.app'))

{{-- All the hosting information --}}
<legend class="title">@lang('sections/administrations.hosting')</legend>
@include(dashboard_path('administrations.forms.sections.hosting'))