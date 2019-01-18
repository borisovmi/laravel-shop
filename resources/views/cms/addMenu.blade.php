@extends('cms.master')
@section('content')



<div class="container">
    <div class="container">
        <div class="row">
            <a href="{{url('cms/menu/')}}" class="btn btn-primary">Back to Menus</a>
        </div>
        <br>
        <div class="row">
            <h1 class="display-5">Add a new menu</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <form method="POST" action="{{url('cms/menu')}}">
                <div class="form-group">
                    <!--@csrf-->
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <label for="title">Menu title</label>
                    <input type="text" class="form-control text-origin" name="title" placeholder="{{old('title')}}">
                </div>
                <div class="form-group">
                    <label for="url">URL</label>
                    <input type="text" class="form-control text-target" name="url">
                </div>
                <button type="submit" class="btn btn-primary" name="submit" placeholder="{{old('title')}}">Save</button>
            </form>
        </div> 
    </div>
</div>
@endsection
