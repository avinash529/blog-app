@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Blogs</h3>

    <!-- BLOG VIEW MODAL -->
    <div class="modal fade" id="blogModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="blogModalTitle"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="blogModalContent"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    @foreach($blogs as $blog)
        <div class="mb-3 border p-3" id="blog-{{ $blog->id }}">
            <h5>{{ $blog->title }}</h5>

            @php
                $isViewed = in_array($blog->id, $viewed);
            @endphp

            <button class="btn btn-primary btn-sm read-btn"
                    data-slug="{{ $blog->slug }}"
                    data-id="{{ $blog->id }}">
                Read
            </button>

            @if($isViewed)
                <span class="badge bg-success viewed-badge">Viewed</span>
            @else
                <span class="badge bg-warning text-dark viewed-badge">New</span>
            @endif
        </div>
    @endforeach
</div>
@endsection

@section('scripts')



<script>
$('.read-btn').on('click', function(e) {
    e.preventDefault();

    let slug = $(this).data('slug');
    let blogId = $(this).data('id');

    // 1. Mark blog as viewed
    $.ajax({
        url: '/blogs/' + slug + '/view',
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}'
        },
        success: function() {

            // Update badge UI
            let badge = $('#blog-' + blogId).find('.viewed-badge');
            badge.removeClass('bg-warning text-dark').addClass('bg-success').text('Viewed');

            // 2. Fetch blog content after marking view
            $.ajax({
                url: '/blogs/' + slug + '/content',
                type: 'GET',
                success: function(data) {

                    // Fill modal
                    $('#blogModalTitle').text(data.title);
                    $('#blogModalContent').html(data.content);

                    // Show modal
                    $('#blogModal').modal('show');
                },
                error: function() {
                    alert('Failed to load blog content.');
                }
            });
        },
        error: function() {
            alert('Failed to mark blog as viewed.');
        }
    });
});
</script>
@endsection
