@extends('layouts.app')
@section('content')
<h1>Editar usuario</h1>
<form action="{{ url('home/update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="mb-3">
        <label>Name</label>
        <input class="form-control" name="name" placeholder="{{auth()->user()->name}}" value= "{{auth()->user()->name}}"></input>
        @error('name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input class="form-control" name="email" placeholder="{{auth()->user()->email}}" value= "{{auth()->user()->email}}"></input>
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
            <option value="admin" {{auth()->user()->type == 'admin' ? 'selected':''}}>Admin</option>
            <option value="advanced" {{auth()->user()->type == 'advanced' ? 'selected':''}}>Advanced</option>
            <option value="user" {{auth()->user()->type == 'user' ? 'selected':''}}>User</option>
        </select>
    </div>
    @else
    No eres admin,eres {{auth()->user()->type}}.
    @endif
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Update user</button>
    </div>
</form>
@endsection