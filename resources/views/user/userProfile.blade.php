@extends('user.master')
@section('usercontent')

<div class="container">
    <div class="panel-heading resume-heading">
        <div class="row justify-content-end">
            <div class="col-lg-12">
                <div class="col-xs-10 col-sm-4 float-left">
                    <figure>
                        <img class="img-circle img-responsive" alt="" src="{{asset('/images/user.png')}}">
                    </figure>
                </div>
                <div class="float-right">
                    <a href="{{url('user/'.$user['id'].'/profile/edit')}}" type="text" class="btn btn-primary">Edit</a>
                </div>
            </div>



            <div class="col-lg-12">
                <ul class="list-group">
                    <li class="list-group-item"><i class="fas fa-id-card-alt"></i> User ID: #{{$user['id']}}</li>
                    <li class="list-group-item bg-secondary text-white">Personal Details</li>
                    <li class="list-group-item">First Name: {{$user['first_name']}}</li>
                    <li class="list-group-item">Last Name: {{$user['last_name']}}</li>
                    <li class="list-group-item bg-secondary text-white">Contacts</li>
                    <li class="list-group-item"><i class="fas fa-envelope"></i> Email: {{$user['email']}}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
