<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'BlogApp') }}</title>
        <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased h-full">
        <div class="min-h-screen relative flex items-center justify-center overflow-hidden bg-gray-50">
            <!-- Dynamic Background -->
            <div class="absolute inset-0 w-full h-full">
                <div class="absolute top-0 -left-4 w-72 h-72 bg-purple-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
                <div class="absolute top-0 -right-4 w-72 h-72 bg-yellow-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
                <div class="absolute -bottom-8 left-20 w-72 h-72 bg-pink-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000"></div>
                <div class="absolute inset-0 bg-white/30 backdrop-blur-3xl"></div>
            </div>

            <!-- Content -->
            <div class="relative w-full max-w-md px-6 z-10">
                <div class="bg-white/70 backdrop-blur-xl border border-white/20 shadow-2xl rounded-3xl p-8 sm:p-10 transform transition-all hover:scale-[1.01]">
                    <div class="flex justify-center mb-8">
                        <a href="/" class="group">
                             <div class="bg-gradient-to-tr from-primary-600 to-indigo-600 p-3 rounded-2xl shadow-lg group-hover:shadow-primary-500/30 transition-all duration-300">
                                <x-application-logo class="w-10 h-10 text-white" />
                             </div>
                        </a>
                    </div>
                    
                    {{ $slot }}
                </div>
                
                <div class="mt-8 text-center text-sm text-gray-500">
                    &copy; {{ date('Y') }} BlogApp. All rights reserved.
                </div>
            </div>
        </div>
        
        <style>
            @keyframes blob {
                0% { transform: translate(0px, 0px) scale(1); }
                33% { transform: translate(30px, -50px) scale(1.1); }
                66% { transform: translate(-20px, 20px) scale(0.9); }
                100% { transform: translate(0px, 0px) scale(1); }
            }
            .animate-blob {
                animation: blob 7s infinite;
            }
            .animation-delay-2000 {
                animation-delay: 2s;
            }
            .animation-delay-4000 {
                animation-delay: 4s;
            }
        </style>
    </body>
</html>
