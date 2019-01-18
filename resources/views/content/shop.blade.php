@extends('master')
@section('content')

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Here are our courses</h1>
    <p class="lead">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
</div>

<div class="container ">
    <div class="card-deck mb-3 text-center row">
        @foreach ($categories as $category)
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="card mb-4 shadow-sm ">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">{{$category['title']}}</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">from 99$ <small class="text-muted">/ mo</small></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                        <img src="{{url('images/'.$category['image'])}}" width='100%'>
                    </ul>
                    <a href="{{url('shop/'.$category['url'])}}">
                        <input type="button" class="btn btn-lg btn-block btn-outline-primary" value="See {{$category['title']}} category">
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>


@endsection