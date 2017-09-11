@Role('editor')
    {{-- Plot Administration --}}
    <legend class="title">@lang('sections/plots.administration')</legend>
    @include(dashboard_path('plots.forms.sections.administration'))
@endRole

{{-- Plot information --}}
<legend class="title">@lang('sections/plots.plot')</legend>
@include(dashboard_path('plots.forms.sections.plot'))

{{-- Crop information --}}
<legend class="title">@lang('sections/plots.crop', ['crop' => getConfig('crop', 'name')])</legend>