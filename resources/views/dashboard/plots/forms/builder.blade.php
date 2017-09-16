{{-- Plot Administration --}}
@include(dashboard_path('plots.forms.sections.administration'))

{{-- Plot information --}}
@include(dashboard_path('plots.forms.sections.plot'))

{{-- Crop information --}}
@include(dashboard_path('plots.forms.sections.crop'))

{{-- Crop Geolocation --}}
@include(dashboard_path('plots.forms.sections.geolocation'))

{{-- Customize JS --}}
@section('default-javascript')
    {!! mix('js/maps.js') !!}
@endsection