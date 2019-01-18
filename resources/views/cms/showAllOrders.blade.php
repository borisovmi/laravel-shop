@extends('cms.master')
@section('content')

<div class="container">
    <div class="container">
        <div class="row">
            <a href="{{url('cms/order/create')}}" class="btn btn-primary">Add new order manually</a>
        </div>
    </div><br>
    <div class="row">
        <div class="col-md-12 text-center ">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-sliders-h"></i>
                    Orders</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>User ID</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Details</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tfoot>                                
                                <tr>
                                    <th>Order ID</th>
                                    <th>User ID</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Details</th>
                                    <th>Delete</th>
                                </tr>                                
                            </tfoot>
                            <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td>{{$order['id']}}</td>
                                    <td>{{$order['uid']}}</td>
                                    <td>{{$order['total']}}</td>
                                    <td class="">
                                        <span class="float-right"><a href="{{url("cms/order/{$order['id']}/edit")}}" type="text" class="badge badge-secondary">Update</a></span>
                                        <span class="">{{$order['status']}}</span>                                        
                                    </td>
                                    <td><a href="{{url("cms/user/{$order['uid']}/orders/{$order['id']}")}}" type="text" class="btn btn-success">Details</a></td>
                                    <td><a href="{{url("cms/order/{$order['id']}")}}" type="text" class="btn btn-danger">Delete</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            </div>

        </div>
    </div>
</div>
@endsection
