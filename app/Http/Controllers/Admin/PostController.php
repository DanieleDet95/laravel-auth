<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\SendNewMail;
use App\Mail\SendMailEliminated;
use Illuminate\Support\Facades\Mail;
use App\Post;
use App\User;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $posts = Post::all();
      $user =  Auth::user();

      return view('admin.posts.index', compact('posts','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'title' => 'required',
        'content' => 'required',
        'image' => 'required',
      ]);

      $data = $request->all();
      $user =  Auth::user();
      $newpost = new Post();
      $newpost->user_id = Auth::id();
      $newpost->title = $data['title'];
      $newpost->content = $data['content'];
      $path = $request->file('image')->store('images','public');
      $newpost->image = $path;
      $newpost->save();

      Mail::to($newpost->user->email)->send(new SendNewMail($newpost));

      return redirect()->route('admin.posts.show', $newpost);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
      $user =  Auth::user();

      return view('admin.posts.show', compact('post','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
      $user =  Auth::user();

      return view('admin.posts.edit', compact('post','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
      $request->validate([
        'title' => 'required',
        'content' => 'required',
        'image' => 'required',
      ]);

      $data = $request->all();
      $user =  Auth::user();
      $post->user_id = Auth::id();
      $post->title = $data['title'];
      $post->content = $data['content'];
      $path = $request->file('image')->store('images','public');
      $post->image = $path;
      $post->save();

      return redirect()->route('admin.posts.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
      Mail::to($post->user->email)->send(new SendMailEliminated($post));

      $post->delete();

      return redirect()->route('admin.posts.index');
    }
}
