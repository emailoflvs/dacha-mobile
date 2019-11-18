@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="input-group ">
            <!-- Display Validation Errors -->
            @include('common.errors')
            {{ csrf_field() }}
            <form action="login" method="POST" class="" style="margin: auto">
                <br>
                <p class="text-black text-center font-weight-bold h2">Авторизация</p>
                <br>
                <input type="text" name="login_email" value="" class="form-control bg-light text-dark mb-2 pl-4"
                       style="height:50px" placeholder="Логин">
                <input type="password" name="login_password" value="" class="form-control bg-light text-dark mb-4  pl-4"
                       style="height:50px" placeholder="Пароль">
                {{ csrf_field() }}
                <input type="submit" class="btn btn-lg btn-primary btn-block" value="Войти"/>
                <br><br>
            </form>
        </div>
    </div>
@endsection
