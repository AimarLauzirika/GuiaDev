<?php

namespace App\Http\Livewire;

use App\Models\Chapter;
use App\Models\Post;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PostForm extends Component
{
    public $subjects;
    public $chapters;
    public $post;
    public $subjectOriginal;

    public $formFunction;
    public $btnCancelRedirect;
    public $btnSubmitContent;

    public $subject_id;
    public $chapter_id;
    public $title;
    public $description;
    public $content;
    public $finished = 0;
    public $public = 1;


    protected function rules() {
        return [
            'subject_id' => 'required',
            'title' => 'required|min:3|unique:posts,title,'.$this->post->id ,
        ];
    } 

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->subjects = Subject::all();

        $uri = $_SERVER['REQUEST_URI'];
        $array = explode('/', $uri);
        $this->formFunction = end($array);

        if ($this->formFunction === "create") {
            $this->btnSubmitContent = "Crear";
            $this->btnCancelRedirect = "/posts";
        } elseif ($this->formFunction === "edit") {
            $this->subjectOriginal = $post->subject;
            $this->btnSubmitContent = "Actualizar";
            $this->btnCancelRedirect = "/posts/".$post->id;

            $this->subject_id = $post->subject_id;
            $this->chapter_id = $post->chapter_id;
            $this->title = $post->title;
            $this->description = $post->description;
            $this->content = $post->content;
            $this->finished = $post->finished;
            $this->public = $post->public;
        }

        $this->chapters = Chapter::where('subject_id', $this->subject_id)->get();
        
    }
    
    public function render()
    {
        return view('livewire.post-form');
    }

    public function selectSubject()
    {
        $this->chapters = Chapter::where('subject_id', $this->subject_id)->get();
    }
    
    public function submit()
    {
        $this->validate();
        // dd($this->post);
        $this->post->user_id = Auth::user()->id;

        $this->post->subject_id = $this->subject_id;
        $this->post->chapter_id = $this->chapter_id;
        $this->post->title = $this->title;
        $this->post->description = $this->description;
        $this->post->content = $this->content;
        $this->post->public = $this->public;
        $this->post->finished = $this->finished;

        // dd($this->post);
        $this->post->save();

        redirect($this->btnCancelRedirect);
    }
}
