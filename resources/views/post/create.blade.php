@extends('layouts.main')
@section('content')
<form action = "{{route('post.store')}}" method ="post">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input name = "title" type="text" class="form-control" id="title" placeholder = "title">
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Content</label>
        <textarea name="post_content" class="form-control" id="content" placeholder = "Content"></textarea>
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input name = "image" type="text" class="form-control" id="image" placeholder = "Image">
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
</form>
@endsection