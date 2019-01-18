@extends('cms.master')
@section('content')



<div class="container">
    <div class="container">
        <div class="row">
            <a href="{{url('cms/content/')}}" class="btn btn-primary">Back to Content</a>
        </div>
        <br>
        <div class="row">
            <h1 class="display-5">Update content</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <form method="POST" action="{{url('cms/content/'.$content['id'])}}"  enctype="multipart/form-data">
                <!--@csrf-->
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="op" value="update">
                <div class="form-group">
                    <label for="menu_id">Select menu:</label>
                    <select class="form-control" id="menu_id" name="menu_id">
                        @foreach ($menus as $item)
                        @if($item['id'] == $content['menu_id'])
                        <option value="{{$item['id']}}" selected>{{$item['title']}}</option>
                        @else
                        <option value="{{$item['id']}}">{{$item['title']}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="title">Content title</label>
                    <input type="text" class="form-control text-origin" name="title" value="{{$content['heading']}}">
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <div class="form-group">                    
                        <img src="{{asset('/images/'.$content['image'])}}" width="50px">
                    </div>
                    <input type="file" class="form-control" name="image" value="{{$content['image']}}">
                </div>
                <div class="form-group">
                    <label for="data">Content data</label>
                    <textarea class="form-control" name="data" rows="8">{{$content['data']}}</textarea>
                </div>

                <div class="form-group">
                    <label for="bookmark">Content bookmark</label>
                    <input type="text" class="form-control text-target" name="bookmark" value="{{$content['bookmark']}}">
                </div>

                <button type="submit" class="btn btn-primary" name="submit">Save</button>
            </form>
        </div> 
    </div>
</div>
@endsection
