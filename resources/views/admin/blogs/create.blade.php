@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="mb-8">
        <h3 class="text-3xl font-bold text-gray-900">Create New Blog</h3>
        <p class="text-gray-500 mt-1">Share your thoughts with the world</p>
    </div>

    <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
        <form method="POST" action="{{ route('blogs.store') }}">
            @csrf
            
            <div class="p-8 space-y-6">
                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                    <input type="text" name="title" id="title" required autofocus
                        class="block w-full rounded-xl border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-lg font-medium py-3 px-4 placeholder-gray-400"
                        placeholder="Enter an engaging title">
                </div>

                <!-- Content -->
                <div>
                    <label for="content" class="block text-sm font-medium text-gray-700 mb-1">Content</label>
                    <div class="mt-1">
                        <textarea name="content" id="content" rows="12" required
                            class="block w-full rounded-xl border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm px-4 py-3 placeholder-gray-400"
                            placeholder="Write your blog content here..."></textarea>
                    </div>
                    <p class="mt-2 text-sm text-gray-500">Markdown formatting is supported.</p>
                </div>
            </div>

            <!-- Actions -->
            <div class="px-8 py-4 bg-gray-50 border-t border-gray-100 flex items-center justify-end space-x-3">
                <a href="{{ route('blogs.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-xl text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition">
                    Cancel
                </a>
                <button type="submit" class="inline-flex items-center px-6 py-2 border border-transparent text-sm font-medium rounded-xl shadow-sm text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition">
                    Publish Post
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
