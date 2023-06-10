@extends('layouts.app')
@section('content')
<h1> Editar Comentario </h1>
<form action="{{ route('comment.update',$comment->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="mb-3">
        <label>Comentario:</label>
        <input class="form-control" name="comment" placeholder="" value="{{$comment->comment}}"></input>
        @error('titulo')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Editar Comentario</button>
        <a href="{{ url('/') }}" class="btn btn-primary">Back</a>
    </div>
   </form>

@endsection