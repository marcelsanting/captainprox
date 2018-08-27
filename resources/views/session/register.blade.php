@extends('layouts.master')

@section('page')
    <div class="peers ai-s fxw-nw h-100vh">
        <div class="peer peer-greed h-100 pos-r bgr-n bgpX-c bgpY-c bgsz-cv" style='background-image: url("{{ asset('marketing/background.jpg') }}")'>
            <div class="pos-a@md+ topX">
                <div class="m-a@lg" style='width: 300px;'>
                    <img class="pos-a" style="width:200%;" src="{{ asset('marketing/CaptainProx.png') }}" alt="">
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 peer pX-40 pY-80 h-100 bgc-white scrollable pos-r" style='min-width: 320px;'>
            <h4 class="fw-300 c-grey-900 mB-40">Register</h4>
            <form action="{{ url('/register') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="text-normal text-dark">Username</label>
                    <input type="text" id="name" name="name" class="form-control" Placeholder='John Doe'>
                </div>
                @if ($errors->has('name'))
                    <div class="alert alert-danger" role="alert">{{ $errors->first('name') }}</div>
                @endif
                <div class="form-group">
                    <label class="text-normal text-dark">Email Address</label>
                    <input type="email" id="email" name="email" class="form-control" Placeholder='name@email.com'>
                    @if ($errors->has('email'))
                        <div class="alert alert-danger" role="alert">{{ $errors->first('email') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label class="text-normal text-dark">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                    @if ($errors->has('password'))
                        <div class="alert alert-danger" role="alert">{{ $errors->first('password') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label class="text-normal text-dark">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Password">
                    @if ($errors->has('password_confirmation'))
                        <div class="alert alert-danger" role="alert">{{ $errors->first('password_confirmation') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">Register</button>
                </div>
            </form>
        </div>
    </div>

@endsection
