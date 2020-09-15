<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use App\Post;

class SendNewMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $mypost = null;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Post $post)
    {
      $this->mypost = $post;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      $user =  Auth::user();
      $post = $this->mypost;

      return $this->view('admin.posts.email.new', compact('post','user'));
    }
}
