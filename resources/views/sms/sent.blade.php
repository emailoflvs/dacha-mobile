{{--@extends('layouts.app')--}}

{{ $status }}

<br>
<a href='/sms/form'>Назад</a>
{{--@section('content')--}}
{{--    <div>--}}
{{--        <div class="row mt-5">--}}
{{--            <div class="col-2">--}}
{{--            </div>--}}
{{--            <div class="col-8">--}}
{{--                <div class="row">--}}
{{--                    <div class="col">--}}
{{--                        <button type="button" class="btn btn-outline-success btn-lg align-top ">Удалить список</button>--}}
{{--                        <form action="{{ url('barcode') }}"--}}
{{--                              method="GET">--}}
{{--                            {{ csrf_field() }}--}}
{{--                            <input type="hidden" name="product_id"--}}
{{--                                   value="{{ $product->id }}">--}}
{{--                            <button type="submit" class="btn btn-outline-success btn-lg mt-2">--}}
{{--                                <i class="fa fa-btn fa-trash"></i>Полный список--}}
{{--                            </button>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                    <div class="col-5">--}}
{{--                        <div class="text-black text-center font-weight-bold h2">Список кодов</div>--}}
{{--                        <div class="row">--}}
{{--                            <div class="col label-text pr-0">Выбранный продукт:</div>--}}
{{--                            <div class="col text-black pl-0">{{ $product->product_code }}--}}
{{--                                . {{ $product->product_name }}--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="row">--}}
{{--                            <div class="col label-text pr-0">Сгенерировано кодов:</div>--}}
{{--                            <div class="col text-black pl-0">{{ $count }}</div>--}}
{{--                        </div>--}}
{{--                        @foreach ($barcodes as $barcode)--}}
{{--                            <div class="input-lg border-bottom text-black">{{ $barcode->barcode }} </div>--}}
{{--                        @endforeach--}}
{{--                        <br>--}}
{{--                    </div>--}}
{{--                    <div class="col"></div>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    <div class="col"></div>--}}
{{--                    <form class="d-inline mr-2" method="get" action="{{ url('export/barcodes/csv/'.$product->id) }}">--}}
{{--                        <input type="submit" class="col btn btn-lg btn-primary m-1" value="Скачать CSV-файл"/>--}}
{{--                    </form>--}}
{{--                    <form class="d-inline  ml-2" method="get" action="{{ url('export/barcodes/xls/'.$product->id) }}">--}}
{{--                        <input type="submit" class="col btn btn-lg btn-primary m-1" value="Скачать файл Excel"/>--}}
{{--                    </form>--}}
{{--                    <div class="col"></div>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    <div class="col"></div>--}}
{{--                    <br>--}}
{{--                    <form class="d-inline mt-3" method="get" action="{{ url('barcode/form') }}">--}}
{{--                        <input type="submit" class="col btn btn-lg btn-primary m-1" value="Назад"/>--}}
{{--                    </form>--}}
{{--                    <div class="col"></div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-2">--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}
