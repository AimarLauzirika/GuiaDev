<?php

namespace App\Http\Livewire;

use App\Models\Subject;
use Livewire\Component;

class SubjectsIndex extends Component
{

    public $filter = '%';

    protected $listeners = [
        'renderSubjectsIndex' => 'render',
    ];

    public function render()
    {
        $subjects = Subject::where('user_id', 'like', $this->filter)->get();
        
        return view('livewire.subjects-index', compact('subjects'));
    }

    public function delete($subject)
    {
        // dd($subject['id']);

        Subject::destroy($subject['id']);
    }
}
