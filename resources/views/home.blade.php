@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($message = Session::get('success'))

            <div class="alert alert-success alert-block">

                <button type="button" class="close" data-dismiss="alert">×</button>

                <strong>{{ $message }}</strong>

            </div>

        @endif
        @if ($message = Session::get('error'))

            <div class="alert alert-danger alert-block">

                <button type="button" class="close" data-dismiss="alert">×</button>

                <strong>{{ $message }}</strong>

            </div>

        @endif
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Our Products</div>
                </div>
            </div>
            @foreach($products as $product)
                <div class="col-md-3">
                    <div>
                        <img width="50%" height="50%" border="0"
                             src="{{ asset('images/' . $product->photo) }}">
                    </div>
                    <div>
                        {{$product->name}}&nbsp;&nbsp;
                        {{$product->price}}&nbsp;&nbsp; {{$product->unit}}
                    </div>

                    @if(auth('client')->user())
                        <p class="btn-holder"><a href="{{ url('client/add-to-cart/'.$product->id) }}"
                                                 class="btn btn-warning btn-block text-center" style="width: 50%"
                                                 role="button">Add to cart</a></p>
                    @else
                        <p class="btn-holder"><a href="{{ url('client/add-to-cart/'.$product->id) }}"
                                                 class="btn btn-warning btn-block text-center"
                                                 style="pointer-events: none;cursor: default;width: 50%" role="button">Add
                                to cart</a></p>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endsection
