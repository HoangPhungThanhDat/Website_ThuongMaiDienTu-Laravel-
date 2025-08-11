<!-- filepath: d:\xampp\htdocs\Website_SmartPhone_LARAVEL\Website_SmartPhone_LARAVEL\resources\views\fontend\sanpham.blade.php -->
@extends('layouts.site')
@section('content')
<div class="container mt-5">
    <h1 class="col-12 text-center mb-5">
        {{ isset($category) ? 'Danh Mục: ' . $category->name : 'Tất Cả Sản Phẩm' }}
    </h1>
    <div class="flex flex-col lg:flex-row gap-6">
        <!-- Sidebar -->
        <!-- Sidebar -->
<!-- Sidebar sản phẩm chuyên nghiệp -->
<div class="w-full lg:w-[280px] bg-white rounded-2xl shadow-xl border border-gray-200 p-6 animate-fade-in overflow-y-auto max-h-[500px] scrollbar-thin scrollbar-thumb-gray-300 hover:scrollbar-thumb-gray-400">
    <h2 class="text-xl font-extrabold text-gray-800 mb-6 border-b pb-3 tracking-tight">
        🔍 Bộ lọc sản phẩm
    </h2>

    <!-- Accordion Thương hiệu -->
    <div x-data="{ open: true, showAll: false }" class="mb-6">
        <button @click="open = !open"
            class="w-full flex justify-between items-center text-sm font-semibold text-gray-600 uppercase tracking-wide mb-2 hover:text-blue-600 transition-all">
            <span><i class="fas fa-tags mr-2 text-blue-500"></i>Thương hiệu</span>
            <i :class="open ? 'fas fa-chevron-up' : 'fas fa-chevron-down'" class="transition-all"></i>
        </button>
        <ul x-show="open" x-transition class="space-y-2 pl-1">
            @foreach ($brands->take(5) as $brand)
                <li>
                    <a href="{{ route('site.sanpham', ['brand' => $brand->slug]) }}"
                        class="block px-3 py-2 rounded-lg text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-all hover:pl-4">
                        {{ $brand->name }}
                    </a>
                </li>
            @endforeach

            @if ($brands->count() > 5)
                <template x-if="showAll">
                    @foreach ($brands->slice(5) as $brand)
                        <li>
                            <a href="{{ route('site.sanpham', ['brand' => $brand->slug]) }}"
                                class="block px-3 py-2 rounded-lg text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-all hover:pl-4">
                                {{ $brand->name }}
                            </a>
                        </li>
                    @endforeach
                </template>
                <li>
                    <button @click="showAll = !showAll" class="text-blue-500 text-sm mt-2 hover:underline">
                        <span x-text="showAll ? 'Thu gọn' : 'Xem thêm...'"></span>
                    </button>
                </li>
            @endif
        </ul>
    </div>

    <!-- Accordion Danh mục -->
    <div x-data="{ open: true, showAll: false }">
        <button @click="open = !open"
            class="w-full flex justify-between items-center text-sm font-semibold text-gray-600 uppercase tracking-wide mb-2 hover:text-green-600 transition-all">
            <span><i class="fas fa-layer-group mr-2 text-green-500"></i>Danh mục</span>
            <i :class="open ? 'fas fa-chevron-up' : 'fas fa-chevron-down'" class="transition-all"></i>
        </button>
        <ul x-show="open" x-transition class="space-y-2 pl-1">
            @foreach ($categories->take(5) as $category)
                <li>
                    <a href="{{ route('site.product.category', $category->slug) }}"
                        class="block px-3 py-2 rounded-lg text-sm text-gray-700 hover:bg-green-50 hover:text-green-600 transition-all hover:pl-4">
                        {{ $category->name }}
                    </a>
                </li>
            @endforeach

            @if ($categories->count() > 5)
                <template x-if="showAll">
                    @foreach ($categories->slice(5) as $category)
                        <li>
                            <a href="{{ route('site.product.category', $category->slug) }}"
                                class="block px-3 py-2 rounded-lg text-sm text-gray-700 hover:bg-green-50 hover:text-green-600 transition-all hover:pl-4">
                                {{ $category->name }}
                            </a>
                        </li>
                    @endforeach
                </template>
                <li>
                    <button @click="showAll = !showAll" class="text-green-500 text-sm mt-2 hover:underline">
                        <span x-text="showAll ? 'Thu gọn' : 'Xem thêm...'"></span>
                    </button>
                </li>
            @endif
        </ul>
    </div>



        </div>
        <!-- Danh sách sản phẩm -->
        <div class="flex-1">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
                @foreach ($list_product as $productitem)
                    <x-product-card :$productitem />
                @endforeach
            </div>
            <div class="col-12 d-flex justify-content-center mt-4">
                {{ $list_product->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

@section('title', 'Sản phẩm')
@section('header')
@endsection
@section('footer')
@endsection


<style>
    @keyframes fade-in {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in {
        animation: fade-in 0.5s ease-out;
    }
    </style>
    