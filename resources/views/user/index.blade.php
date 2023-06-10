@extends('layouts.app')

@section('content')
    <div class="row" style="margin-top: 8px;">
    </div>
    <div class="row" style="margin-top: 8px;">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                    <th scope="col">role</th>
                    <th scope="col">delete</th>
                    <th scope="col">edit</th>
                    <th scope="col">show</th>
                </tr>
            </thead>
             <tbody>
                @foreach($users as $user)
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->type}}</td>
                <td>
                    <form action="{{ route('index.destroy',$user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
                <td>
                    <a href="{{ route('index.edit',$user->id) }}">edit</a>
                </td>
                <td>
                    <a href="{{route('index.show',$user->id)}}">show</a>
                </td>
            </tbody>
            @endforeach
        </table>
    </div>
    <div class="row">
        <a href="{{ url('login') }}" class="btn btn-primary">Back</a>
    </div>
@endsection
@section('script')
<script src="{{ url('assets/deleteUser.js') }}"></script>
@endsection