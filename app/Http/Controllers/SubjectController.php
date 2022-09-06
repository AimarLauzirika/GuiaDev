<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Post;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();

        return view('subjects.index', compact('subjects'));
    }

    public function show(Subject $subject)
    {
        $chapters = Chapter::where('subject_id', $subject->id)->get();

        $postsNoChapter = Post::where('chapter_id', null)->get();

        return view('subjects.show', compact(['subject', 'chapters', 'postsNoChapter']));
    }

    public function edit(Subject $subject)
    {
        return view('subjects.edit', compact('subject'));
    }

    public function destroy(Subject $subject)
    {
        Subject::destroy($subject->id);

        return redirect()->route('subjects.index');
    }
}
