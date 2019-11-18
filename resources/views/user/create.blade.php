@extends('layouts.app')

@section('content')


    <div class="title m-b-md">
        Create user:
    </div>

    <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">

            <div class="panel-body">
                <!-- Display Validation Errors -->
            @include('common.errors')

            <!-- New Task Form -->
                {{--                    <form action="{{ url('task')}}" method="POST" class="form-horizontal">--}}
                <form action="/api/create" method="POST" class="form-horizontal" name="create-form">

                    {{ csrf_field() }}

                    {{--                        "name": "MyName", "email": "name@mail.com", "password": "123123", "password_confirmation": "123123"--}}

                    {{--                        закомментил еще один name внизу--}}
                    Name *:<br>
                    <input type="text" name="name" value="">

                    <br><br>
                    Email *:
                    <br>
                    <input type="email" name="email" value="">
                    <br><br>

                    Password *:<br>
                    <input type="password" name="password" value="">
                    <br>
                    Confirm password *:
                    <br>
                    <input type="password" name="password_confirmation" value="">
                    <br><br>


                    <!-- Add User Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-btn fa-plus"></i>Add User
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <br><br>

    </div>
    </div>
@endsection
