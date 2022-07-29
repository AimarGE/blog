<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;

class CategoriesController extends Controller
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
        return view('categories.index')
            ->with('categories', Category::orderBy('name')->get());  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    public function createPostCategory(){
        return view('categories.createPostCategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048',
        ]);

        $newImageName = uniqid() . '-' . $request->name . '.' . 
        $request->image->extension();

        $request->image->move(public_path('images'), $newImageName);

        Category::create([
            'name' => $request->input('name'),
            'slug' => SlugService::createSlug(Category::class, 'slug', $request->name),
            'image_path' => $newImageName,
            'user_id' => auth()->user()->id
        ]);

        return redirect('/categories')
            ->with('message', 'Categoría creada');
    }

    /**
     * Display the specified resource.
     *
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */

    public function show($slug)
    {
        $category = Category::where('slug', $slug)->first();
        return view('categories.show', compact('category'))
            ->with('posts', Post::where('category_id', $category->id)->get());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return view('categories.edit')
            ->with('category', Category::where('slug', $slug)->first());
    }

    public function adminEdit($slug)
    {
        return view('categories.edit')
            ->with('category', Category::Where('slug', $slug)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug){
        $request->validate([
            'name' => 'required'
        ]); 
        Category::where('slug', $slug)
            ->update([
                'name' => $request->input('name'),
                'slug' => SlugService::createSlug(Category::class, 'slug', $request->name),
            ]);

        return redirect('/categories')
            ->with('message', 'Categoría editada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $posts = Post::where('category_id', $category->id);
        $posts -> delete();       
        $category -> delete();
        
        return redirect('/categories')
            ->with('message', 'Categoría y sus posts eliminados');
    }
}
