<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class WelcomeController extends Controller
{
    public function index()
    {
        dd(File::exists('/README.md'));
    }
}
