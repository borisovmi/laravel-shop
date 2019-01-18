@extends('master')
@section('content')


<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Checkout page</h1>
</div>

<div class="container" id="checkout">
    <div class="row justify-content-center">
        <div class="col-md-12 text-center ">
            @if($items)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#
                        </th>
                        <th scope="col" data-sort="1">Product Name
                            <a href="{{url('shop/checkout/name')}}">
                                <i class="fas fa-sort float-right"></i>
                            </a>
                        </th>
                        <th scope="col" data-sort="2">Quantity
                            <a href="{{url('shop/checkout/quantity')}}">
                                <i class="fas fa-sort float-right"></i>
                            </a>
                        </th>
                        <th scope="col" data-sort="3">Price
                            <a href="{{url('shop/checkout/price')}}">
                                <i class="fas fa-sort float-right"></i>
                            </a>
                        </th>
                        <th scope="col" data-sort="4">Total Price
                            <a href="{{url('shop/checkout/total')}}">
                                <i class="fas fa-sort float-right"></i>
                            </a>
                        </th>   
                        <th scope="col">Delete Product
                        </th>  
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                    <tr class="tableData">
                        <td scope="row">{{$loop->iteration}}</td>
                        <td><span class="cellVal">{{$item['name']}}</span></td>
                        <td>
                            <input contenteditable="false" type="text" value="-" data-id='{{$item['id']}}' size="1" class="text-center btn btn-primary updateCart">
                            <span class="cellVal">{{$item['quantity']}}</span>
                            <input type="text" value="+" data-id='{{$item['id']}}' size="1" class="text-center btn btn-primary updateCart">
                        </td>
                        <td><span class="cellVal">{{$item['price']}}</span></td>
                        <td><span class="cellVal">{{$item['price']*$item['quantity']}}</span></td>
                        <td>
                            <div class="text-center">
                                <a href="{{url('shop/deleteProduct/').'/'.$item['id']}}" class="btn btn-danger">
                                    <i class="far fa-trash-alt"></i> Delete
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td></td>
                        <td>Total</td>
                        <td>{{Cart::getTotalQuantity()}}</td>
                        <td></td>
                        <td>{{Cart::getSubTotal()}}$</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
    <a href="{{url('shop/clearCart')}}" class="btn btn-danger">Clear Cart</a>
    <a href="{{url('shop/saveorder')}}" class="btn btn-primary">Order Now</a>
    @else
    <span>No items in the cart</span>

    @endif
</div>
@endsection
