@extends('layouts.app')

@section('content')

<div class="w-4/5 m-auto text-center">
    <div class="py-15 border-b border-gray-200">
        <h1 class="text-6xl">
            Admin panel
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

<div class="pt-20 pl-36 items-start w-full grid sm:grid-cols-3">

    <a href="/admin/categories" class="text-center bg-transparent border-black text-gray-800 border-2 text-2xl
     border-solid rounded-3xl px-4 py-3 font-bold w-3/4 hover:bg-green-700 hover:text-black">Categorías</a>

    <a href="/admin/posts" class="text-center bg-transparent border-black text-gray-800 border-2 text-2xl
     border-solid rounded-3xl px-4 py-3 font-bold w-3/4 hover:bg-green-700 hover:text-black">Posts</a>

    <a href="/admin/users" class="text-center bg-transparent border-black text-gray-800 border-2 text-2xl
     border-solid rounded-3xl px-4 py-3 font-bold w-3/4 hover:bg-green-700 hover:text-black">Usuarios</a>

</div>

<div class="pt-20 items-start grid sm:grid-cols-3">

    <div class="pl-80">
        <a href="/admin/categories" class="text-6xl">{{$categories}}</a><span class="font-bold italic text-gray-800">
            @if ($categories == 1)
            Categoría</span>
            @else
            Categorías</span>
            @endif
    </div>

    <div  class="pl-72">
        <a href="/admin/posts" class="text-6xl">{{$posts}}</a><span class="font-bold italic text-gray-800">
            @if ($posts == 1)
            Post</span>
            @else
            Posts</span>
            @endif
    </div>

    <div  class="pl-60">
        <a href="/admin/users" class="text-6xl">{{$users}}</a><span class="font-bold italic text-gray-800">
            @if ($users == 1)
            Usuario</span>
            @else
            Usuarios</span>
            @endif
    </div>

</div>





@endsection