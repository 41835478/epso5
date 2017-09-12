{{-- Only show title when: god, admin or editor --}}
@hasAnyRoles(['editor'])
    <legend class="title">@lang('sections/plots.administration')</legend>
@endRoles

@if(isset($data))
    @include(dashboard_path('plots.forms.sections.administration.edit'))
@else 
    @include(dashboard_path('plots.forms.sections.administration.create'))
@endif