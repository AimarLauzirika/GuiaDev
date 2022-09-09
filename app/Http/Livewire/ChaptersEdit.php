<?php

namespace App\Http\Livewire;

use App\Models\Chapter;
use App\Models\Subject;
use Livewire\Component;

use function Termwind\render;

class ChaptersEdit extends Component
{

    public $open = false;

    public $subject;
    public $chapters;

    public $newChapter;
    public $editingChapter;
    public $editNewName;
    public $pAddHidden = '';
    public $createHidden = 'hidden';
    public $editHidden = 'hidden';

    protected $listeners = ['dragend'];
    
    public function render()
    {
        // $this->subject = Subject::orderBy('position')->get();
        $this->chapters = Chapter::where('subject_id', $this->subject->id)->orderBy('position')->get();
        return view('livewire.chapters-edit');
    }

    public function showCreateDiv()
    {
        $this->pAddHidden = 'hidden';
        $this->createHidden = '';
    }

    public function store()
    {
        $chapter = new Chapter;
        $chapter->name = $this->newChapter;
        $chapter->subject_id = $this->subject->id;
        // dd(Chapter::where('subject_id', $chapter->subject_id)->orderBy('position', 'desc')->first()->position);
        $lastPosition = Chapter::where('subject_id', $chapter->subject_id)->orderBy('position', 'desc')->first()->position;
        $chapter->position = $lastPosition + 1;
        // dd($chapter);
        $chapter->save();

        $this->pAddHidden = '';
        $this->createHidden = 'hidden';

        $this->emit('render');
    }

    public function editingChapter(Chapter $chapter)
    {
        // dd($chapter);
        $this->editingChapter = $chapter;
        $this->editNewName = $chapter->name;
        $this->pAddHidden = 'hidden';
        $this->editHidden = '';
    }
    
    public function update()
    {
        // dd($this->editingChapter, $this->editNewName);
        $this->editingChapter->name = $this->editNewName;
        // dd($this->editingChapter->name);
        $this->editingChapter->save();

        $this->pAddHidden = '';
        $this->editHidden = 'hidden';

        $this->emit('render');
    }

    public function delete(Chapter $chapter)
    {
        // dd($chapter);
        if ($chapter->hasPosts()) {
            $this->emit('alertErrorChapterHasPosts');
            return;
        }
        $chapter->delete();

        $this->emit('render');
    }

    public function dragend($sortId)
    {
        for ($i=0; $i < count($sortId); $i++) { 
            $chapter = Chapter::find($sortId[$i]);
            // dd($chapter->position);
            $chapter->position = $i+1;
            $chapter->save();
        }

        $this->emit('render');
    }

    public function hiddenReset()
    {
        $this->reset('editHidden');
        $this->reset('createHidden');
        $this->reset('pAddHidden');
    }
}
