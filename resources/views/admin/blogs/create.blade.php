@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Create Blog</h3>
    <form method="POST" action="{{ route('blogs.store') }}">
        @csrf
        <div class="mb-3">
            <label>Title</label>
            <input name="title" class="form-control">
        </div>
        <div class="mb-3">
            <label>Content</label>
            <textarea name="content" class="form-control" rows="6"></textarea>
        </div>
        <button class="btn btn-success">Save</button>
        <a href="{{ route('blogs.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
