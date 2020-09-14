<?php

namespace App\Http\Controllers;
use App\Post;

use Illuminate\Http\Request;
use App\User;

class PostController extends Controller
{
  public function index()
  {
    $posts = Post::all();

    return view('guests.posts.index', compact('posts'));
  }

  public function show(Post $post)
  {
    return view('guests.posts.show', compact('post'));
  }
}
