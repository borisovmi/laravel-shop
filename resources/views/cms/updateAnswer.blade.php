@extends('cms.master')
@section('content')



<div class="container">
    <div class="container">
        <div class="row">
            <a href="{{url("cms/message/{$original['id']}/details")}}" class="btn btn-primary">Back to Message</a>
        </div>
        <br>
        <div class="row">
            <h1 class="display-5">Update Answer</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <form method="POST" action="{{url('cms/message/')}}">
                <!--@csrf-->
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="message_id" value="{{$original['id']}}">
                <div class="form-group">
                    <label for="text">Answer text</label>
                    <textarea class="form-control" name="text" rows="8">{{old('text')}}</textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Answer</button>
            </form>
        </div> 
    </div>
</div>
@endsection
