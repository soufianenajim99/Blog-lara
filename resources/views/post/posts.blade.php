@extends('layouts.mylay')
@section('content')
    <main>
        @foreach ($posts as $post)
            
        <article class=" max-w-2xl mx-auto text-center border-b-2 border-gray-400 ">
            <a href="/post/{{$post->id}}"><h1 class=" text-2xl font-bold py-4">{{$post->title}}</h1></a>
            
            <p class=" pb-10">{{$post->body}}</p>
            
        </article>
        
        @endforeach
        
    
    </main>
@endsection