<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dacha</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700,800,900&display=swap"
          rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body id="app-layout">

@guest
    <div class="flex-center">
        <div class="py-3">

            @if (Route::has('login'))
                &nbsp;&nbsp;&nbsp;<a href="{{ route('login') }}">Войти</a>
                <a href="{{ route('register') }}">Регистрация</a>

            @else
                <a href="{{ route('register') }}">Регистрация</a>
            @endif
        </div>
    </div>
@endguest


{{--@if (Route::has('home'))--}}
@auth
    <nav>
        <div class="sidebar-menu p-1 p-md-3 text-center">
            <input type="checkbox" id="sidebar-toggle" class="mobile-menu-checkbox">

            <label for="sidebar-toggle" class="mobile-menu-hamburger">
                <span class="mobile-menu-icon"></span>
            </label>

            <div class="mobile-menu">
                <form class="d-inline mr-2" method="get" action="/users">
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-outline-success btn-lg align-top"
                           value="Список пользоватлей"/>
                </form>
                <form class="d-inline mr-2" method="get" action="/products">
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-outline-success btn-lg align-top" value="Список товаров"/>
                </form>
                <form class="d-inline mr-2" method="get" action="/barcode/form">
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-outline-success btn-lg align-top"
                           value="Генерация кодов"/>
                </form>
                <form class="d-inline mr-2" method="POST" action="{{ route('logout') }}">
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-outline-success btn-lg align-top" value="Выход"/>
                </form>
                {{--                <form class="d-inline mr-2" method="get" action="/sms/form">--}}
                {{--                    {{ csrf_field() }}--}}
                {{--                    <input type="submit" class="btn btn-outline-success btn-lg align-top" value="Отправка смс"/>--}}
                {{--                </form>--}}
            </div>
        </div>
    </nav>
@endauth
{{--@else--}}
{{--    <div class="flex-center">--}}
{{--        <div class="py-3">--}}
{{--                <a href="{{ route('login') }}">Войти</a>--}}

{{--                @if (Route::has('register'))--}}
{{--                    &nbsp;&nbsp;&nbsp;--}}
{{--                    <a href="{{ route('register') }}">Регистрация</a>--}}
{{--                @endif--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endif--}}

@yield('content')

<!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>

