@extends('layouts.app')

@section('content')
    <div class="container" xmlns="http://www.w3.org/1999/html">
        <div class="row justify-content-center">
            <div class="col-md-9">
            {{--       <div class="row justify-content-center">--}}
            <!-- Display Validation Errors -->
                @include('common.errors')
                {{ csrf_field() }}
                <p class="text-black text-center font-weight-bold mt-5 h2">Товары{{-- __('Товары:') --}}</p>
                <div class="links">
                    <!-- Current Products -->
                    @if (count($products) > 0)
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <table class="table task-table">
                                    <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>
                                                <div class="row">
                                                    <div class="col-9">
                                                        <form class="form-inline" id="product_{{ $product->id  }}"
                                                              action="{{ url('products/update/'.$product->id) }}"
                                                              name="form_{{ $product->id  }}" method="POST">
                                                            <img style="height: 60px; margin-bottom: 5px"
                                                                 src="{{ $product->product_photo }}">
                                                            <div class="mr-2"><span class="badge">Код</span><br>
                                                                <input type="text" size="5" name="product_code"
                                                                       value="{{ $product->product_code }}"
                                                                       class="form-control">
                                                            </div>
                                                            <div class="mr-2"><span
                                                                    class="badge">Наименование</span><br>
                                                                <input type="text" name="product_name"
                                                                       value="{{ $product->product_name }}"
                                                                       class="form-control">
                                                            </div>
                                                            {{--                                                            <input type="text" size="1" name="product_photo" value="{{ $product->product_photo }}">--}}
                                                            <div class="mr-2"><span class="badge">Рэйтинг</span><br>
                                                                <input type="text" size="1" name="product_rating"
                                                                       value="{{ $product->product_rating }}"
                                                                       class="form-control">
                                                            </div>
                                                            <input type="hidden" name="product_id"
                                                                   value="{{ $product->id }}">
                                                            {{ csrf_field() }}
                                                            {{ method_field('POST') }}

                                                        </form>
                                                    </div>
                                                    <div class="col-3">
                                                        <button type="submit" form="product_{{ $product->id  }}"
                                                                class="btn btn-success m-1">
                                                            <i class="fa fa-btn fa-trash"></i>Обновить
                                                        </button>
                                                        <form action="{{ url('products/delete/'.$product->id) }}"
                                                              method="POST">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}

                                                            <button type="submit" class="btn btn-danger m-1">
                                                                <i class="fa fa-btn fa-trash"></i>Удалить
                                                            </button>
                                                        </form>
                                                        <form action="{{ url('barcode/list') }}"
                                                              method="GET">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="product_id"
                                                                   value="{{ $product->id }}">
                                                            <button type="submit" class="btn btn-outline-success m-1">
                                                                <i class="fa fa-btn fa-trash"></i>Список кодов
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>

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
        {{--        <div class="row justify-content-center">--}}
        {{--            <form class="col col-md-3 px-2 d-inline text-center" method="get" action="{{ url('export/products/csv') }}">--}}
        {{--                <input type="submit" class="btn btn-lg btn-primary m-1" value="Скачать CSV-файл"/>--}}
        {{--            </form>--}}
        {{--            <form class="col col-md-3 px-2 d-inline text-center" method="get" action="{{ url('export/products/xls') }}">--}}
        {{--                <input type="submit" class="btn btn-lg btn-primary m-1" value="Скачать файл Excel"/>--}}
        {{--            </form>--}}
        {{--        </div>--}}
    </div>



@endsection
