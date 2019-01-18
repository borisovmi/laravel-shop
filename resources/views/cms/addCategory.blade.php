@extends('cms.master')
@section('content')

<div class="container">
    <div class="container">
        <div class="row">
            <a href="{{url('cms/category/')}}" class="btn btn-primary">Back to Categories</a>
        </div>
        <br>
        <div class="row">
            <h1 class="display-5">Add a new category</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <form method="POST" action="{{url('cms/category')}}" enctype="multipart/form-data">
                <!--@csrf-->
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="op" value="add">
                <div class="form-group">
                    <label for="title">Category title</label>
                    <input type="text" class="form-control text-origin" name="title" value="{{old('title')}}">
                </div>
                <div class="form-group">
                    <label for="article">Article</label>
                    <textarea class="form-control" name="article" rows="8">{{old('article')}}</textarea>
                </div>
                <div class="form-group">
                    <label for="url">URL</label>
                    <input type="text" class="form-control text-target" name="url" value="{{old('url')}}">
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" name="image">
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Save</button>
            </form>
        </div> 
    </div>
</div>
@endsection
