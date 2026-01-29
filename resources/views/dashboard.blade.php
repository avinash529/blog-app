@extends('layouts.app')

@section('content')
    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Section -->
            <div class="mb-8">
                <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100">Dashboard</h3>
                <p class="text-gray-500 dark:text-gray-400">Welcome back, {{ Auth::user()->name }}!</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Total Blogs -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100 dark:border-gray-700 transition hover:shadow-2xl hover:-translate-y-1 duration-300 relative group">
                    <div class="absolute right-0 top-0 h-32 w-32 bg-blue-50 dark:bg-blue-900/20 rounded-bl-full -mr-8 -mt-8 transition-transform group-hover:scale-110"></div>
                    <div class="p-6 relative">
                        <div class="flex items-center">
                            <div class="p-3 rounded-xl bg-blue-500/10 text-blue-600 dark:text-blue-400">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Blogs</p>
                                <h4 class="text-3xl font-bold text-gray-900 dark:text-gray-100">{{ $total }}</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- New Blogs -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100 dark:border-gray-700 transition hover:shadow-2xl hover:-translate-y-1 duration-300 relative group">
                     <div class="absolute right-0 top-0 h-32 w-32 bg-green-50 dark:bg-green-900/20 rounded-bl-full -mr-8 -mt-8 transition-transform group-hover:scale-110"></div>
                    <div class="p-6 relative">
                        <div class="flex items-center">
                            <div class="p-3 rounded-xl bg-green-500/10 text-green-600 dark:text-green-400">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">New Blogs</p>
                                <h4 class="text-3xl font-bold text-gray-900 dark:text-gray-100">{{ $new }}</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Viewed Blogs -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100 dark:border-gray-700 transition hover:shadow-2xl hover:-translate-y-1 duration-300 relative group">
                     <div class="absolute right-0 top-0 h-32 w-32 bg-purple-50 dark:bg-purple-900/20 rounded-bl-full -mr-8 -mt-8 transition-transform group-hover:scale-110"></div>
                    <div class="p-6 relative">
                        <div class="flex items-center">
                            <div class="p-3 rounded-xl bg-purple-500/10 text-purple-600 dark:text-purple-400">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 5 8.268 7.943 9.542 12-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Viewed Blogs</p>
                                <h4 class="text-3xl font-bold text-gray-900 dark:text-gray-100">{{ $viewed }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                </div>

            <!-- Recent Blogs Section -->
            <div class="mt-10">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100">Recent Blogs</h3>
                    <a href="{{ route('blogs.user.index') }}" class="text-sm font-medium text-primary-600 hover:text-primary-500">View all</a>
                </div>

                <div class="bg-white dark:bg-gray-800 shadow-xl sm:rounded-2xl border border-gray-100 dark:border-gray-700 overflow-hidden">
                    <ul role="list" class="divide-y divide-gray-100 dark:divide-gray-700">
                        @foreach($recentBlogs as $blog)
                        <li class="relative hover:bg-gray-50 dark:hover:bg-gray-700/50 transition duration-150 ease-in-out">
                            <div class="px-6 py-5 flex items-center justify-between">
                                <div class="flex-1 min-w-0 pr-4">
                                    <div class="flex items-center justify-between mb-1">
                                        <p class="text-sm font-medium text-primary-600 dark:text-primary-400 truncate">
                                            {{ $blog->author?->name ?? 'Unknown' }}
                                        </p>
                                        <p class="text-xs text-gray-400">
                                            {{ $blog->created_at->diffForHumans() }}
                                        </p>
                                    </div>
                                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white truncate mb-1">
                                        {{ $blog->title }}
                                    </h4>
                                    <p class="text-sm text-gray-500 line-clamp-1">
                                        {{ \Illuminate\Support\Str::limit($blog->content, 100) }}
                                    </p>
                                </div>
                                <div>
                                    <a href="{{ route('blogs.user.show', $blog->slug) }}" 
                                       class="inline-flex items-center p-2 border border-transparent rounded-full shadow-sm text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition-colors">
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    @if($recentBlogs->isEmpty())
                        <div class="p-8 text-center text-gray-500">
                            No recent blogs found.
                        </div>
                    @endif
                </div>
            </div>
            
            <div class="mt-8 text-center">
                 <a href="{{ route('blogs.user.index') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-xl shadow-sm text-white bg-primary-600 hover:bg-primary-700 transition-all duration-200">
                    Explore All Blogs
                    <svg class="ml-2 -mr-1 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>
        </div>
    </div>
@endsection
