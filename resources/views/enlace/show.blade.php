@extends('layouts.app')

@section('content')
<div class="page-content">
               
                    <div class="entry-media single-thumb">
                        <img src="{{asset('/storage/images/'.$enlace->imagen) }}" width="1222px" height="562px" alt=""/>
                    </div><!-- End .entry-media -->
                     <div class="container">
                	<div class="row">
                		<div class="col-lg-9">
                            <article class="entry single-entry">
                                <div class="entry-body">
                                    <div class="entry-meta">
                                        <span class="entry-author">
                                            by
                                            @if($enlace->iduser === 1)
                                                adminUser
                                            @elseif($enlace->iduser === 2)
                                                user
                                            @else
                                                advanced
                                            @endif
                                        </span>
                                        <span class="meta-separator">|</span>
                                        <a>{{$enlace->created_at->format('j F Y')}}</a>
                                        <span class="meta-separator">|</span>
                                        <a>{{$enlace->visitas}} visitas</a>
                                        <span class="meta-separator"></span>
                                    </div><!-- End .entry-meta -->
                                    Enlace: <a href="{{$enlace->enlace}}">{{$enlace->enlace}}</a>
                                    <h1 class="entry-title entry-title-big">
                                        {{$enlace->titulo}}
                                    </h1><!-- End .entry-title -->

                                    <div class="entry-cats">
                                    </div><!-- End .entry-cats -->

                                    <div class="entry-content editor-content">
                                        <p>{{$enlace->descripcion}}</p>
                                    </div><!-- End .entry-content -->

                                    <div class="entry-footer row no-gutters flex-column flex-md-row">
                                        <div class="col-md">
                                            <div class="entry-tags">
                                                <span>Tags:</span> 
                                                
				@forelse ($enlace->tags as $tag)
                                         <span class="badge badge-info"><a href="{{ route('showByTag', ['tag' => $tag->slug]) }}" class="link-unstyled" style="color:white">{{ $tag->name }}</a></span>
                        @empty
                            <em>Sin etiquetas</em>
                        @endforelse
                                            </div><!-- End .entry-tags -->
                                        </div><!-- End .col -->
                                        <div class="col-md-auto mt-2 mt-md-0">
                                        </div><!-- End .col-auto -->
                                    </div><!-- End .entry-footer row no-gutters -->
                                    <br>
                                    <div class-"comment-area mt-4">
                                        
                                    

<div class="card card-body">
    


<h6 class-"card-title">Leave a comment: </h6> 

<form action="{{ url('comment') }}" method= "POST">
    @csrf
<input type="hidden" name="post_id" value="{{$enlace->id}}"/>
<textarea name="comment_body" class="form-control" rows="3" required></textarea>
<button type-"submit" class="btn btn-primary mt-3">Submit</button>

</form> 

</div><br>
<h1></h1>
<h1> Comments: </h1>

@if (!empty($comment))
@foreach($comment as $comments)
<div class="card card-body shadow-sm at-3">


<div class="detail-area">

<h6 class="user-name ab-1">
    
   {{$comments->name}}
    

<small class="es-3 text-primary">Created at: {{Carbon\Carbon::parse($comments->comment_created_at)->format('j F Y')}}</small>

</h6>


<p class="user-comment mb1">

{{$comments->comment}}

</p>

</div> 
@auth
@if($enlace->iduser != null)
<div>
   <a href="{{ route('comment.edit',$comments->commentid) }}" class="btn btn-primary btn-sm me-2">Edit</a> 
   
   <form action="{{ route('comment.destroy', $comments->commentid) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Eliminar</button>
    </form>
   
</div>  

@endif
@endauth
</div> 
@endforeach
@else
<p>NO HAY COMENTARIOS</p>
@endif

</div>
                                </div><!-- End .entry-body -->
                            </article><!-- End .entry -->
                		</div><!-- End .col-lg-9 -->
                	</div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->
@endsection