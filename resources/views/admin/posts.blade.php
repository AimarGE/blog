@extends('layouts.app')

@section('content')

<div class="w-4/5 m-auto text-center">
    <div class="py-15 border-b border-gray-200">
        <h1 class="text-6xl">
            Admin-Posts
        </h1>
    </div>
</div>

<div class="pt-32">

    <table>
        <th class="pl-24 text-3xl italic">Título</th>
        <th class="pl-24 text-3xl italic">Creador</th>
        <th class="pl-24 text-3xl italic">Fecha de creación</th>
        <th class="pl-24 text-3xl italic">Última modificación</th>
        <th class="pl-24 text-3xl italic">Foto</th>
    @foreach ($posts as $post)
        <tr>
            <td class="pl-24 text-lg text-center pt-10  italic font-bold text-blue-900">
                {{$post->title}}
            </td>

            <td class="pl-24 text-lg text-center pt-10  italic font-bold text-blue-900">
                {{$post->user->name}}
            </td>
            
            <td class="pl-24 text-lg text-center pt-10  italic font-bold text-blue-900">
                {{date('jS M Y', strtotime($post->created_at))}}
            </td>

            <td class="pl-24 text-lg text-center pt-10  italic font-bold text-blue-900">
                {{date('jS M Y', strtotime($post->updated_at))}}
            </td>

            <td class="pl-24 text-lg text-center pt-10">
                <a  target="_blank" class="text-lg italic font-bold text-blue-900" href="{{asset('images/' . $post->image_path) }}">Click aquí</a>
            </td>

            <td class="pl-24 text-lg text-center pt-10  italic font-bold text-black">
                <a href="/blog/{{$post->slug}}" class="rounded-xl px-2 py-1 bg-yellow-400">Ir al post</a>
            </td>

            <td class="pl-24 text-lg text-center pt-10  italic font-bold text-black">
                <a href="/blog/{{$post->slug}}/edit" class="bg-green-600 rounded-xl px-2 py-1">Editar</a>
            </td>

            <td class="pl-24 text-lg text-center pt-10  italic font-bold text-black">  
                <form
                action="/blog/{{$post->slug}}"
                method="POST">
                @csrf
                @method('delete')

                <button
                    class="bg-red-700 rounded-xl px-2 py-1 italic font-bold text-black"
                    type="submit">
                    Eliminar
                </button>
            </form>
            </td>
        </tr>
    @endforeach
    </table>

</div>



<h2 class="text-center pt-32 text-4xl italic font-bold text-gray-800">Volver a...</h2>
<div class="pt-20 pl-36 items-start w-full grid sm:grid-cols-3">

    <a href="/admin" class="text-center bg-transparent border-black text-gray-800 border-2 text-2xl
     border-solid rounded-3xl px-4 py-3 font-bold w-3/4 hover:bg-green-700 hover:text-black">Admin-Home</a>

    <a href="/admin/posts" class="text-center bg-transparent border-black text-gray-800 border-2 text-2xl
     border-solid rounded-3xl px-4 py-3 font-bold w-3/4 hover:bg-green-700 hover:text-black">Categorías</a>

    <a href="/admin/users" class="text-center bg-transparent border-black text-gray-800 border-2 text-2xl
     border-solid rounded-3xl px-4 py-3 font-bold w-3/4 hover:bg-green-700 hover:text-black">Usuarios</a>

</div>


@endsection