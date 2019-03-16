@extends('layouts.app')

@section('content')
    <table id="cart" class="table table-hover table-condensed">
        <thead>
        <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($cart as $id=>$product)

            <tr>

                <td data-th="Product">
                    <div class="row">
                        <div class="col-sm-3 hidden-xs"><img src="{{asset('images/'.$product['photo'])}}" alt="..." class="img-responsive"/></div>
                        <div class="col-sm-9">
                            <h4 class="nomargin">{{$product['name']}}</h4>
                        </div>
                    </div>
                </td>
                <td data-th="Price">{{$product['price']}}</td>
                <td data-th="Quantity">{{$product['quantity']}}</td>
                <td data-th="Subtotal" class="text-center">{{$product['quantity'] * $product['price']}}</td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <td><a href="{{ url('/products') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue
                    Shopping</a></td>
            <td colspan="2" class="hidden-xs"></td>
            <td class="hidden-xs text-center"><strong>Total {{$total}}</strong></td>
        </tr>
        </tfoot>
    </table>

@endsection
