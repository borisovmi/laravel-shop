@extends('master')
@section('content')

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Contact us</h1>
</div>

<div class="container">

    <div class="row">
        <div class="col-md-8">            
            <form action="{{url('contact-us/sendMessage')}}" method="post">
                <!--@csrf-->
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                @if(Session::has('user_id'))
                <input class="form-control border border-1 border-secondary" name="name" value="{{session('user_name'). ' '.session('user_lastname')}}" /><br />
                <input class="form-control border border-1 border-secondary" name="email" value="{{session('user_email')}}" /><br />
                @else
                <input class="form-control border border-1 border-secondary" name="name" placeholder="Name..." value="{{old('name')}}"/><br />
                <input class="form-control border border-1 border-secondary" name="email" placeholder="E-mail..." value="{{old('email')}}"/><br />
                @endif
                <textarea class="form-control border border-1 border-secondary" name="first_message" placeholder="How can we help you?" rows="8">{{old('first_message')}}</textarea><br />
                <input class="btn btn-primary" type="submit" value="Send" /><br /><br />
            </form>

        </div>
        <div class="col-md-4">
            <b>Customer service:</b> <br />
            Phone: +1 129 209 291<br />
            E-mail: <a href="mailto:support@mysite.com">support@mysite.com</a><br />
            <br /><br />
            <b>Headquarter:</b><br />
            Company Inc, <br />
            Las vegas street 201<br />
            55001 Nevada, USA<br />
            Phone: +1 145 000 101<br />
            <a href="mailto:usa@mysite.com">usa@mysite.com</a><br />
        </div>
    </div>

</div>

@endsection
</div>