<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CityCard</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="publi">
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    </head>
    <body>
        <div id="app">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="top">


                            <div class="body-card">
                                <div class="text-center">
                                    <a href="{{ route('home') }}" class="btn-3d">Головна</a>
                                    @if (Session::has('user'))
                                    <a href="{{ route('card.payment.index') }}" class="btn-3d ">Історія операцій</a>
                                        <a href="{{ route('card.add') }}" class="btn-3d">Додати картку</a>
                                        <a href="{{ route('auth.logout') }}" class="btn-3d">Вийти</a>
                                        <h1>Привіт, {{ Session::get('user')->login }}</h1>

                                        @if (Session::get('user')->role === 'admin')
                                            <a href="{{ route('admin.dashboard') }}" class="btn-3d ">Dashboard</a>
                                        @endif
                                    @else
                                        <a href="{{ route('auth.login') }}" class="btn-3d ">Увійти</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
            @yield('content')
            </div>
        </div>

    </body>
</html>
