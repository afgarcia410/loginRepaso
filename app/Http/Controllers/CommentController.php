<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Models\Enlace;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct(){
    $this->middleware('auth')->only('store','edit','destroy');
}
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comment = new Comment;
        $comment->iduser = Auth::user()->id;
        $comment->post_id = $request->post_id;
        $comment->comment = $request->comment_body;
        $comment->save();
        return redirect()->back();
       // dd($comment);
        
        /*
        $input = $request->all();

        $request->validate([
            'comment'=>'required',
        ]);

        $input['iduser'] = auth()->user()->id;

        Comment::create($input);
        return back();
        */
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::find($id);
        //dd($comment);
        return view('comment.edit',compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCommentRequest  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $comment)
    {
        $comments = Comment::findOrFail($comment);
        $comments->comment = $request->comment;
        //dd($comments);
        $comments->save();
        
        return redirect()->route('enlace.index')->with('success','User edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy($comment)
    {
        $comments = Comment::findOrFail($comment);
        //dd($comments);
        $comments->delete();
         return redirect()->route('enlace.index')->with('success','User deleted successfully');
    }
}
