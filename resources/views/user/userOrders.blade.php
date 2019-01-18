@extends('user.master')
@section('usercontent')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 text-center ">
            @if($orders)
            <div class="container">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th class="d-none d-sm-table-cell">Order Status</th>
                                    <th>Total</th>
                                    <th>Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td>{{$order->id}}</td>
                                    <td class="d-none d-sm-table-cell">{{$order->status}}</td>
                                    <td>{{$order->total}}</td>
                                    <td><a href="{{url('user/'.session('user_id')."/orders/".$order->id)}}" class="btn btn-success">Details</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @else
    <span>Go to shop and make your first order!</span>

    @endif
</div>
@endsection
