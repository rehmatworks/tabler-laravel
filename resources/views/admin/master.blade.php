<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', __('common.adminarea')) | {{ env('APP_NAME') }}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <script src="{{ asset('assets/js/require.min.js') }}"></script>
    <script>
      requirejs.config({
          baseUrl: '{{ url('/') }}'
      });
      const adminurl = '{{ route('admin.dashboard') }}';
    </script>
    <link href="{{ asset('assets/css/dashboard.css') }}" rel="stylesheet" />
  </head>
  <body class="">
    <div class="page" id="app">
      <div class="flex-fill">
        <div class="header py-4">
          @include('admin.partials.headnav')
        </div>
        <div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
          @include('admin.partials.mainnav')
        </div>
        <div class="my-3 my-md-5">
            <div class="container">
                @if(Request::get('q'))
                <p>{{ __('common.showingsearchresultsfor') }} <strong>{{ Request::get('q') }}</strong>. <a href="{{ Request::url() }}">{{ __('common.resetsearch') }}</a></p>
                @endif
            </div>
            @yield('content')
        </div>
      </div>
      <footer class="footer">
        @include('admin.partials.footer')
      </footer>
    </div>
    <script src="{{ asset('js/vendor.js') }}?{{ uniqid() }}"></script>
    <script src="{{ asset('js/manifest.js') }}?{{ uniqid() }}"></script>
    <script src="{{ asset('js/app.js') }}?{{ uniqid() }}"></script>
  </body>
</html>
