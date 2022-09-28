<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="author" content="DIMEFFO NOUSSI DERICK" />
  <title>
    Authentification
  </title>
  @include('/partials.linkCss')
</head>

<body>
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-75">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                            @yield('content')
                        </div>
                        <div class="col-md-6">
                            @yield('background')
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    @include('/partials/linkJs')
</body>
</html>
