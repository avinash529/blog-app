@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Blogs</h3>
    <a class="btn btn-primary mb-3" href="{{ route('blogs.create') }}">Create</a>

    <table class="table table-bordered">
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th width="150">Action</th>
        </tr>
        @foreach($blogs as $blog)
        <tr>
            <td>{{ $blog->title }}</td>
            <td>{{ $blog->author->name }}</td>
            <td>

                <a class="btn btn-warning btn-sm" href="{{ route('blogs.edit', $blog->id) }}">Edit</a>
                <form action="{{ route('blogs.destroy',$blog->id) }}" method="POST" style="display:inline-block;">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Delete?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
