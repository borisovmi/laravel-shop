@extends('cms.master')
@section('content')



<div class="container">
    <div class="container">
        <div class="row">
            <a href="{{url('cms/order/')}}" class="btn btn-primary">Back to Orders</a>
        </div>
        <br>
        <div class="row">
            <h1 class="display-5">Update order status</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <form method="POST" action="{{url('cms/order/'.$order['id'])}}">
                <!--@csrf-->
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                    <label for="cur_status">Current status</label>
                    <input type="text" class="form-control" name="cur_status" value="{{$order['status']}}" disabled>
                </div>
                <div class="form-group">
                    <label for="status">Change status:</label>
                    <select class="form-control" id="status" name="status">
                        @foreach ($statuses as $status)
                        <option value="{{$status['status']}}">{{$status['status']}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Save</button>
            </form>
        </div> 
    </div>
</div>
@endsection
