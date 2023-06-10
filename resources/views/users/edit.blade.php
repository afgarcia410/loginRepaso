@extends('layouts.app')
@section('content')
<h1>Editar usuariooo</h1>
<form action="{{route('index.update',$index->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="mb-3">
        <label>Name</label>
        <input class="form-control" name="name" placeholder="{{$index->name}}" value= "{{$index->name}}"></input>
        @error('name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input class="form-control" name="email" placeholder="{{$index->email}}" value= "{{$index->email}}"></input>
        @error('email')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="oldPasswordInput" class="form-label">Old Password</label>
        <input name="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" id="oldPasswordInput" placeholder="Old Password">
        @error('old_password')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="newPasswordInput" class="form-label">New Password</label>
        <input name="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" id="newPasswordInput" placeholder="New Password">
        @error('new_password')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="confirmNewPasswordInput" class="form-label">Confirm New Password</label>
        <input name="new_password_confirmation" type="password" class="form-control" id="confirmNewPasswordInput" placeholder="Confirm New Password">
    </div>
    @if(auth()->user()->type == 'admin')
    <div class="mb-3">
        <label>Type</label>
        <select class="form-control" name="type">
            <option value="admin" {{$index->type == 'admin' ? 'selected':''}}>Admin</option>
            <option value="advanced" {{$index->type == 'advanced' ? 'selected':''}}>Advanced</option>
            <option value="user" {{$index->type == 'user' ? 'selected':''}}>User</option>
        </select>
    </div>
    @else
    No eres admin,eres {{auth()->user()->type}}.
    @endif
    <div class="mb-3">
        <button href="{{ url('home/index') }}" type="submit" class="btn btn-primary">Update user</button>
    </div>
    <div class="mb-3">
        <a href="{{ url('home/index') }}" class="btn btn-primary">Back</a>
    </div>
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
</form>
@endsection