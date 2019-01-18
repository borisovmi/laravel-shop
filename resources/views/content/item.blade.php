@extends('master')
@section('content')

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">{{$item['title']}}</h1>
</div>

<div class="row justify-content-center">

</div>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 text-center">
            <img src="{{url('images/'.$item['image'])}}" width="200px">
            <p class="mt-3">{{$item['article']}}</p>
            <p>Price: {{$item['price']}}</p>
            <div class="container col-8 col-md-6">
                <div class="row">
                    <a href="{{url('shop/')}}" class="btn btn-primary col mx-1 my-1">Back to all categories</a>
                    @if(Cart::get($item['id']))
                    <button disabled class="btn btn-warning addToCart col mx-1 my-1">Add to Cart</button>
                    @else <button data-id="{{$item['id']}}"  class="btn btn-warning addToCart col mx-1 my-1">Add to Cart</button>
                    @endif
                    <a href="{{url('shop/'.$category['url'])}}" class="btn btn-primary col mx-1 my-1">Back to {{$category['title']}}</a>
                    <br>
                    <a href="{{url('shop/checkout')}}" class="btn btn-success col mx-1 my-1">Checkout</a>
                </div>
                <br><br>
            </div>

        </div>
    </div>
</div>
@endsection
