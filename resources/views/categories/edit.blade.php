@extends('layouts.app')

@section('content')

<div class="w-4/5 m-auto text-center">
    <div class="py-15 border-b border-gray-200">
        <h1 class="text-6xl">
            Editar categoría
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
        action="/categories/{{$category->slug}} "
        method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input 
            type="text"
            name="name"
            value="{{ $category->name }}"
            class="bg-transparent block border-b-2 w-full text-6xl outline-none">
            
        <button 
            type="submit"
            class="uppercase mt-15 bg-green-600 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
            Publicar cambios
        </button>
    </form>

</div>
@endsection