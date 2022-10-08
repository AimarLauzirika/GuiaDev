<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserPostsIndex extends Component
{
    public $subjects;

    public $filterSearch;
    public $filterSubjectId = '%';
    public $filterfinished = '%';
    public $filterPublic = '%';
    

    public function mount()
    {
        $this->subjects = Subject::all();
        // dd($this->posts);
    }
    
    public function render()
    {
        $posts = Post::where('user_id', Auth::user()->id)
                    ->where('title', 'like', '%'.$this->filterSearch.'%')
                    ->where('subject_id', 'like', $this->filterSubjectId)
                    ->where('finished', 'like', $this->filterfinished)
                    ->where('public', 'like', $this->filterPublic)
                    ->orWhere('user_id', Auth::user()->id)
                    ->where('description', 'like', '%'.$this->filterSearch.'%')
                    ->where('subject_id', 'like', $this->filterSubjectId)
                    ->where('finished', 'like', $this->filterfinished)
                    ->where('public', 'like', $this->filterPublic)
                    ->orderBy('updated_at', 'desc')
                    ->paginate(5);
        
        return view('livewire.user-posts-index', compact('posts'));
    }
}
