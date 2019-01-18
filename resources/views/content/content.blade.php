@extends('master')
@section('content')


<h1 class="text-center mt-5">{{$content[0]->title}}</h1>

@switch($content[0]->url)
@case('blog')
@foreach ($content as $item)
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto">
    <h3 class="display-4 text-info" id="{{$item->bookmark}}">{{$item->heading}}</h3>
</div>
<div class="container">    
    <div class="col-md-12 p-3 text-justify border border-1 border-warning">
        <img src="{{url('images/'.$item->image)}}" class="float-left col-1 rounded-circle">
        {{$item->data}}
    </div>
    <div class="text-right pt-2 font-italic text-muted">Posted: {{$item->created_at}}</div>
</div>
@endforeach
@break

@case('reviews')
@foreach ($content as $item)
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto">
    <h3 class="display-4 text-info" id="{{$item->bookmark}}">{{$item->heading}}</h3>
</div>

<div class="container">
    <img src="{{url('images/'.$item->image)}}" class="col-2 mb-3 rounded-circle">
    <div class="col-md-12 p-3 text-justify border border-1 border-success">        
        {{$item->data}}
    </div>
    <div class="text-right pt-2 font-italic text-muted">Posted: {{$item->created_at}}</div>
</div>
@endforeach
@break

@case('about-us')
@foreach ($content as $item)
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h3 class="display-4 text-dark " id="{{$item->bookmark}}">{{$item->heading}}</h3>
    <img src="{{url('images/'.$item->image)}}" class="col-2 mx-auto rounded-circle">
</div>
<div class="container">
    <div class="col-md-12 p-3 text-justify border border-1 border-info">        
        {{$item->data}}
    </div>
</div>
@endforeach
@break

@default
@foreach ($content as $item)
<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto">
    <h3 class="display-4 text-info">{{$item->heading}}</h3>
</div>
<div class="container">
    <div class="col-md-12 p-3 text-justify border border-1 border-secondary">
        <img src="{{url('images/'.$item->image)}}" class="float-left col-1 rounded-circle">
        {{$item->data}}
    </div>
    <div class="text-right pt-2 font-italic text-muted">Posted: {{$item->created_at}}</div>
</div>
@endforeach
@endswitch


@endsection