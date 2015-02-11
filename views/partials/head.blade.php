<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>{{{ isset($pageTitle) ? "$pageTitle | " : '' }}}{{{ Config::get('site.name') }}} </title>
@if(isset($pageDescription))
    <meta name="description" content="{{{ $pageDescription }}}" />
    <meta property="og:description" content="{{{ $pageDescription }}}" />
@endif
@if(isset($pageKeywords))
    <meta name="keywords" content="{{{ $pageKeywords }}}" />
@endif

<meta property="og:site_name" content="{{{ Config::get('site.name') }}}" />
<meta property="og:locale" content="{{ App::getLocale() }}" />
@if(isset($pageTitle))
    <meta property="og:title" content="{{{ $pageTitle }}}" />
@endif

@if(isset($openGraphAttributes))
    @foreach($openGraphAttributes as $key => $value)
        <meta property="{{ $key }}" content="{{{ $value }}}" />
    @endforeach
@endif

<!-- css files -->
<link rel="stylesheet" href="{{ moduleAsset('front', 'css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ moduleAsset('front', 'css/shared.css') }}" />

{{ Tee\System\Asset::css() }}
<!-- css styles -->
{{ Tee\System\Asset::styles() }}
<!-- js files (header) -->
<script src="{{ moduleAsset('front', 'js/jquery.min.js') }}"></script>
<script src="{{ moduleAsset('front', 'js/bootstrap.min.js') }}"></script>
{{ Tee\System\Asset::js('header') }}
<!-- js scripts (header) -->
{{ Tee\System\Asset::scripts('header') }}