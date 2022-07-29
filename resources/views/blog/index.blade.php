@extends('layouts.app')

@section('content')

<div class="w-4/5 m-auto text-center">
    <div class="py-15 border-b border-gray-200">
        <h1 class="text-6xl">
            Blog posts
        </h1>
    </div>
</div>

@if(session()->has('message'))
    <div class="w-4/5 m-auto mt-10 pl-2">
        <p class="w-2/6 mb-4 text-gray-50 bg-green-500 rounded-2xl py-4 text-center">
            {{ session()->get('message')}}
        </p>
    </div>
@endif

@if(Auth::check())

    <div class="pt-15 w-4/5 m-auto">
        <a href="/blog/create" class="px-5 bg-green-800 uppercase bg-transparent
         text-gray-100 text-xs font-extrabold py-3 rounded-3xl">Crear post</a>
    </div>

@endif

@foreach ($posts as $post)
<div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200 max-w-screen-2xl">
    <div>
        <img src="{{asset('images/' . $post->image_path) }}">
    </div>
    <div>
        <h2 class="text-green-800 font-bold text-5xl pb-4 hover:underline">
            <a href="/blog/{{ $post->slug }}">{{$post->title}}</a> 
        </h2>
        <a href="/categories/{{$post->category->slug}}"><span class="font-bold italic
            text-gray-800 hover:underline">{{$post->category->name}}</span></a>
            <br><br>
        <span class="text-gray-500">
            Por <span class="font-bold italic text-gray-800">{{$post->user->name}}</span>
        </span> Creado el {{date('jS M Y', strtotime($post->updated_at))}}
        
        <p class="truncate text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
            {{$post->description}}
        </p>
    
        <a class="uppercase bg-green-800 text-gray-100 text-lg 
        font-extrabold py-4 px-8 rounded-3xl" href="/blog/{{ $post->slug }}">Seguir leyendo</a>

        @if(isset(Auth::user()->id) && Auth::user()->id == $post->user_id || Auth::check() && auth()->user()->can('admin-home'))
            <span class="float-right">
                <a 
                    href="/blog/{{ $post -> slug }}/edit"
                    class="text-gray-700 italic hover:text-gray-900 border-b-2">
                    Editar
                </a>
            </span>

            <span class="float-right">
                <form
                    action="/blog/{{$post->slug}}"
                    method="POST">
                    @csrf
                    @method('delete')

                    <button
                        class="text-red-500 pr-3"
                        type="submit">
                        Borrar
                    </button>
                </form>
        @endif
    </div>
</div>
@endforeach

@endsection