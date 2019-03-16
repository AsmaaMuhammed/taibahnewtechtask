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
        <tr>
            <td data-th="Product">
                <div class="row">
                    <div class="col-sm-3 hidden-xs"><img src="{{asset($product->name)}}" alt="..." class="img-responsive"/></div>
                    <div class="col-sm-9">
                        <h4 class="nomargin">{{$product->name}}</h4>
                        <p>Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet.</p>
                    </div>
                </div>
            </td>
            <td data-th="Price">{{$product->price}}</td>
        </tr>
        </tbody>
        <tfoot>
        <tr>
            <td><a href="{{ url('/add-to-cart/'.$product->id) }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Add</a></td>
        </tr>
        </tfoot>
    </table>

@endsection
