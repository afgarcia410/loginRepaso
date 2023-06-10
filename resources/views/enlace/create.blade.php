@extends('layouts.app')
<style>
            .label {
                display: inline-block;
                padding: 0.25em 0.4em;
                font-size: 75%;
                font-weight: 700;
                line-height: 1;
                text-align: center;
                white-space: nowrap;
                vertical-align: baseline;
                border-radius: 0.25rem;
                transition: color 0.15s ease-in-out,
                    background-color 0.15s ease-in-out,
                    border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            }
            .label-info {
                color: #212529;
                background-color: #6cb2eb;
            }
        </style>

@section('content')
<h1> Crear Post</h1>
<form action="{{ route('enlace.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <input type="hidden" name="iduser" value="{{Auth::user()->id}}"/>
        <label>Titulo</label>
        <input class="form-control" name="titulo" placeholder="" value=""></input>
        @error('titulo')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
        <label>Descripcion</label>
        <textarea class="form-control" name="descripcion" placeholder="" value= "descripcion"></textarea>
        @error('descripcion')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
        <label>Enlace</label>
        <input class="form-control" name="enlace" placeholder="" value=""></input>
        @error('enlace')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
        <label>Imagen</label>
        <input type="file" accept="image/jpeg" class="form-control-file" id="imagen" name="imagen" required>
        @error('imagen')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    
    <div class="mb-3">
        <label>Tags (separar por comas)</label>
        <input class="form-control" data-role="tagsinput" type="text" name="tags" >
			@if ($errors->has('tags'))
                <span class="text-danger">{{ $errors->first('tags') }}</span>
            @endif
    </div>
    
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Create Post</button>
        <a href="{{ url('enlace') }}" class="btn btn-primary">Back</a>
    </div>
   </form>

@endsection