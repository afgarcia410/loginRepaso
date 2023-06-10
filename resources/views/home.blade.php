@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                <br>
                <p>You have the <strong>{{auth()->user()->type}}</strong> role.</p>
                <form action="{{ url('logout')}}" method="post">
                    @csrf
                    <input class="btn btn-primary" type="submit" value="Logout"/>
                    
                </form>
               <a href="{{ url('home/edit')}}" type="submit" value="Edit User" >Edit</a>
                <br>
                <!--Para verificar usuario --> 
                @if(!Auth::user() -> hasVerifiedEmail())
                    You are not verified,please <a href="{{url('email/verify')}}">verify</a> your email.
                    @endif
                @if(auth()->user()->type == 'admin')
                    <a href="{{ url('home/index')}}" type="submit" value="Show User" >Show users</a>
                @endif
                </div>
                
                
            </div>
        </div>
    </div>
</div>
@endsection
