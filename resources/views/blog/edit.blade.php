@extends('layouts.app')

@section('content')

<div class="w-4/5 m-auto text-center">
    <div class="py-15 border-b border-gray-200">
        <h1 class="text-6xl">
            Editar post
        </h1>
    </div>
</div>

@if ($errors->any())
    <div class="w-4/5 m-auto">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="w-1/5 mb-4 text-gray-50 bg-red-700 rounded-2x py-4 px-4">
                    {{$error}}
                </li>
            @endforeach
        </ul> 
    </div>
@endif

<div class="w-4/5 m-auto pt-20">
    <form
        action="/blog/{{ $post->slug }}"
        method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input 
            type="text"
            name="title"
            value="{{ $post->title }}"
            class="bg-transparent block border-b-2 w-full text-6xl outline-none">

        <textarea 
            name="description" 
            class="py-20 bg-transparent block border-b-2 w-full h-60 text-xl outline-none">{{ $post->description }}</textarea>

            <div class="pt-15">
                <select name="category" class="bg-transparent block border-b-2 w-1/4 text-center text-xl outline-none">
                    
                    <option>{{$post->category->name}}</option>
                    @foreach($categories as $category)
                        @if($category->name != $post->category->name)
                            <option>{{$category->name}}</option>
                        @endif
                    @endforeach
                    
                </select>
            </div>

        <button 
            type="submit"
            class="uppercase mt-15 bg-green-600 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
            Publicar cambios
        </button>
    </form>

</div>
@endsection