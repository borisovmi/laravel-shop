@extends('cms.master')
@section('content')



<div class="container">
    <div class="container">
        <div class="row">
            <a href="{{url('cms/order/')}}" class="btn btn-primary">Back to Orders</a>
        </div>
        <br>
        <div class="row">
            <h1 class="display-5">Add a new order</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <form method="POST" action="{{url('cms/order')}}">
                <div class="form-group">
                    <!--@csrf-->
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <label for="title">input title</label>
                    <input type="text" class="form-control text-origin" name="title" placeholder="input value">
                </div>
                <div class="text-danger display4">Sorry, you can't add an order manually. Please talk to the customer</div>
                <button type="submit" class="btn btn-primary" name="submit">Save</button>
            </form>
        </div> 
    </div>
</div>
@endsection
