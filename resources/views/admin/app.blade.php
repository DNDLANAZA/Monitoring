<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="author" content="DIMEFFO NOUSSI DERICK" />
  <title>
    AMN-Cpanel
  </title>
  @include('../partials.linkCss')
</head>

<body class="g-sidenav-show  bg-gray-100">
    @include("../partials/sidebar")

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <div class="container-fluid py-4">
            @include('../partials/header')
            @yield('content')

            @include('../partials/footer')
        </div>
    </main>

    @include('../partials/bottombar')

    @include('../partials/linkJs')
</body>
</html>
