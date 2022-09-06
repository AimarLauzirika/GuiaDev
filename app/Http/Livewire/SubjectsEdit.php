<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SubjectsEdit extends Component
{
    public $subject;
    public $name, $color;
    
    public $open = false;

    public function mount($subject)
    {
        $this->name = $subject->name;
        $this->color = $subject->color;
    }
    
    public function render()
    {
        return view('livewire.subjects-edit');
    }

    public function resetModal()
    {
        $this->reset(['open']);

        $this->emit('resetModal');
    }

    public function save()
    {
        // dd($this->subject);
        $subject = $this->subject;
        $subject->name = $this->name;
        $subject->color = $this->color;
        // dd($subject);
        $subject->save();

        $this->emit('renderSubjectsIndex');
        $this->reset(['open']);
    }
}
