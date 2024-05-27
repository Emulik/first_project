@extends('layouts.main')
@section('content')
<form action = "{{route('post.update', $post->id)}}" method ="post">
    <!-- html-ում չունենք այդպիսի արժեք գրելու համար -->
    @csrf
    @method('patch')
    <!-- name ատտրիբուտի արժեքը պետք է տանք այնպես ինչպես db -ի դաշտերն են -->
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input name = "title" type="text" class="form-control" id="title" placeholder = "title" value="{{$post->title}}">
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Content</label>
        <textarea name="post_content" class="form-control" id="content" placeholder = "Content" >{{$post->post_content}}</textarea>
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input name = "image" type="text" class="form-control" id="image" placeholder = "Image" value="{{$post->image}}">
    </div>
    <div class="form-group">
        <label for="category">Category</label>
        <select class="form-select form-select-lg mb-3" name="category_id" aria-label=".form-select-lg example" id="category">

        <!-- Այստեղ պետք է ավելացնենք բոլոր կատեգորիաները -->
        @foreach($categories as $category)
            <option {{$category->id === $post->category->id ? ' selected' : ""}}
            value="{{$category->id}} ">{{$category->title}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="tags">Tags</label>
        <select multiple  class="form-select form-select-lg mb-3" name="tags[]" aria-label=".form-select-lg example" id="tags">

        <!-- Այստեղ պետք է ավելացնենք բոլոր կատեգորիաները -->
        @foreach($tags as $tag)
            <option
            @foreach($post->tags as $postTag)
            {{$tag->id === $postTag->id ? ' selectd' : ""}}
            @endforeach
            {{$tag->id === $post->category->id ? ' selected' : ""}}
             value="{{$tag->id}} ">{{$tag->title}}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
</form>
@endsection