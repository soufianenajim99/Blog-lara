@extends('layouts.mylay')
@section('content')
    <main>
   
        <article class=" max-w-2xl mx-auto   h-full">
            <h1 class=" text-2xl font-bold py-4">Categories Available</h1>
            <div class="flex flex-col justify-between">
                @foreach ($categories as $cate)
                <a href="{{ url('category/' . $cate->id) }}">
                    <p class=" text-2xl border-b-2 border-gray-400 py-2">{{$cate->name}}</p>
                </a>
                @endforeach
            </div>
            
        </article>
        
    </main>
@endsection