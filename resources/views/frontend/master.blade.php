<!DOCTYPE Html>
<Html lang="en-US" class="lang-en_US" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<meta http-equiv="content-type" content="text/Html;charset=UTF-8"/><!-- /Added by HTTrack -->
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Smartlinks</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    {{ Html::style('css/app.css') }}
    {{ Html::style('css/frontend.css') }}
    @yield('styles')
</head>
<body>
<header id="header">

</header>
<div id="main-banner">
    <div class="col-md-12">
        <div class="row">
            @include('menu.menu')
            @yield('slider')
        </div>
    </div>
</div>
@yield('breadcrumb')
<div id="main-contain" class="container col-md-12">
    <div class="empty-space"></div>
    <div class="row">
        <div class="col-md-3">
            @include('frontend.trangchu.danhmuc')
        </div>
        <div class="col-md-9">
            @yield('container')
        </div>
    </div>
</div>


@include('common.footer')

{{ Html::script('js/core.js') }}
@yield('scripts')
{{ Html::script('js/scripts.js') }}
</body>

</Html>