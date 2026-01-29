<nav x-data="{ open: false }" class="bg-white/80 backdrop-blur-md sticky top-0 z-50 border-b border-secondary-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="/" class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-primary-600 to-primary-400">
                        BlogApp
                    </a>
                </div>
                <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                    @auth
                        @if(auth()->user()->role_id == 1)
                            <!-- Admin Links -->
                            <a href="/admin/users" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-secondary-500 hover:text-secondary-700 hover:border-secondary-300 transition duration-150 ease-in-out">
                                Users
                            </a>
                            <a href="/admin/blogs" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-secondary-500 hover:text-secondary-700 hover:border-secondary-300 transition duration-150 ease-in-out">
                                Manage Blogs
                            </a>
                        @else
                            <!-- User Links -->
                            <a href="{{ route('blogs.user.index') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium text-secondary-500 hover:text-secondary-700 hover:border-secondary-300 transition duration-150 ease-in-out">
                                Blogs
                            </a>
                        @endif
                    @endauth
                </div>
            </div>
            <div class="hidden sm:ml-6 sm:flex sm:items-center">
                <div class="ml-3 relative space-x-4">
                    @guest
                        <a href="/login" class="text-sm font-medium text-secondary-500 hover:text-primary-600 transition">Login</a>
                        <a href="/register" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-primary-600 hover:bg-primary-700 shadow-sm transition">Register</a>
                    @else
                        <div class="flex items-center space-x-4">
                            <span class="text-sm font-medium text-secondary-700">{{ auth()->user()->name }}</span>
                            <form method="POST" action="/logout">
                                @csrf
                                <button class="text-sm font-medium text-secondary-500 hover:text-red-600 transition">Logout</button>
                            </form>
                        </div>
                    @endguest
                </div>
            </div>
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-secondary-400 hover:text-secondary-500 hover:bg-secondary-100 focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-white border-b border-secondary-200">
        <div class="pt-2 pb-3 space-y-1">
            @auth
                <a href="/dashboard" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-secondary-600 hover:bg-secondary-50 hover:border-secondary-300 hover:text-secondary-800 transition duration-150 ease-in-out">
                    Dashboard
                </a>
                @if(auth()->user()->role_id == 1)
                    <a href="/admin/users" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-secondary-600 hover:bg-secondary-50 hover:border-secondary-300 hover:text-secondary-800 transition duration-150 ease-in-out">Users</a>
                    <a href="/admin/blogs" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-secondary-600 hover:bg-secondary-50 hover:border-secondary-300 hover:text-secondary-800 transition duration-150 ease-in-out">Manage Blogs</a>
                @else
                    <a href="{{ route('blogs.user.index') }}" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-secondary-600 hover:bg-secondary-50 hover:border-secondary-300 hover:text-secondary-800 transition duration-150 ease-in-out">Blogs</a>
                @endif
            @endauth
        </div>
        <div class="pt-4 pb-4 border-t border-secondary-200">
            @guest
                <div class="space-y-1 px-4">
                    <a href="/login" class="block text-base font-medium text-secondary-500 hover:text-secondary-800">Login</a>
                    <a href="/register" class="block mt-2 text-base font-medium text-primary-600 hover:text-primary-700">Register</a>
                </div>
            @else
                <div class="px-4 flex items-center justify-between">
                    <div class="text-base font-medium text-secondary-800">{{ auth()->user()->name }}</div>
                    <form method="POST" action="/logout">
                        @csrf
                        <button class="text-sm font-medium text-secondary-500 hover:text-red-600">Logout</button>
                    </form>
                </div>
            @endguest
        </div>
    </div>
</nav>
