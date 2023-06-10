@extends('layouts.app')

@section('content')

<a href="{{ route('enlace.create') }}" class="btn btn-primary">+ Create Post</a>

@foreach($enlace as $enlaces)
{{$enlaces->user}}
<article class="entry">
    
                                <figure class="entry-media">
                                    <a href="{{ route('enlace.show', $enlaces->id) }}">
                                        <img src="{{asset('/storage/images/'.$enlaces->imagen)}}" alt="image desc" width="100%" height="450px">
                                    </a>
                                </figure><!-- End .entry-media -->

                                <div class="entry-body">
                                    <div class="entry-meta">
                                        <span class="entry-author">
                                            @if($enlaces->iduser === 1)
                                                adminUser 
                                            @elseif($enlaces->iduser === 2)
                                                user
                                            @else
                                                advanced
                                            @endif
                                        </span>
                                        <span class="meta-separator">|</span>
                                        <a >{{$enlaces->created_at->format('j F Y')}}</a>
                                        <span class="meta-separator">|</span>
                                        {{$enlaces->visitas}} visitas
                                        <span class="meta-separator">|</span>
                                        
                                        @forelse ($enlaces->tags as $tag)
                                         <span class="badge badge-info"><a href="{{ route('showByTag', ['tag' => $tag->slug]) }}" class="link-unstyled" style="color:white">{{ $tag->name }}</a></span>
                        @empty
                            <em>Sin etiquetas</em>
                        @endforelse
                                    </div><!-- End .entry-meta -->
                                    @auth
                                    @if($enlaces->iduser == auth()->user()->id)
                                    <a href="{{ route('enlace.edit',$enlaces->id) }}" class="btn btn-primary btn-sm me-2">Edit</a>
                                    @endif
                                    @endauth
                                    <h2 class="entry-title">
                                        <a href="{{$enlaces->enlace}}">{{$enlaces->titulo}}</a>
                                    </h2><!-- End .entry-title -->
                                    <!--Preguntar para que quede bien ->
                                    <div class="entry-cats">
                                        in 
                                    </div><!-- End .entry-cats -->
                                    <div class="entry-content">
                                        <p>{{Str::limit($enlaces->descripcion, 30, '...')}}</p>
                                        <a href="{{ route('enlace.show', $enlaces->id) }}" class="link-unstyled">Seguir leyendo</a>
                                    </div><!-- End .entry-content -->
                                </div><!-- End .entry-body -->
                            </article><!-- End .entry -->
@endforeach
@if(method_exists($enlace,'links'))
    <div class="d-flex justify-content-center">
        {!! $enlace->links() !!}
    </div>
    @endif
@endsection