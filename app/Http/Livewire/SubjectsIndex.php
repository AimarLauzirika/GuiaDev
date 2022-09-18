<?php

namespace App\Http\Livewire;

use App\Models\Subject;
use Livewire\Component;

class SubjectsIndex extends Component
{

    public $filter = '%';

    protected $listeners = [
        'renderSubjectsIndex' => 'render',
        'delete',
    ];

    public function render()
    {
        $subjects = Subject::where('user_id', 'like', $this->filter)->get();
        
        return view('livewire.subjects-index', compact('subjects'));
    }

    public function delete($subject)
    {
        Subject::destroy($subject['id']);
    }
}
