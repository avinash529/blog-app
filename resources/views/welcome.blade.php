@extends('layouts.app')

@section('content')
<div class="bg-[#020617] text-white selection:bg-primary-500/30 font-sans overflow-x-hidden">
    <!-- Immersive Hero Section -->
    <div class="relative min-h-screen flex items-center justify-center pt-20 pb-32 overflow-hidden">
        <!-- Animated Mesh Background -->
        <div class="absolute inset-0 z-0">
            <div class="absolute top-1/4 left-1/4 w-[500px] h-[500px] bg-primary-600/20 rounded-full blur-[120px] animate-pulse"></div>
            <div class="absolute bottom-1/4 right-1/4 w-[600px] h-[600px] bg-indigo-600/20 rounded-full blur-[150px] animate-bounce [animation-duration:10s]"></div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full h-full bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-20 contrast-150 brightness-100"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <div class="inline-flex items-center space-x-2 px-4 py-2 rounded-full bg-white/5 border border-white/10 mb-8 animate-fade-in backdrop-blur-md">
                <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-primary-500"></span>
                </span>
                <span class="text-xs font-bold text-primary-300 tracking-[0.2em] uppercase">The Future of Content</span>
            </div>
            
            <h1 class="text-6xl sm:text-8xl lg:text-9xl font-extrabold tracking-tighter leading-none mb-8 animate-slide-up">
                Write with <br/>
                <span class="bg-clip-text text-transparent bg-gradient-to-b from-white to-white/40 italic font-display font-medium px-4">pure intent.</span>
            </h1>
            
            <p class="text-xl sm:text-2xl text-secondary-400 leading-relaxed max-w-3xl mx-auto mb-12 animate-fade-in [animation-delay:400ms]">
                A sanctuary for your thoughts. Built for creators who value craftsmanship, speed, and the art of digital storytelling.
            </p>
            
            <div class="flex flex-col sm:flex-row justify-center items-center space-y-4 sm:space-y-0 sm:space-x-6 animate-fade-in [animation-delay:600ms]">
                @guest
                    <a href="{{ route('register') }}" class="group relative px-10 py-5 bg-white text-black font-bold rounded-2xl hover:scale-105 transition-all duration-300 overflow-hidden text-lg">
                        <span class="relative z-10">Start your journey</span>
                        <div class="absolute inset-0 bg-gradient-to-r from-primary-200 to-indigo-200 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    </a>
                    <a href="{{ route('login') }}" class="px-10 py-5 bg-white/5 text-white font-bold rounded-2xl border border-white/10 hover:bg-white/10 transition-all text-lg backdrop-blur-md">
                        Log in
                    </a>
                @else
                    <a href="{{ route('blogs.user.index') }}" class="group relative px-10 py-5 bg-white text-black font-bold rounded-2xl hover:scale-105 transition-all duration-300 overflow-hidden text-lg">
                        <span class="relative z-10">Access Dashboard</span>
                        <div class="absolute inset-0 bg-gradient-to-r from-primary-200 to-indigo-200 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    </a>
                @endguest
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-10 left-1/2 -translate-x-1/2 flex flex-col items-center space-y-2 opacity-50">
            <span class="text-[10px] font-bold tracking-[0.3em] uppercase">Explore</span>
            <div class="w-px h-12 bg-gradient-to-b from-white to-transparent"></div>
        </div>
    </div>

    <!-- Bento Grid Features -->
    <div class="py-32 bg-black relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-20">
                <h2 class="text-4xl sm:text-6xl font-extrabold tracking-tight mb-4">Precision Engineered.</h2>
                <p class="text-xl text-secondary-500">Every feature crafted for professional publishing.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 lg:grid-cols-6 gap-4">
                <!-- Bento Item 1: Large -->
                <div class="md:col-span-4 lg:col-span-4 bg-secondary-900/40 border border-white/5 rounded-[40px] p-12 relative overflow-hidden group">
                    <div class="relative z-10">
                        <div class="h-12 w-12 bg-primary-500/20 rounded-xl flex items-center justify-center text-primary-400 mb-8 border border-primary-500/30">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                        </div>
                        <h4 class="text-3xl font-bold mb-4">Distraction-Free Editor</h4>
                        <p class="text-xl text-secondary-500 leading-relaxed max-w-md">Experience the fluidity of our minimalist Markdown editor. Focus only on what matters: your prose.</p>
                    </div>
                    <!-- Abstract Background Graphic -->
                    <div class="absolute bottom-0 right-0 w-80 h-80 bg-gradient-to-tl from-primary-600/20 to-transparent blur-3xl group-hover:scale-125 transition-transform duration-700"></div>
                </div>

                <!-- Bento Item 2: Square -->
                <div class="md:col-span-2 lg:col-span-2 bg-[#111111] border border-white/5 rounded-[40px] p-12 flex flex-col justify-between group">
                    <div class="h-12 w-12 bg-indigo-500/20 rounded-xl flex items-center justify-center text-indigo-400 border border-indigo-500/30">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <div>
                        <h4 class="text-2xl font-bold mb-2">Lightning Fast</h4>
                        <p class="text-secondary-500">Global edge CDN delivery.</p>
                    </div>
                </div>

                <!-- Bento Item 3: Square -->
                <div class="md:col-span-2 lg:col-span-2 bg-[#111111] border border-white/5 rounded-[40px] p-12 flex flex-col justify-between group">
                    <div class="h-12 w-12 bg-emerald-500/20 rounded-xl flex items-center justify-center text-emerald-400 border border-emerald-500/30">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                    <div>
                        <h4 class="text-2xl font-bold mb-2">Enterprise Security</h4>
                        <p class="text-secondary-500">Your content is always protected.</p>
                    </div>
                </div>

                <!-- Bento Item 4: Large Horizontal -->
                <div class="md:col-span-4 lg:col-span-4 bg-gradient-to-br from-secondary-900/60 to-black border border-white/5 rounded-[40px] p-12 relative overflow-hidden group">
                     <div class="relative z-10 flex flex-col h-full justify-between">
                        <div>
                             <div class="h-12 w-12 bg-purple-500/20 rounded-xl flex items-center justify-center text-purple-400 mb-8 border border-purple-500/30">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path></svg>
                            </div>
                            <h4 class="text-3xl font-bold mb-4">Deep Analytics</h4>
                            <p class="text-xl text-secondary-500 leading-relaxed max-w-md">Understand your reach with real-time stats on every post you publish.</p>
                        </div>
                        <div class="mt-8 flex space-x-2">
                             @for($i=0; $i<5; $i++)
                                <div class="h-1 w-12 bg-white/10 rounded-full overflow-hidden">
                                     <div class="h-full bg-primary-500 animate-[grow_2s_infinite_ease-in-out]" style="animation-delay: {{ $i * 0.2 }}s"></div>
                                </div>
                             @endfor
                        </div>
                    </div>
                    <!-- Mesh Decoration -->
                    <div class="absolute -bottom-20 -right-20 w-80 h-80 bg-purple-600/10 rounded-full blur-[100px]"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="py-40 bg-black relative border-t border-white/5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <h2 class="text-5xl sm:text-7xl font-extrabold tracking-tighter mb-12">Start your <span class="italic font-display font-medium text-primary-400">legacy.</span></h2>
            <a href="{{ route('register') }}" class="inline-flex items-center px-12 py-6 bg-white text-black font-black rounded-full hover:scale-110 transition-transform duration-500 text-2xl shadow-[0_0_50px_rgba(255,255,255,0.2)]">
                Create Now
            </a>
        </div>
        <!-- Decorative Glow -->
        <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-[800px] h-96 bg-primary-600/30 rounded-full blur-[150px] translate-y-1/2"></div>
    </div>
</div>

<style>
    @keyframes grow {
        0%, 100% { width: 0%; }
        50% { width: 100%; }
    }
    .animate-grow {
        animation: grow 2s infinite ease-in-out;
    }
    @keyframes slide-up {
        from { transform: translateY(50px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }
    .animate-slide-up {
        animation: slide-up 1s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .animate-fade-in {
        animation: fade-in 1.5s cubic-bezier(0.16, 1, 0.3, 1);
    }
    @keyframes fade-in {
        from { opacity: 0; }
        to { opacity: 1; }
    }
</style>
@endsection
