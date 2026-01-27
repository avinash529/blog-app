@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Blog</h3>
    

    <form method="POST" action="{{ route('blogs.update', $blog->id) }}">
        @csrf
        @method('PUT')

        @csrf
        <div class="mb-3">
            <label>Title</label>
            <input name="title" value="{{ $blog->title }}" class="form-control">
        </div>
        <div class="mb-3">
            <label>Content</label>
            <textarea name="content" class="form-control" rows="6">{{ $blog->content }}</textarea>

        </div>
        <button class="btn btn-success">Save</button>
        <a href="{{ route('blogs.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection