<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="_token" content="{{ csrf_token() }}" />

{{-- Customize Title --}}
<title>@yield('meta-title', config('app.name') . ' v' . config('app.version') . ' - ' . (isset($section) ? trans_title($section) : null))</title>

{{-- MetaTags --}}
<meta name="description" content="@yield('meta-description', 'Description')">
<meta name="keywords" content="@yield('meta-keywords', 'Keywords')">
<meta name="author" content="www.damianaguilar.es">
<link rel="canonical" href="http://www.damianaguilar.es">
@yield('metatags') 

<!-- Startup configuration -->
{{-- <link rel="manifest" href="{!! asset('/manifest.json') !!}"> --}}

<!-- Fallback application metadata for legacy browsers -->
<meta name="application-name" content="@yield('meta-title', 'Application')">
<link rel="icon" href="data:;base64,iVBORw0KGgo=">

{{-- CSS --}}
<link rel="stylesheet" href="@yield('css', mix('css/dashboard.css'))">
<link rel="stylesheet" href="{{ url(icon_cdn()) }}">
@yield('custom-css')

<!-- ALL BROWSERS -->
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->