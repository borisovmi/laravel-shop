@extends('master')
@section('content')

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Here are our products for {{$cat_title}}</h1>
</div>

<div class="container">

    <div class="row">
        <div class="mx-auto"><a href="{{url('shop/')}}" class="btn btn-primary">Back to all categories</a></div>
        @if (!empty($products))
        <div class="mx-auto">{{$products->links()}}</div>
        @endif
    </div>
    <br>
    
    
@if (!empty($products))
    <div class="row justify-content-start">        

        @foreach ($products as $product)
        <div class="col-md-4 text-center ">
            <h4>{{ $product->title }}</h4>
            <img src="{{url('images/'.$product->image)}}" width="100%">
            <p>Price: {{$product->price}}</p>
            @if(Cart::get($product->id))
            <button disabled class="btn btn-primary addToCart">Add to Cart</button>
            @else <button data-id="{{$product->id}}" class="btn btn-primary addToCart">Add to Cart</button>
            @endif
            <a href="{{url('shop/'.$cat_url.'/'.$product->url)}}" class="btn btn-success">Details</a>
            <br><br>
        </div>
        @endforeach
    </div>
        @else
        <div class="row justify-content-center">
           <div class="card mb-3 col-6 col-md-4 col-lg-2 text-center">
               <img class="card-img-top" src="{{url('images/empty.png')}}" alt="Card image cap" >
            <div class="card-body">
                <h5 class="card-title">Sorry,</h5>
                <p class="card-text">No products in this category for now</p>
            </div>
        </div> 
        </div>
        

        @endif

</div>
@endsection
