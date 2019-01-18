@extends('cms.master')
@section('content')



<div class="container">
    <div class="container">
        <div class="row">
            <a href="{{url('cms/menu/')}}" class="btn btn-primary">Back to Menus</a>
        </div>
        <br>
        <div class="row">
            <h1 class="display-5">Update menu</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <form method="POST" action="{{url('cms/menu/'.$menu_data['id'])}}">
                <!--@csrf-->
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="_method" value="PUT">                
                <div class="form-group">
                    <label for="title">Menu title</label>
                    <input type="text" class="form-control text-origin" name="title" value="{{$menu_data['title']}}">
                </div>
                <div class="form-group">
                    <label for="url">URL</label>
                    <input type="text" class="form-control text-target" name="url" value="{{$menu_data['url']}}">
                </div>
                <div class="form-group">
                    <label for="show_item">Show item</label>
                    @if($menu_data['show_item'] == 1)
                    <input type="checkbox" name="show_item" style="transform: scale(2);" class="ml-2" checked>
                    @else
                    <input type="checkbox" name="show_item" style="transform: scale(2);" class="ml-2">
                    @endif
                </div>
                <button type="submit" class="btn btn-primary" name="submit" >Update</button>
            </form>
        </div> 
    </div>
</div>
@endsection
