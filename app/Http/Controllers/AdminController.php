<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Cviebrock\EloquentSluggable\Services\SlugService;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __invoke()
    {
        
    }

    public function index()
    {
        $categories = Category::all();
        $posts = Post::all();
        $users = User::all();

        return view('admin.index')
            ->with('categories', $categories->count())
            ->with('posts', $posts->count())
            ->with('users', $users->count());
    }

    public function posts(){
        $posts = Post::all();
        return view('admin.posts', compact('posts'));
    }

    public function users(){
        $users = User::all();
        $categories = Category::all();
        $posts = Post::all();
        return view('admin.users', compact('users', 'posts', 'categories'));
    }

    public function categories(){
        $categories = Category::all();
        $posts = Post::all();
        return view('admin.categories', compact('categories','posts'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug){
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
  
    }
}
