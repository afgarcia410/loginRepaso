@extends('layouts.app')

@section('content')
<h1>Post con tag: {{$tag}}</h1>
@foreach ($enlaces as $enlace)
<figure class="entry-media">
                                    <a href="{{ route('enlace.show', $enlace->id) }}">
                                        <img src="{{asset('/storage/images/'.$enlace->imagen)}}" alt="image desc" width="100%" height="450px">
                                    </a>
                                </figure>
    <h3>{{ $enlace->titulo }}</h3>
    <p>{{ $enlace->descripcion }}</p>
    <a href="{{ route('enlace.show', $enlace->id) }}" class="link-unstyled">Seguir leyendo</a>
@endforeach
@endsection