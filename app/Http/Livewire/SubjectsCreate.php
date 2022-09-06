<?php

namespace App\Http\Livewire;

use App\Models\Subject;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SubjectsCreate extends Component
{
    public $open = false;

    public $name, $color = "#000";

    protected $rules = [
        'name' => 'required|unique:subjects|max:20',
        'color' => 'required|min:4|max:7',
    ];
    
    public function render()
    {
        return view('livewire.subjects-create');
    }

    public function save()
    {
        // dd($this->name, $this->color);
        // dd(Auth::user()->id);

        $this->validate();

        $subject = new Subject();
        $subject->name = $this->name;
        $subject->color = $this->color;
        $subject->user_id = Auth::user()->id;
        $subject->save();

        $this->reset(['open', 'name', 'color']);
        
        $this->emit('renderSubjectsIndex');
    }
}
