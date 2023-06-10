<?php

namespace App\Http\Controllers;

use App\Models\Enlace;
use App\Models\Etiqueta;
use App\Models\Comment;
use App\Models\User;
use Conner\Tagging\Model\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;


class EnlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct(){
    $this->middleware('auth')->only('create','edit');
}
    public function index()
    {
        $enlace = Enlace::orderBy('id','DESC')->paginate(2);
        return view('enlace.index',['enlace' => $enlace]); 
        
        /*
        @if(method_exists($enlace,'links'))
    <div class="d-flex justify-content-center">
        {!! $enlace->links() !!}
    </div>
    @endif
        */
        //Funciona
        /*
        $enlace = Enlace::all();
        return view('enlace.index', compact('enlace'));
       */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('enlace.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    //     $enlace = new Enlace();
    //     //dd($enlace);
    //     $enlace->iduser = Auth::user()->id;
    //     $enlace->titulo = $request->titulo;
    //     $enlace->descripcion = $request->descripcion;
    //     $enlace->enlace = $request->enlace;
    //     $enlace->imagen = $request->imagen;
    //     $enlace->tags=$request->tags;
    //     if ($request->hasFile('imagen')) {
    //     $image = $request->file('imagen');
    //     $imageName = $image->getClientOriginalName();
    //     $imagePath = $image->storeAs('images', $imageName, 'public');
    //     $enlace->imagen = $imageName;
    // }
        
        /*
        $input = $request->all();
    	$tags = explode(",", $request->tags);
    	//dd($request->tags);
    	//$enlace = Enlace::create($input);
    	//dd($input);
    	$enlace->tag($tags);
        //dd($enlace->tag($tags));
        */
        
        //$enlace->imagen = $request->imagen;
        $tags = explode(",", $request->tags);
       
        $enlace = Enlace::create($request->all());
         if ($request->hasFile('imagen')) {
        $image = $request->file('imagen');
        $imageName = $image->getClientOriginalName();
        $imagePath = $image->storeAs('images', $imageName, 'public');
        $enlace->imagen = $imageName;
    }
        $enlace->tag($tags);
        //dd($tags);
        //dd($enlace->tags($tags));
        
        $enlace->save();
        /*
        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'enlace' => 'required',
            'imagen' => 'required'
        ]);
    
        Enlace::create($request->all());
        */
        return redirect()->route('enlace.index')->with('success','Se ha añadido un nuevo post');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Enlace  $enlace
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $enlace = Enlace::find($id);
        $sql= 'SELECT comments.*, users.*,comments.created_at as comment_created_at,comments.id as commentid FROM comments INNER JOIN users ON comments.iduser=users.id where comments.post_id='.$id;
        $comment = DB::select($sql);
        $enlace->visitas +=1;
        $enlace->save();
        //dd($comment);
        
        return view('enlace.show',compact('enlace','comment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Enlace  $enlace
     * @return \Illuminate\Http\Response
     */
    public function edit(Enlace $enlace)
    {
        $tags = $enlace->tagNames();
        //dd($tags);
        return view('enlace.edit',compact('enlace','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Enlace  $enlace
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $enlace)
    {
        
        $enlaces = Enlace::findOrFail($enlace);
        $enlaces->titulo = $request->titulo;
        $enlaces->descripcion = $request->descripcion;
        $enlaces->enlace = $request->enlace;
        if ($request->hasFile('imagen')) {
        $image = $request->file('imagen');
        $imageName = $image->getClientOriginalName();
        $imagePath = $image->storeAs('images', $imageName, 'public');
        $enlaces->imagen = $imageName;
    }
        $tags = explode(",", $request->tags);
        $enlaces->untag();
        $enlaces->tag($tags);
        //dd($tags);
        $enlaces->save();
        return redirect()->route('enlace.index')->with('success','Se ha editado el post.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Enlace  $enlace
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enlace $enlace)
    {
        //
    }
    public function showByTag($tag)
{
    // Buscar los posts por el tag
    $enlaces = Enlace::withAnyTag($tag)->get();
    //dd($enlaces);
    return view('tag', compact('enlaces','tag'));
}

    public function TagPerPost($tagSlug)
    {
      $tagged = Tagged::where('tag_slug', $tagSlug)
 ->with('enlace')
 ->get();
      

 return view('tags')->with(['tagged' => $tagged]);
}
}
