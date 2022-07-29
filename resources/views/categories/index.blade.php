@extends('layouts.app')

@section('content')

<div class="w-4/5 m-auto text-center">
    <div class="py-15 border-b border-gray-200">
        <h1 class="text-6xl">
            Categorías
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
        <a href="/categories/create" class="px-5 bg-green-800 uppercase bg-transparent
         text-gray-100 text-xs font-extrabold py-3 rounded-3xl">Nueva categoría</a>
    </div>

@endif

<div class="sm:grid grid-cols-2 gap-10 pt-15 px-10">

@foreach($categories as $category)

    <div class="sm:grid grid-cols-2 gap-5">
        <div>
            <img class="object-fill h-60 w-96" src="{{asset('images/' . $category->image_path) }}">
        </div>
        <div>
            <h2 class="text-green-800 font-bold text-2xl pb-4 hover:underline">
                <a href="/categories/{{$category->slug}}">{{$category->name}}</a>
            </h2>
            <span class="text-gray-500">
                Por <span class="font-bold italic text-gray-800">{{$category->user->name}}</span>
            </span>Creada el {{date('jS M Y', strtotime($category->updated_at))}}
            <div class="pt-8">
                <a class="uppercase bg-green-800 text-gray-100 text-lg 
                font-extrabold py-4 px-8 rounded-3xl" href="/categories/{{$category->slug}}">Posts</a>
            </div>  

            @if(isset(Auth::user()->id) && Auth::user()->id == $category->user_id || Auth::check() && auth()->user()->can('admin-home'))
            <span class="float-right pt-10">
                <a 
                    href="/categories/{{ $category -> slug }}/edit"
                    class="text-gray-700 italic hover:text-gray-900 border-b-2">
                    Editar
                </a>
            </span>

            <span class="float-right pt-10 pr-3">
                <form
                    action="/admin/categories/{{$category->slug}}"
                    method="POST">
                    @csrf
                    @method('delete')

                    <button
                        class="text-red-500"
                        type="submit">
                        Borrar
                    </button>
                </form>
        @endif

        </div>
    </div>
@endforeach

@endsection