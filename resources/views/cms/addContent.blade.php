@extends('cms.master')
@section('content')



<div class="container">
    <div class="container">
        <div class="row">
            <a href="{{url('cms/content/')}}" class="btn btn-primary">Back to Content</a>
        </div>
        <br>
        <div class="row">
            <h1 class="display-5">Add a new content</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <form method="POST" action="{{url('cms/content')}}"  enctype="multipart/form-data">
                <!--@csrf-->
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="op" value="add">
                <div class="form-group">
                    <label for="menu_id">Select menu:</label>
                    <select class="form-control" id="menu_id" name="menu_id">
                        @foreach ($menus as $item)
                        <option value="{{$item['id']}}">{{$item['title']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="title">Content title</label>
                    <input type="text" class="form-control text-origin" name="title" value="{{old('title')}}">
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" name="image">
                </div>
                <div class="form-group">
                    <label for="data">Content data</label>
                    <textarea class="form-control" name="data" rows="8">{{old('data')}}</textarea>
                </div>
                <div class="form-group">
                    <label for="bookmark">Content bookmark</label>
                    <input type="text" class="form-control text-target" name="bookmark" value="{{old('bookmark')}}">
                </div>

                <button type="submit" class="btn btn-primary" name="submit" >Save</button>
            </form>
        </div> 
    </div>
</div>
@endsection
