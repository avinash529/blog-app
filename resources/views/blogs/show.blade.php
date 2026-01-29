@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="bg-white rounded-2xl shadow-sm border border-secondary-200 overflow-hidden">
        <div class="p-8">
            <h3 class="text-3xl font-bold text-secondary-900 mb-6">{{ $blog->title }}</h3>
            
            <div class="prose prose-lg prose-primary max-w-none text-secondary-600">
                {!! nl2br(e($blog->content)) !!}
            </div>

            <div class="mt-8 pt-8 border-t border-secondary-100 flex justify-end">
                <a href="{{ route('blogs.user.index') }}" class="inline-flex items-center px-4 py-2 border border-secondary-300 shadow-sm text-sm font-medium rounded-md text-secondary-700 bg-white hover:bg-secondary-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition">
                    <svg class="mr-2 -ml-1 h-5 w-5 text-secondary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Back to Blogs
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
