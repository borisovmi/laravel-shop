@extends('cms.master')
@section('content')


<div class="container">
    <div class="container">
        <div class="row">
            <a href="{{url('cms/user/')}}" class="btn btn-primary">Back to Users</a>
        </div>
        <br>
        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
            <h1 class="display-4">{{$user_name}}'s orders</h1>
        </div>
    </div>
    <div class="col-md-12 text-center ">
        @if($orders)
        <div class="container">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Order Created</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td><a href="{{url('cms/user/'.$order->uid.'/orders/'.$order->id)}}">{{$order->created_at}}</a></td>
                            <td>{{$order->total}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @else
    <span>{{$user_name}} has no orders</span>

    @endif

    @endsection
</div>