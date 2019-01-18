@extends('user.master')
@section('usercontent')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 text-center ">
            @if($messages)
            <div class="container">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Message ID</th>
                                    <th>Title</th>
                                    <th>Date</th>
                                    <th>Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($messages as $message)
                                <tr>
                                    <td>{{$message['id']}}</td>                                    
                                    <td>{{$message['title']}}...</td>                                    
                                    <td>{{$message['updated_at']}}</td>
                                    <td><a href="{{url("user/".session('user_id')."/messages/{$message['id']}")}}" type="text" class="btn btn-success">Details</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @else
    <div class="mt-3 p-3 bg-info col-12 col-lg-6 text-white mx-auto font-weight-bold" style="font-size: 1.5em;">No messages</div>
    <img class="d-block img-fluid rounded-circle mx-auto col-12 col-lg-6 mb-4" src="{{url("images/open-envelope.png")}}">
    @endif
    @endsection

