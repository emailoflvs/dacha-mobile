@extends('layouts.app')

@section('content')
    <div id="app">
        <barcodegenerate></barcodegenerate>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
