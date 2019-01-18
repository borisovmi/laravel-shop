@extends('cms.master')
@section('content')



<div class="container">
    <div class="container">
        <div class="row">
            <a href="{{url('cms/order/')}}" class="btn btn-primary">Back to Orders</a>
        </div>
        <br>
        <div class="row">
            <h1 class="display-5">Delete order</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <form method="POST" action="{{url('cms/order/'.$order_id)}}">
                <!--@csrf-->
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="_method" value="DELETE">
                <div class="form-group">
                    <span>Are you sure you want to delete this order?</span>
                </div>
                <button type="submit" class="btn btn-danger" name="submit">Delete</button>
            </form>
        </div> 
    </div>
</div>
@endsection
