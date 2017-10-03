{{-- All the personal information --}}
<legend class="title">@lang('sections/agreements.title')</legend>

{!! nl2br(trans('legals.conditions', [
    'ApplicationName'           => 'Application',
    'ApplicationUrl'            => 'Application url',
    'ApplicationOwnerName'      => 'Application owner name',
    'ApplicationOwnerNif'       => 'Application owner nif',
    'ApplicationOwnerAddress'   => 'Application owner address',
    'ApplicationOwnerEmail'     => 'Application owner email',
    'ApplicationOwnerZip'       => 'Application owner zip',
    'ApplicationOwnerCity'      => 'Application owner city',
    'ApplicationOwnerRegion'    => 'Application owner region',
    'ApplicationOwnerCountry'   => 'Application owner country',
    'HostingName'               => 'Hosting name',
    'HostingNif'                => 'Hosting nif',
    'HostingAddress'            => 'Hosting address',
    'HostingRegister'           => 'Hosting register',
    ':HostingConditions'        => 'Hosting legal conditions',
])) !!}