<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Post;
use \App\Models\Category;

class PagesController extends Controller
{
    public function index(){

        $posts = Post::orderBy('updated_at', 'DESC')->get();
        return view ('index', compact('posts'));
    }
}
