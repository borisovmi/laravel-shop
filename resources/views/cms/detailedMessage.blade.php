@extends('cms.master')
@section('content')



<div class="container">
    <div class="container">
        <div class="row">
            <a href="{{url('cms/message/')}}" class="btn btn-primary">Back to Messages</a>
        </div>
        <br>
        <div class="">
            <h1 class="display-5 mb-3">Conversation ID: #{{$original['id']}}</h1>
        </div>
    </div>
    <div class="col-12 ">
        <div class="border border-secondary rounded p-1 mb-3 text-left bg-info text-white col-10 float-left">
            <div class="">
                <img class="img-circle img-responsive border border-white rounded-circle" src="{{asset('/images/user.png')}}" alt="Avatar" width="50px" height="50px">
                <span class="align-top">{{$user['first_name']}}</span>
                <i class="float-right">updated at: {{$original['updated_at']}}</i>
            </div>
            <div class="mt-3 p-2 text-justify">
                <span>{{$original['first_message']}}</span>
            </div>
        </div>   


        @foreach ($message_data as $message)
        @if ($message['user_id'] == 3)
        <div class="border border-secondary rounded p-1 mb-3 text-right bg-secondary text-white col-10 float-right">
            <div class="text-right">
                <span class="align-top">Admin</span>
                <img class="img-circle img-responsive border border-white rounded-circle" src="{{asset('/images/user.png')}}" alt="Avatar" width="50px" height="50px">
                <i class="float-left">updated at: {{$message['updated_at']}}</i>
            </div>
            <div class="mt-3 p-2 text-justify">
                <span>{{$message['text']}}</span>
            </div>
        </div> 
        @else
        <div class="border border-secondary rounded p-1 mb-3 text-left bg-info text-white col-10 float-left">
            <div class="">
                <img class="img-circle img-responsive border border-white rounded-circle" src="{{asset('/images/user.png')}}" alt="Avatar" width="50px" height="50px">
                <span class="align-top">{{$user['first_name']}}</span>
                <i class="float-right">updated at: {{$message['updated_at']}}</i>
            </div>
            <div class="mt-3 p-2 text-justify">
                <span>{{$message['text']}}</span>
            </div>
        </div> 
        @endif
        @endforeach
    </div>

</div>
<div class="container">
    <div class="">
        <a href="{{url("cms/message/{$original['id']}/edit")}}" class="btn btn-warning">Add an Answer</a>
    </div>
</div>
@endsection
