@extends('cms.master')
@section('content')



<div class="container">
    <div class="container">
        <div class="row">
            <a href="{{url('cms/message/')}}" class="btn btn-primary">Back to Messages</a>
        </div>
        <br>
        <div class="row">
            <h1 class="display-5">Add a new message</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <form method="POST" action="{{url('cms/message')}}">
                <div class="form-group">
                    <!--@csrf-->
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <label for="title">input title</label>
                    <input type="text" class="form-control text-origin" name="title" placeholder="input value">
                </div>
                <div class="text-danger">Sorry, you can only answer to users messages. If you need to send any new message, please use user's email.</div>
            </form>
        </div> 
    </div>
</div>
@endsection
