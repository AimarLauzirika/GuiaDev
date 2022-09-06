<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PostForm extends Component
{
    public $post;
    public $formFunction, $action, $method, $btnSubmitContent, $btnCancelParameter;
    public $title, $description, $content = '';
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($post = null)
    {
        // dd($post);
        $this->post = $post;
        
        //* get if form is for edit or for create
        // dd($_SERVER['REQUEST_URI']);
        $array = explode('/', $_SERVER['REQUEST_URI']);
        // dd(end($array));
        $formFunction = end($array);
        $this->formFunction = $formFunction;

        if ($formFunction === "edit") {
            $this->action = 'update';
            $this->method = 'put';
            $this->title = $post->title;
            $this->description = $post->description;
            $this->content = $post->content;
            $this->btnCancelParameter = $post;
            $this->btnSubmitContent = 'Actualizar';
        } elseif ($formFunction === "create") {
            $this->action = 'store';
            $this->method = 'post';
            $this->title = '';
            $this->description = '';
            $this->content = '';
            $this->btnCancelParameter = '';
            $this->btnSubmitContent = 'Crear';
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.post-form');
    }
}
