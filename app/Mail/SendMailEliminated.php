<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Post;

class SendMailEliminated extends Mailable
{
    use Queueable, SerializesModels;

    protected $eliminated = null;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Post $post)
    {
      $this->eliminated = $post;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      $eliminated = $this->eliminated;

      return $this->view('admin.posts.email.eliminated', compact('eliminated'));
    }
}
