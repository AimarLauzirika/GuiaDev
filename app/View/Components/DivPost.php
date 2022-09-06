<?php

namespace App\View\Components;

use App\Models\Post;
use Illuminate\View\Component;

class DivPost extends Component
{
    public $post;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($post = null)
    {
        // dd($post);
        $this->post = $post;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $post = $this->post;
        return view('components.div-post', compact('post'));
    }
}
