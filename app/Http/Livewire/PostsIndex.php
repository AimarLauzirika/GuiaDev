<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\Subject;
use App\Models\User;
use Livewire\Component;

class PostsIndex extends Component
{

    public $subjects, $posts, $users;

    public $filterSearch;
    public $filterSubjectId = '%';
    public $filterUserId = '%';
    
    public function mount()
    {
        $this->subjects = Subject::all();
        $this->users = User::all();
    }
    
    public function render()
    {
        $this->posts = Post::where([
                ['subject_id', 'like', $this->filterSubjectId], 
                ['user_id', 'like', $this->filterUserId],
                ['title', 'like', '%'. $this->filterSearch .'%'],])
            ->orWhere([
                ['subject_id', 'like', $this->filterSubjectId],
                ['user_id', 'like', $this->filterUserId],
                ['description', 'like', '%'. $this->filterSearch .'%']])
            ->get();
        return view('livewire.posts-index');
    }
}
