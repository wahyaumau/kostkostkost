<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
        $this->validate($request, array(            
            'comment' => 'required|min:5, max:5000',
        ));
        $user_id = Auth::guard('web')->user()->id;        
        $comment = new Comment;        
        $comment->comment = $request->comment;
        $comment->approved = false;
        $comment->user_id = $user_id;
        $comment->post()->associate($post->id);
        $comment->save();
        return redirect()->route('blogs.show', $post->slug)->with('success', 'comment berhasil ditambahkan');
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
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $post_id = $comment->post->id;
        $comment->delete();
        return redirect()->route('posts.show', $post_id)->with('success', 'comment berhasil dihapus');
    }

    public function reply(Request $request, Post $post, Comment $comment){        
        $this->validate($request, array(            
            'commentReply' => 'required|min:5, max:5000',
        ));
        $user_id = Auth::guard('web')->user()->id;
        $reply = new Comment;        
        $reply->comment = $request->commentReply;
        $reply->approved = false;
        $comment->user_id = $user_id;
        $reply->post()->associate($post->id);
        $reply->comment()->associate($comment->id);
        $reply->save();        
        return redirect()->route('blogs.show', $post->slug)->with('success', 'comment berhasil ditambahkan');
    }
}
