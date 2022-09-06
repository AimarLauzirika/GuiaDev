<?php

namespace App\Http\Livewire;

use App\Models\Chapter;
use App\Models\Subject;
use Livewire\Component;

class SubjectChaptersForm extends Component
{
    public $subjects;
    public $subject;
    public $post;
    public $chapters;
    public $chapterId;

    public $function;

    public $selectSubjectId;

    // public $disabled = 'disabled';
    protected $listeners = ['selectSubject'];

    public function mount()
    {
        //* Get function
        // dd($_SERVER['REQUEST_URI']);
        $array = explode('/', $_SERVER['REQUEST_URI']);
        $this->function = end($array);

        $this->subjects = Subject::all();

        if ($this->function == 'edit') {
            $this->subject = Subject::find($this->post->subject_id);
            $this->chapters = Chapter::where('subject_id', $this->subject->id)->get();
            $this->chapterId = $this->post->chapter_id;
        }

    }
    
    public function selectSubject()
    {
        $this->chapters = Chapter::where('subject_id', $this->selectSubjectId)->get();
    }
    
    public function render()
    {
        
        return view('livewire.subject-chapters-form');
    }
}
