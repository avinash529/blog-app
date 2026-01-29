@extends('layouts.app')

@section('content')
<div x-data="blogManager()" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10" @blog-viewed.window="markAsViewed($event.detail.id)">
    <div class="flex items-center justify-between mb-8">
        <h3 class="text-3xl font-bold text-secondary-900">Latest Blogs</h3>
    </div>

    <!-- Blog Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($blogs as $blog)
            @php
                $isViewed = in_array($blog->id, $viewed);
            @endphp
            <div x-data="{ viewed: {{ $isViewed ? 'true' : 'false' }} }" 
                 @blog-viewed.window="if ($event.detail.id === {{ $blog->id }}) { viewed = true; }" 
                 :class="{ 'border-primary-500 ring-1 ring-primary-500': viewed, 'border-secondary-200 hover:border-primary-300': !viewed }"
                 class="group bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 border overflow-hidden flex flex-col h-full relative">
                
                <div class="p-6 flex-grow flex flex-col">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex-1">
                            <span x-show="viewed" class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                Viewed
                            </span>
                            <span x-show="!viewed" class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-primary-100 text-primary-800">
                                New
                            </span>
                        </div>
                    </div>
                    
                    <h5 class="text-xl font-bold text-secondary-900 mb-3 group-hover:text-primary-600 transition-colors">
                        {{ $blog->title }}
                    </h5>
                    
                    <p class="text-secondary-500 text-sm line-clamp-3 mb-6">
                        Click read to explore this article...
                    </p>

                    <div class="mt-auto">
                        <button @click="openBlog('{{ $blog->slug }}', {{ $blog->id }})" 
                                class="w-full inline-flex justify-center items-center px-4 py-2.5 border border-transparent text-sm font-medium rounded-xl text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition-all shadow-md hover:shadow-lg transform active:scale-95">
                            Reading
                            <svg class="ml-2 -mr-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Modal Backdrop -->
    <div x-show="modalOpen" 
         x-transition:enter="ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 bg-secondary-900/50 backdrop-blur-sm z-[100] flex items-center justify-center p-4 sm:p-6"
         x-cloak>
        
        <!-- Modal Panel -->
        <div @click.away="closeModal()"
             x-show="modalOpen"
             x-transition:enter="ease-out duration-300"
             x-transition:enter-start="opacity-0 scale-95 translate-y-4"
             x-transition:enter-end="opacity-100 scale-100 translate-y-0"
             x-transition:leave="ease-in duration-200"
             x-transition:leave-start="opacity-100 scale-100 translate-y-0"
             x-transition:leave-end="opacity-0 scale-95 translate-y-4"
             class="bg-white rounded-2xl shadow-2xl max-w-4xl w-full max-h-[90vh] flex flex-col overflow-hidden">
            
            <div class="px-6 py-4 border-b border-secondary-100 flex items-center justify-between bg-primary-50/50">
                <h3 x-text="activeBlog.title" class="text-xl font-bold text-secondary-900"></h3>
                <button @click="closeModal()" class="text-secondary-400 hover:text-secondary-500 focus:outline-none rounded-full p-1 hover:bg-secondary-100 transition">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            
            <div class="px-6 py-6 overflow-y-auto prose prose-primary max-w-none text-secondary-600" x-html="activeBlog.content">
                <!-- Content injected here -->
            </div>
            
            <div class="px-6 py-4 border-t border-secondary-100 bg-secondary-50 flex justify-end">
                <button @click="closeModal()" class="px-4 py-2 bg-white border border-secondary-300 rounded-lg text-secondary-700 hover:bg-secondary-50 font-medium transition shadow-sm">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('blogManager', () => ({
            modalOpen: false,
            activeBlog: { title: '', content: '' },
            
            async openBlog(slug, id) {
                try {
                    // Mark as viewed
                    await fetch(`/blogs/${slug}/view`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        }
                    });

                     // Dispatch event to update local card state
                    window.dispatchEvent(new CustomEvent('blog-viewed', { detail: { id: id } }));

                    // Fetch content
                    const response = await fetch(`/blogs/${slug}/content`);
                    if (!response.ok) throw new Error('Network response was not ok');
                    
                    const data = await response.json();
                    
                    this.activeBlog = {
                        title: data.title,
                        content: data.content
                    };
                    
                    this.modalOpen = true;
                    document.body.style.overflow = 'hidden'; // Prevent background scrolling

                } catch (error) {
                    console.error('Error:', error);
                    alert('Unable to load blog content. Please try again.');
                }
            },

            closeModal() {
                this.modalOpen = false;
                document.body.style.overflow = '';
                setTimeout(() => {
                    this.activeBlog = { title: '', content: '' };
                }, 300);
            },
            
            markAsViewed(id) {
                // Deprecated in favor of window event
            }
        }));
    });
</script>
@endsection
