<nav x-data="{ open: false }" class="bg-black/60 backdrop-blur-xl sticky top-0 z-50 border-b border-white/5">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex items-center">
                <div class="shrink-0 flex items-center">
                    <a href="/" class="text-2xl font-black tracking-tighter text-white group flex items-center">
                        <span class="h-8 w-8 bg-primary-600 rounded-lg mr-3 flex items-center justify-center group-hover:rotate-12 transition-transform duration-300">
                             <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                        </span>
                        BlogApp
                    </a>
                </div>
                <div class="hidden sm:ml-10 sm:flex sm:space-x-8">
                    @auth
                        @if(auth()->user()->role_id == 1)
                            <a href="/admin/users" class="inline-flex items-center px-1 pt-1 text-sm font-bold text-secondary-400 hover:text-white transition-colors tracking-tight">Users</a>
                            <a href="/admin/blogs" class="inline-flex items-center px-1 pt-1 text-sm font-bold text-secondary-400 hover:text-white transition-colors tracking-tight">Manage Blogs</a>
                        @else
                            <a href="{{ route('blogs.user.index') }}" class="inline-flex items-center px-1 pt-1 text-sm font-bold text-secondary-400 hover:text-white transition-colors tracking-tight">Explore Blogs</a>
                        @endif
                    @endauth
                </div>
            </div>
            <div class="hidden sm:ml-6 sm:flex sm:items-center">
                <div class="ml-3 relative space-x-4 flex items-center">
                    @guest
                        <a href="/login" class="text-sm font-bold text-secondary-400 hover:text-white transition">Login</a>
                        <a href="/register" class="inline-flex items-center px-6 py-2.5 bg-white text-black text-sm font-black rounded-xl hover:scale-105 transition-all shadow-lg shadow-white/5">
                            Get Started
                        </a>
                    @else
                        <div class="flex items-center space-x-6">
                            <div class="flex flex-col items-end">
                                <span class="text-xs font-bold text-primary-500 uppercase tracking-widest">{{ auth()->user()->role_id == 1 ? 'Admin' : 'Writer' }}</span>
                                <span class="text-sm font-bold text-white tracking-tight">{{ auth()->user()->name }}</span>
                            </div>
                            <form method="POST" action="/logout">
                                @csrf
                                <button class="h-10 w-10 flex items-center justify-center rounded-xl bg-white/5 border border-white/10 text-secondary-400 hover:text-red-400 hover:bg-red-500/10 transition-all">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                </button>
                            </form>
                        </div>
                    @endguest
                </div>
            </div>
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-xl text-secondary-400 hover:text-white hover:bg-white/5 focus:outline-none transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-black border-b border-white/5">
        <div class="pt-2 pb-3 space-y-1 px-4">
            @auth
                <a href="/dashboard" class="block py-3 text-base font-bold text-secondary-400 hover:text-white">Dashboard</a>
                <a href="{{ route('blogs.user.index') }}" class="block py-3 text-base font-bold text-secondary-400 hover:text-white">Blogs</a>
            @endauth
        </div>
        <div class="pt-4 pb-4 border-t border-white/5 px-4">
            @guest
                <a href="/login" class="block py-3 text-base font-bold text-secondary-400">Login</a>
                <a href="/register" class="block py-3 text-base font-bold text-primary-500">Get Started</a>
            @else
                <div class="flex items-center justify-between">
                    <div class="text-base font-bold text-white">{{ auth()->user()->name }}</div>
                    <form method="POST" action="/logout">
                        @csrf
                        <button class="text-sm font-bold text-red-500">Logout</button>
                    </form>
                </div>
            @endguest
        </div>
    </div>
</nav>
