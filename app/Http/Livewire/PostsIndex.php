<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\Subject;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class PostsIndex extends Component
{
    use WithPagination;
    
    public $subjects, $users;

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
        $posts = Post::where([
                    ['subject_id', 'like', $this->filterSubjectId], 
                    ['user_id', 'like', $this->filterUserId],
                    ['title', 'like', '%'. $this->filterSearch .'%'],
                    ['public', '1'],
                ])
                ->orWhere([
                    ['subject_id', 'like', $this->filterSubjectId],
                    ['user_id', 'like', $this->filterUserId],
                    ['description', 'like', '%'. $this->filterSearch .'%'],
                    ['public', '1'],
                    ])
                ->orderBy('updated_at', 'desc')
                ->paginate(5);
        return view('livewire.posts-index', compact('posts'));
    }
}
