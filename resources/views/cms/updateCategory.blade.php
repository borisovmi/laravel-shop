@extends('cms.master')
@section('content')

<div class="container">
    <div class="container">
        <div class="row">
            <a href="{{url('cms/category/')}}" class="btn btn-primary">Back to Categories</a>
        </div>
        <br>
        <div class="row">
            <h1 class="display-5">Update category</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <form method="POST" action="{{url('cms/category/'.$category['id'])}}" enctype="multipart/form-data">
                <!--@csrf-->
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="op" value="update">
                <div class="form-group">
                    <label for="title">Category title</label>
                    <input type="text" class="form-control text-origin" name="title" value="{{$category['title']}}">
                </div>
                <div class="form-group">
                    <label for="article">Article</label>
                    <textarea class="form-control" name="article" rows="8">{{$category['article']}}</textarea>
                </div>
                <div class="form-group">
                    <label for="url">URL</label>
                    <input type="text" class="form-control text-target" name="url"  value="{{$category['url']}}">
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <div class="form-group">                    
                        <img src="{{asset('/images/'.$category['image'])}}" width="50px">
                    </div>
                    <input type="file" class="form-control" name="image">
                </div>

                <button type="submit" class="btn btn-primary" name="submit">Save</button>
            </form>
        </div> 
    </div>
</div>
@endsection
