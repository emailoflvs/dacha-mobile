@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="">
                    <div class="text-black text-center font-weight-bold h2">Авторизация{{-- __('Login') --}}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    {{--                                    <input id="email" type="text" class="form-control" name="email"--}}
                                    {{--                                           value="{{ old('email') }}" required autofocus>--}}

                                    @error('email')


                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="password" type="password"
                                           class="form-control bg-light text-dark mb-2 pl-4 @error('password') is-invalid @enderror"
                                           name="password"
                                           required autocomplete="current-password"
                                           placeholder="Пароль">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{--                            <div class="form-group row">--}}
                            {{--                                <div class="col-md-6 offset-md-4">--}}
                            {{--                                    <div class="form-check">--}}
                            {{--                                        <input class="form-check-input" type="checkbox" name="remember"--}}
                            {{--                                               id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

                            {{--                                        <label class="form-check-label" for="remember">--}}
                            {{--                                            {{ __('Remember Me') }}--}}
                            {{--                                        </label>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}

                            <div class="form-group row mb-0">
                                <div class="col-md-12 offset-md-0">
                                    <button type="submit" class="btn btn-lg btn-primary btn-block">
                                        Вход{{-- __('Login') --}}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            Восстановление пароля{{-- __('Forgot Your Password?') --}}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>


                        {{--                        <hr>--}}
                        {{--                        <hr>--}}
                        {{--                        <hr>--}}
                        {{--                        <hr>--}}


                        {{--                        @csrf--}}
                        {{--                        <form method="POST" action="/sms/send">--}}

                        {{--                            <div class="form-group row">--}}
                        {{--                                <div class="col-md-12">--}}
                        {{--                                    <input id="phone" type="text"--}}
                        {{--                                           class="form-control @error('email') is-invalid @enderror" name="phone"--}}
                        {{--                                           required autocomplete="phone" autofocus>--}}

                        {{--                                    --}}{{--                                    <input id="email" type="text" class="form-control" name="email"--}}
                        {{--                                    --}}{{--                                           value="{{ old('email') }}" required autofocus>--}}

                        {{--                                    @error('email')--}}


                        {{--                                    <span class="invalid-feedback" role="alert">--}}
                        {{--                                        <strong>{{ $message }}</strong>--}}
                        {{--                                    </span>--}}
                        {{--                                    @enderror--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}


                        {{--                            <div class="form-group row mb-0">--}}
                        {{--                                <div class="col-md-12 offset-md-0">--}}
                        {{--                                    <button type="submit" class="btn btn-lg btn-primary btn-block">--}}
                        {{--                                        Отправка смс--}}{{-- __('Login') --}}
                        {{--                                    </button>--}}

                        {{--                                </div>--}}
                        {{--                            </div>--}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
