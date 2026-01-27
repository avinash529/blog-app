@extends('layouts.app')

@section('content')
<div class="container">
    <h3>{{ $blog->title }}</h3>
    <div class="mt-3">
        {!! nl2br(e($blog->content)) !!}
    </div>

    <a href="{{ route('blogs.user.index') }}" class="btn btn-secondary mt-3">Back</a>
</div>
@endsection
