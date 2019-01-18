@extends('cms.master')
@section('content')


<div class="container">
    <div class="container">
        <div class="row">
            <a href="{{url('cms/message/create')}}" class="btn btn-primary">Add new message</a>
        </div>
    </div><br>
    <div class="row">
        <div class="col-md-12 text-center ">
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-sliders-h"></i>
                    Message</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Message ID</th>
                                    <th>From</th>
                                    <th>Title</th>
                                    <th>Date</th>
                                    <th>Details</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tfoot>                                
                                <tr>
                                    <th>Message ID</th>
                                    <th>From</th>
                                    <th>Title</th>
                                    <th>Date</th>
                                    <th>Details</th>
                                    <th>Delete</th>
                                </tr>                                
                            </tfoot>
                            <tbody>
                                @foreach($messages as $message)
                                <tr>
                                    <td>{{$message['id']}}</td>
                                    @foreach($users as $user)
                                    @if($user['id'] == $message['user_id'])
                                    <td>{{$user['first_name']}} (ID #{{$user['id']}})</td>
                                    @endif
                                    @endforeach
                                    <td>{{$message['title']}}...</td>                                    
                                    <td>{{$message['updated_at']}}</td>                                    
                                    <td><a href="{{url("cms/message/{$message['id']}/details")}}" type="text" class="btn btn-success">Details</a></td>
                                    <td><a href="{{url("cms/message/{$message['id']}")}}" type="text" class="btn btn-danger">Delete</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            </div>

        </div>
    </div>
</div>
@endsection
</div>