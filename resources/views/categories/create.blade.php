@extends('layouts.app')

@section('content')

<div class="w-4/5 m-auto text-center">
    <div class="py-15 border-b border-gray-200">
        <h1 class="text-6xl">
            Crear categoría
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
        action="/categories"
        method="POST"
        enctype="multipart/form-data">
        @csrf

        <input 
            type="text"
            name="name"
            placeholder="Nombre..."
            class="bg-transparent block border-b-2 w-full text-6xl outline-none">

        <div class="bg-grey-lighter pt-15">
            <label class="w-60 flex flex-col items-center px-2 py-3 bg-white-rounded-lg 
            shadow-xl tracking-wide uppercase border border-blue cursor-pointer">
                <span class="mt-2 text-base leading-normal">
                    Selecciona un fichero
                </span>
                <input
                    type="file"
                    name="image"
                    class="hidden">
            </label>
        </div>

        <button 
            type="submit"
            class="uppercase mt-15 bg-green-600 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
            Crear categoría
        </button>
    </form>

</div>
@endsection