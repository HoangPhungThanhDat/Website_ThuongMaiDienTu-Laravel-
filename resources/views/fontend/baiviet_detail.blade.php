<!-- filepath: d:\xampp\htdocs\Website_SmartPhone_LARAVEL\Website_SmartPhone_LARAVEL\resources\views\fontend\baiviet_detail.blade.php -->
@extends('layouts.site')
@section('content')
<div class="max-w-[1200px] mx-auto px-3 py-6">
    <!-- Breadcrumb -->
    <nav aria-label="Breadcrumb" class="text-gray-500 mb-3 select-none">
        <ol class="flex flex-wrap gap-1 items-center text-sm font-normal">
            <li><a href="{{ route('site.home') }}" class="hover:underline">Trang chủ</a></li>
            <li><span>&gt;</span></li>
            <li><a href="#" class="hover:underline">Bài viết</a></li>
            <li><span>&gt;</span></li>
            <li class="text-gray-400 truncate max-w-[200px]">{{ $post->title }}</li>
        </ol>
    </nav>

    <!-- Main Content -->
    <div class="flex flex-col lg:flex-row gap-6">
        <!-- Left: Hình ảnh bài viết -->
        <div class="w-full lg:w-[55%] flex flex-col">
            <div class="relative border border-gray-300 rounded-md p-3 flex justify-center items-center">
                <img
                    src="{{ asset('images/posts/'.$post->image) }}"
                    alt="{{ $post->title }}"
                    class="max-w-full max-h-[400px] object-contain"
                />
            </div>
        </div>

        <!-- Right: Chi tiết bài viết -->
        <div class="w-full lg:w-[45%] space-y-3">
            <div class="border-2 border-yellow-400 rounded-md p-4">
                <h1 class="text-black font-semibold text-lg leading-tight mb-2">
                    {{ $post->title }}
                </h1>
                <p class="text-gray-600 text-sm mb-2">
                    {{ $post->description }}
                </p>
                <p class="text-yellow-500 text-sm font-semibold mb-2">
                    Đánh giá: ⭐️⭐️⭐️⭐️☆ (4.5/5)
                </p>
                <div class="text-gray-700 text-sm">
                    {!! $post->detail !!}
                </div>
            </div>
        </div>
    </div>

    <!-- Tabs: Bài viết liên quan và Bình luận -->
    <div class="mt-6">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Bài viết liên quan</button>
                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Bình luận</button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <!-- Bài viết liên quan -->
            <div class="row">
                <div class="col-12">
                    
                      <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                            <div class="container mt-5">
                                <div class="row">
                                    @foreach ($list_post as $postitem)
                                        <x-post-card :$postitem/>                         
                                    @endforeach                     
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0"></div>                
                      </div>
                </div>
            </div>

            <!-- Bình luận -->
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                <div class="container mt-5">
                    <h3 class="text-lg font-semibold mb-4">Bình luận</h3>
                    <p>Chức năng bình luận đang được phát triển...</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('title', 'Chi Tiết Bài Viết')


<style>
    /* Breadcrumb */
nav[aria-label="Breadcrumb"] ol {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
    font-size: 0.875rem;
    color: #6b7280;
}

nav[aria-label="Breadcrumb"] a {
    color: #1d4ed8;
    text-decoration: none;
}

nav[aria-label="Breadcrumb"] a:hover {
    text-decoration: underline;
}

/* Tabs */
.nav-tabs .nav-link {
    border: 1px solid #e5e7eb;
    border-radius: 0.375rem;
    padding: 0.5rem 1rem;
    color: #374151;
    font-weight: 500;
    transition: background-color 0.2s ease, color 0.2s ease;
}

.nav-tabs .nav-link.active {
    background-color: #fbbf24;
    color: #fff;
    border-color: #fbbf24;
}

.nav-tabs .nav-link:hover {
    background-color: #fef3c7;
    color: #374151;
}

/* Related posts grid */
.grid {
    display: grid;
    gap: 1rem;
}

.grid-cols-1 {
    grid-template-columns: repeat(1, minmax(0, 1fr));
}

@media (min-width: 640px) {
    .grid-cols-2 {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

@media (min-width: 768px) {
    .grid-cols-3 {
        grid-template-columns: repeat(3, minmax(0, 1fr));
    }
}

@media (min-width: 1024px) {
    .grid-cols-4 {
        grid-template-columns: repeat(4, minmax(0, 1fr));
    }
}
</style>