{{--@extends('layouts.app')--}}

<br>
<center>
    <form action="/sms/send" method="post">
        Кому:
        <input type="text" value="9202266563" name="to">
        &nbsp;&nbsp;&nbsp;&nbsp;
        Текст:
        <textarea name="msg">
        {{ $msg }}
    </textarea>
        {{--    <input type="text" value="{{ $msg }}" name="msg">--}}

        {{--    <input type="text" value="1" name="test">--}}
        <br><br>
        Это тест:
        <input type="checkbox" value="1" checked>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <button type="submit">Отправить</button>
    </form>
</center>

@section('content')
    {{--    <div id="app">--}}
    {{--        <barcodegenerate></barcodegenerate>--}}
    {{--    </div>--}}
    {{--    <script src="{{ asset('js/app.js') }}"></script>--}}
    <form action="sms/send">
        <input type="text">
    </form>
@endsection
