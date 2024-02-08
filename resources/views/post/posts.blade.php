@extends('layouts.mylay')
@section('content')
    <main>
        <form action="" method="get" class=" flex items-center justify-center w-full h-56">
            <input type="text" name="search" value="{{request('search')}}">
            <button type="submit" class=" p-2 bg-cyan-600 w-28">Search</button>
        </form>
        @foreach ($posts as $post)
            
        <article class=" max-w-2xl mx-auto text-center border-b-2 border-gray-400 ">
            <a href="/post/{{$post->id}}"><h1 class=" text-2xl font-bold pt-4">{{$post->title}}</h1></a>
            <a href="/post/{{$post->id}}"><p class=" text-gray-800 py-4"><span>Written By</span> {{$post->Author->name}}</p></a>
            
            <p class=" pb-10">{{$post->body}}</p>
            
        </article>
        
        @endforeach
        
    
    </main>
@endsection