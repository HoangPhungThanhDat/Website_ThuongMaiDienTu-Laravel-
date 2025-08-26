@extends('layouts.site')
@section('content')
    <!-- hiện thị sản phẩm -->
    <div class="main" style="margin-top: 0px; max-width: 2400px; margin: 0 auto;">
        <div class="container-fluid">
            <div class="row">
                <x-flash-sale />
                <x-product-new />
                <x-PhuKienBanChay />              
                <x-product-category-home />
                <x-post-new />
                </nav>
            </div>
            <div class="social-icons">
                <a href="https://zalo.me/your-zalo-id" target="_blank" class="social-icon">
                    <img src="../public/image/zalo.webp" alt="Zalo">
                </a>
                <a href="https://m.me/your-facebook-id" target="_blank" class="social-icon">
                    <img src="../public/image/iconmess.webp" alt="Messenger">
                </a>
            </div>
@endsection
@section('title', 'Trang chủ')
@section('header')
@endsection
@section('footer')
@endsection
