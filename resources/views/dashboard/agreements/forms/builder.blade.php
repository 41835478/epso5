{{-- All the personal information --}}
<legend class="title">@lang('sections/agreements.title')</legend>

{!! nl2br(trans('legals.conditions', [
    'ApplicationName'           => $data->administration_app_name,
    'ApplicationUrl'            => $data->administration_app_url,
    'ApplicationOwnerName'      => $data->administration_app_owner_name,
    'ApplicationOwnerNif'       => $data->administration_app_owner_nif,
    'ApplicationOwnerAddress'   => $data->administration_app_owner_address,
    'ApplicationOwnerEmail'     => $data->administration_app_owner_email,
    'ApplicationOwnerZip'       => $data->administration_app_owner_zip,
    'ApplicationOwnerCity'      => $data->administration_app_owner_city,
    'ApplicationOwnerRegion'    => $data->administration_app_owner_region,
    'ApplicationOwnerCountry'   => $data->administration_app_owner_country,
    'HostingName'               => $data->administration_hosting_name,
    'HostingNif'                => $data->administration_hosting_nif,
    'HostingAddress'            => $data->administration_hosting_address,
    'HostingRegister'           => $data->administration_hosting_register,
    'HostingConditions'         => $data->administration_hosting_conditions_url,
    'ClientName'                => getConfig('client', 'name'),
    'ClientEmail'               => getConfig('client', 'email'),
    'ClientNif'                 => getConfig('client', 'nif'),
    'ClientAddress'             => getConfig('client', 'address'),
    'ClientCity'                => getConfig('client', 'city'),
    'ClientRegion'              => getConfig('client', 'region'),
    'ClientZip'                 => getConfig('client', 'zip'),
])) !!}