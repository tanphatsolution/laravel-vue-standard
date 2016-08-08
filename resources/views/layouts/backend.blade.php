<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <title>@yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="description" content="Application Management System">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{ HTML::style(elixir('assets/css/backend/app.css')) }}
    @stack('prestyles')
</head>
<body class="skin-blue sidebar-mini">
    <div class="wrapper" id="app"></div>

    {{ HTML::script('vendor/jquery/jquery.min.js') }}
    {{ HTML::script('vendor/bootstrap/js/bootstrap.min.js') }}
    {{ HTML::script(elixir('assets/js/backend/app.js')) }}
    {{ HTML::script(elixir('assets/vue/backend/app.js')) }}
    @stack('prescripts')
</body>
</html>