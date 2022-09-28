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
  @include('../partials.linkCss')
</head>

<body>
    <main class="main-content  mt-0">
        <section class="min-vh-100 mb-8">
            <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('../assets/img/curved-images/curved14.jpg');">
                <span class="mask bg-gradient-dark opacity-6"></span>
                <div class="container">
                  <div class="row justify-content-center">
                    <div class="col-lg-5 text-center mx-auto">
                      <h1 class="text-white mb-2 mt-5">Welcome!</h1>
                      <p class="text-lead text-white">Use these awesome forms to create a new user</p>
                    </div>
                  </div>
                </div>
            </div>

            <div class="container">
                <div class="row mt-lg-n10 mt-md-n11 mt-n10">
                    <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                        <div class="card z-index-0">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    @include('../partials/linkJs')
</body>
</html>
