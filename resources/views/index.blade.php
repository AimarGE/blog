@extends('layouts.app')

@section('content')

<div class="background-image grid grid-cols-1 m-auto">
    <div class="flex text-gray-100 pt-10">
        <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block text-center">
            <h1 class="sm:text-white text-5xl uppercase font-bold text-shadow-md pb-14">
                Animales
            </h1>
            <a href="/blog" class="text-center bg-gray-50 text-gray-900 py-2 px-4 font-bold text-xl uppercase">
                Read more
            </a>
        </div>
    </div>
</div>
 
<div class="sm:grid grid-cols-2 gap-20 w-25 py-15 border-b border-gray-300 bg-green-900">
    <div class="pl-20 pt-15 text-center font-bold text-xl text-black">
        <p>En este blog encontrarás todo tipo de información sobre todo tipo de animales. Si tienes amplios conocimientos sobre
            los animales y quieres participar solo tienes que registrarte y empezar a escribir.
        </p>
        <div class="pt-28 text-center font-bold text-3xl">
            <a class="shadow-2xl-black text-black" href="/blog">¡Estás invitado a colaborar!</a>
        </div>
    </div>

    <div class="pl-16">
        <img class="shadow-2xl rounded-full"src="https://cdn.pixabay.com/photo/2017/07/24/19/57/tiger-2535888_960_720.jpg" width="500" alt="">
    </div>
</div>

<div class="text-center py-15">
    <span class="uppercase text-s text-gray-400">
        Blog
    </span>
    <h2 class="pt-5 text-3xl">
        Publicaciones recientes
    </h2>
    <p class="text-gray-500 pt-3 text-lg">Aquí puedes ver los últimos 5 posts publicados</p>
</div>

{{$counter = 0}};

@foreach ($posts as $post)
    @if($counter < 5)
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

                @if(isset(Auth::user()->id) && Auth::user()->id == $post->user_id || isset(Auth::user()->id) && auth()->user()->can('admin-home'))
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
        {{$counter++}}
    @endif
@endforeach

@endsection