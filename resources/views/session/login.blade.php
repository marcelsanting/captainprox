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
            <h4 class="fw-300 c-grey-900 mB-40">Login</h4>
            @if($errors)
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">{{ $error }}</div>
                @endforeach
            @endif
            <form action="{{route('sessions.store')}}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="text-normal text-dark">Username</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="John Doe">
                    @if ($errors->has('name'))
                        <div class="alert alert-danger" role="alert">{{ $errors->first('name') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label class="text-normal text-dark">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                    @if ($errors->has('name'))
                        <div class="alert alert-danger" role="alert">{{ $errors->first('password') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <div class="peers ai-c jc-sb fxw-nw">
                        <div class="peer">
                            <div class="checkbox checkbox-circle checkbox-info peers ai-c">
                                <input type="checkbox" id="inputCall1" name="inputCheckboxesCall" class="peer">
                                <label for="inputCall1" class=" peers peer-greed js-sb ai-c">
                                    <span class="peer peer-greed">Remember Me</span>
                                </label>
                            </div>
                        </div>
                        <div class="peer">
                            <button class="btn btn-primary">Login</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
        @endsection
