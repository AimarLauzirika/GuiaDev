<?php

namespace App\Http\Livewire;

use App\Models\Chapter;
use App\Models\Subject;
use Illuminate\Validation\Rule;
use Livewire\Component;

use function Termwind\render;

class ChaptersEdit extends Component
{

    public $open = false;

    public $function;

    public $subject;
    public $chapters;

    public $name;
    public $editingChapter;
    public $editNewName;
    public $pAddHidden = '';
    public $createHidden = 'hidden';
    public $editHidden = 'hidden';

    protected $listeners = ['dragend'];

    public function rules() {
        return [
            // 'name' => ['required', Rule::unique('chapters')->ignore($this->id),]
            'name' => ['required', 'unique:chapters',]
        ];
    }
    
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
        $this->validate();

        $chapter = new Chapter;
        $chapter->name = $this->name;
        $chapter->subject_id = $this->subject->id;
        $lastChapter = Chapter::where('subject_id', $chapter->subject_id)->orderBy('position', 'desc')->first();
        if (isset($lastChapter)) {
            $chapter->position = $lastChapter->position + 1;
        } else {
            $chapter->position = 1;
        }
        $chapter->save();
        $this->reset('name');

        $this->pAddHidden = '';
        $this->createHidden = 'hidden';

        $this->emit('render');
        $this->emit('sortable');
    }

    public function editingChapter(Chapter $chapter)
    {
        // dd($chapter);
        $this->editingChapter = $chapter;
        $this->name = $chapter->name;
        // $this->editNewName = $chapter->name;
        $this->pAddHidden = 'hidden';
        $this->editHidden = '';

        // dd($this->editingChapter->name);
    }
    
    public function update()
    {
        $this->validate();
        // dd($this->editingChapter, $this->editNewName);
        $this->editingChapter->name = $this->name;
        // dd($this->editingChapter->name);
        $this->editingChapter->save();
        
        $this->pAddHidden = '';
        $this->editHidden = 'hidden';
        
        $this->reset('name');
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
        $this->reset('name');
        $this->reset('editHidden');
        $this->reset('createHidden');
        $this->reset('pAddHidden');
        $this->resetErrorBag();
    }
    
    public function close()
    {
        $this->reset('editHidden');
        $this->reset('createHidden');
        $this->reset('pAddHidden');
        $this->resetErrorBag();
        $this->open = "false";
    }
}
