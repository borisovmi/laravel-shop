@extends('cms.master')
@section('content')

<div class="container">
    <div class="container">
        <div class="row">
            <a href="{{url('cms/product/')}}" class="btn btn-primary">Back to Products</a>
        </div>
        <br>
        <div class="row">
            <h1 class="display-5">Add a new product</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <form method="POST" action="{{url('cms/product')}}" enctype="multipart/form-data">
                <!--@csrf-->
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="op" value="add">
                <div class="form-group">
                    <label for="categorie_id">Select category:</label>
                    <select class="form-control" id="sel1" name="categorie_id">
                        @foreach ($categories as $item)
                        <option value="{{$item['id']}}">{{$item['title']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control text-origin" name="title" value="{{old('title')}}">
                </div>
                <div class="form-group">
                    <label for="article">Article</label>
                    <textarea class="form-control" name="article" rows="8">{{old('article')}}</textarea>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" name="image" value="{{old('image')}}">
                </div>
                <div class="form-group">
                    <label for="url">URL</label>
                    <input type="text" class="form-control text-target" name="url" value="{{old('url')}}">
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" class="form-control" name="price" value="{{old('price')}}">
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Save</button>
            </form>
        </div> 
    </div>
</div>
@endsection
