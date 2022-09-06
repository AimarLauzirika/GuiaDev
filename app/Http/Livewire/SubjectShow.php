<?php

namespace App\Http\Livewire;

use App\Models\Chapter;
use App\Models\Post;
use App\Models\Subject;
use Livewire\Component;

class SubjectShow extends Component
{
    public $subject;
    public $chapters;
    public $postsNoChapter;

    protected $listeners = ['render'];

    public function mount($subject)
    {
        $this->subject = Subject::find($subject);
        $this->chapters = Chapter::where('subject_id', $this->subject->id)->orderBy('position')->get();
        $this->postsNoChapter = Post::where('subject_id', $this->subject->id)->where('chapter_id', null)->get();
    }
    
    public function render()
    {
        $this->chapters = Chapter::where('subject_id', $this->subject->id)->orderBy('position')->get();

        return view('livewire.subject-show');
    }
}
