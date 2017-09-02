{{-- All the personal information --}}
<legend class="title">@lang('sections/users.info:personal')</legend>
@include(dashboard_path('users.forms.sections.personal'))

{{-- All the profile information --}}
<legend class="title">@lang('sections/users.info:profile')</legend>
@include(dashboard_path('users.forms.sections.profile'))