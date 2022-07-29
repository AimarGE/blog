@extends('layouts.app')

@section('content')

<div class="w-4/5 m-auto text-center">
    <div class="py-15 border-b border-gray-200">
        <h1 class="text-6xl">
            Admin-Users
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

<div class="pt-32">

    <table>
        <th class="pl-36 text-3xl italic">Nombre</th>
        <th class="pl-36 text-3xl italic">Email</th>
        <th class="pl-36 text-3xl italic">Posts</th>
        <th class="pl-36 text-3xl italic">Categorías</th>
        <th class="pl-36 text-3xl italic">Fecha de registro</th>
    @foreach ($users as $user)
        <?php $counterCat = 0 ?>
        @foreach($categories as $category)
            @if($category->user_id == $user->id)
                <?php $counterCat++ ?>
            @endif
        @endforeach
        <?php $counterPosts = 0 ?>
        @foreach($posts as $post)
            @if($post->user_id == $user->id)
                <?php $counterPosts++ ?>
            @endif
        @endforeach
        
        <tr>
            <td class="pl-36 text-lg text-center pt-10  italic font-bold text-blue-900">
                {{$user->name}}
            </td>

            <td class="pl-36 text-lg text-center pt-10  italic font-bold text-blue-900">
                {{$user->email}}
            </td>

            <td class="pl-36 text-lg text-center pt-10  italic font-bold text-blue-900">
                {{$counterPosts}}
            </td>

            <td class="pl-36 text-lg text-center pt-10  italic font-bold text-blue-900">
                {{$counterCat}}
            </td>
            
            <td class="pl-36 text-lg text-center pt-10  italic font-bold text-blue-900">
                {{date('jS M Y', strtotime($user->created_at))}}
            </td>

            <td class="pl-36 text-lg text-center pt-10  italic font-bold text-black">  
                <form
                action="/users/{{$user->id}}"
                method="POST">
                @csrf
                @method('delete')

                <button
                    class="bg-red-700 rounded-xl px-2 py-1 italic font-bold text-black"
                    type="submit">
                    Banear usuario
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
     border-solid rounded-3xl px-4 py-3 font-bold w-3/4 hover:bg-green-700 hover:text-black">Posts</a>

    <a href="/admin/users" class="text-center bg-transparent border-black text-gray-800 border-2 text-2xl
     border-solid rounded-3xl px-4 py-3 font-bold w-3/4 hover:bg-green-700 hover:text-black">Categorías</a>

</div>

@endsection