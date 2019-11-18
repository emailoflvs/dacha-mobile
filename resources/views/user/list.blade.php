@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="">
                    <div class="text-black text-center font-weight-bold h2">Список
                        пользователей{{-- __('Users list:') --}}</div>


                    <div class="links">

                        <!-- Current Users -->
                        @if (count($users) > 0)
                            <div class="panel panel-default">

                                <div class="panel-body">
                                    <table class="table table-striped task-table">
                                        <tbody>
                                        @foreach ($users as $user)

                                            <tr>
                                                <td>
                                                    <div>
                                                        {{--                                <form action="{{ url('user/update/'.$user->id) }}" name="form_{{ $user->id  }}" method="POST">--}}
                                                        <form class="form-inline"
                                                              action="{{ url('user/update/'.$user->id) }}"
                                                              name="form_{{ $user->id  }}" method="POST">

                                                            {{ $user->id }}&nbsp;
                                                            <input class="form-control bg-light text-dark"
                                                                   style="height:50px" type="text" name="name"
                                                                   value="{{ $user->name }}">
                                                            <input class="form-control bg-light text-dark"
                                                                   style="height:50px" type="text" name="email"
                                                                   value="{{ $user->email }}">
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                                                            <!-- User Update Button -->


                                                            {{ csrf_field() }}
                                                            {{ method_field('POST') }}

                                                            {{--                                                            <button type="submit" class="btn btn-success btn-lg " onclick="this.parentNode.submit();">--}}
                                                            {{--                                                                <i class="fa fa-btn fa-trash"></i>Изменить--}}
                                                            <i class="fa fa-btn fa-trash"></i>
                                                            <input type="button" class="btn btn-success btn-lg "
                                                                   value="Изменить" onclick="this.parentNode.submit();">

                                                        </form>
                                                    </div>
                                                </td>


                                                <!-- User Delete Button -->
                                                <td>
                                                    <form action="{{ url('user/delete/'.$user->id) }}" method="POST">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}

                                                        <button type="submit" class="btn btn-danger btn-lg ">
                                                            <i class="fa fa-btn fa-trash"></i>Удалить
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        @endif
                    </div>

                </div>
            </div>
        </div>
        {{--        <div class="row justify-content-center">--}}
        {{--            <form class="col col-md-3 d-inline text-center px-2" method="get" action="{{ url('export/users/csv') }}">--}}
        {{--                <input type="submit" class="btn btn-lg btn-primary m-1" value="Скачать CSV-файл"/>--}}
        {{--            </form>--}}
        {{--            <form class="col col-md-3 d-inline text-center px-2" method="get" action="{{ url('export/users/xls') }}">--}}
        {{--                <input type="submit" class="btn btn-lg btn-primary m-1"--}}
        {{--                       value="Скачать файл Excel"/>--}}
        {{--            </form>--}}
        {{--        </div>--}}
    </div>



@endsection
