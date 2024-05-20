@extends('layouts.main')
@section('content')
    <div >
        @foreach($posts as $post)
            <div>{{$post->id}}.{{$post->title}}</div>
            <div>{{$post->post_content}}</div>
            <div>{{$post->likes}}</div>
        @endforeach
        
    </div>
@endsection
