@extends('layouts.mylay')
@section('content')
    <main>
   
        <article class=" max-w-2xl mx-auto  border-b-2 border-gray-400 ">
            <h1 class=" text-2xl font-bold py-4">{{$post->title}}</h1>
            <p class=" pb-10 font-extralight text-sky-800">{{$post->category->name}}</p>
            <p class=" pb-10">{{$post->body}}</p>
            
        </article>
        
    </main>
@endsection