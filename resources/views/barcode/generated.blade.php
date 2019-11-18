@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row mt-4">
            <div class="col-12 col-md text-center ">
                @isset ($batch)
                    <div class="row">
                        <div class="col-6 col-md-12">
                            <form action="{{ url('barcode/delete_list') }}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="batch" value="{{ $batch }}">
                                <button type="submit" class="btn btn-outline-success btn-lg mt-2">
                                    <i class="fa fa-btn fa-trash"></i>Удалить список
                                </button>
                            </form>
                        </div>
                        <div class="col-6 col-md-12">
                            <form action="{{ url('barcode/list') }}" method="GET">
                                {{ csrf_field() }}
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-outline-success btn-lg mt-2">
                                    <i class="fa fa-btn fa-trash"></i>Полный список
                                </button>
                            </form>
                        </div>
                    </div>
                @endisset
            </div>
            <div class="col-12 col-md-5 mt-4 mt-md-0">
                <div class="text-black text-center font-weight-bold h2">Список кодов</div>
                <div class="row">
                    <div class="col label-text pr-0">Выбранный продукт:</div>
                    <div class="col text-black pl-0">{{ $product->product_code }}
                        . {{ $product->product_name }}
                    </div>
                </div>
                <div class="row">
                    <div class="col label-text pr-0">Сгенерировано кодов:</div>
                    <div class="col text-black pl-0">{{ $count }}</div>
                </div>
                @isset ($barcodes)
                    @foreach ($barcodes as $barcode)
                        <div class="input-lg border-bottom text-black">{{ $barcode['barcode'] }} </div>
                        {{--                            <div class="input-lg border-bottom text-black">{{ $barcode->barcode }} </div>--}}
                    @endforeach
                @endisset

                @isset ($error)
                    <div class="col text-black pl-0 mt-3">{{ $error }}</div>
                @endisset
                <br>
            </div>
            <div class="col d-none d-md-block"></div>
        </div>
        @isset ($barcodes)
            <div class="row">
                {{--                    <form class="d-inline mr-2" method="get" action="{{ url('export/barcodes/csv/'.$product->id.'/'. (isset($batch) ? $batch : '')) }}">--}}
                <div class="col-12 col-md-5 mx-auto">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <form class="d-inline" method="get"
                                  action="{{ url('export/barcodes/csv/'.$product->id.'')}}/{{ $count }}">
                                <input type="submit" class="col btn btn-lg btn-primary" value="Скачать CSV-файл"/>
                            </form>
                        </div>
                        <div class="col-12 col-md-6 mt-3 mt-md-0">
                            <form class="d-inline" method="get"
                                  action="{{ url('export/barcodes/xls/'.$product->id.'')}}/{{ $count }}">
                                <input type="submit" class="col btn btn-lg btn-primary" value="Скачать файл Excel"/>
                            </form>
                        </div>
                    </div>
                </div>

                {{--                    <form class="d-inline  ml-2" method="get" action="{{ url('export/barcodes/xls/'.$product->id.'/'. (isset($batch) ? $batch : '')) }}/{{ $count }}">--}}
            </div>
        @endisset
        <div class="row justify-content-center  mt-3">
            <div class="col-auto">
                <form class="d-inline" method="get" action="{{ url('barcode/form') }}">
                    <input type="submit" class="col btn btn-lg btn-primary" value="Назад"/>
                </form>
            </div>
        </div>

    </div>
@endsection
