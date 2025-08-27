@extends('layouts.site')
@section('content')
    <div class="max-w-[1200px] mx-auto p-4">
        <!-- Breadcrumb -->
        <div class="text-sm text-[#6B7280] mb-4 select-none">
            <span>
                Trang chủ
            </span>
            <span class="mx-1">
                ›
            </span>
            <span>
                Giỏ hàng
            </span>
        </div>
        <div class="flex flex-col lg:flex-row gap-6">
            <!-- Left main content -->
            <div class="flex-1 bg-white rounded-lg p-6 shadow-sm">
                <!-- Table header -->
                <div
                    class="grid grid-cols-[1.5fr_1fr_1fr_1fr_0.5fr] text-xs font-semibold text-[#6B7280] border-b border-[#E4E7F1] pb-3 select-none">
                    <div class="flex items-center gap-2">
                        <input checked="" class="w-4 h-4 text-blue-600 border-gray-300 rounded" type="checkbox" />
                        <span>
                            SẢN PHẨM
                        </span>
                    </div>
                    <div class="text-center">
                        ĐƠN GIÁ
                    </div>
                    <div class="text-center">
                        SỐ LƯỢNG
                    </div>
                    <div class="text-center">
                        TỔNG
                    </div>
                    <div class="text-center">
                        XÓA
                    </div>
                </div>
                <!-- Product row -->
                @php
                    $totalMoney = 0;
                @endphp
                <form action="{{ route('site.cart.update') }}" method="post">
                    @csrf
                    @foreach ($list_cart as $row_cart)
                        <div class="grid grid-cols-[1.5fr_1fr_1fr_1fr_0.5fr] items-center border-b border-[#E4E7F1] py-4">
                            <div class="flex items-center gap-3">
                                <input checked="" class="w-4 h-4 text-blue-600 border-gray-300 rounded"
                                    type="checkbox" />
                                <img alt="{{ $row_cart['image'] }}" class="w-[60px] h-[60px] object-contain rounded"
                                    height="60" src="{{ asset('images/products/' . $row_cart['image']) }}"
                                    width="60" />
                                <div class="text-xs leading-tight">
                                    <div class="font-semibold text-[#1E1E2D]">
                                        {{ $row_cart['name'] }}
                                    </div>

                                </div>
                            </div>
                            <div class="text-center text-xs text-[#6B7280]">
                                {{ number_format($row_cart['price']) }}
                            </div>
                            <div class="text-center text-xs text-[#6B7280]">
                                <input type="number" style="width:60px" min="1" name="qty[{{ $row_cart['id'] }}]"
                                    value="{{ $row_cart['qty'] }}">
                            </div>
                            <div class="text-center text-xs text-[#6B7280]">
                                {{ number_format($row_cart['price'] * $row_cart['qty']) }}
                            </div>
                            <div class="text-center text-[#6B7280] cursor-pointer hover:text-black">
                                <a href="{{ route('site.cart.delete', ['id' => $row_cart['id']]) }}"
                                    class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                            </div>
                        </div>
                        @php
                            $totalMoney += $row_cart['price'] * $row_cart['qty'];
                        @endphp
                    @endforeach
                    @if (count($list_cart) == 0)
                        <div class="text-center py-10 text-gray-500">
                            <i class="fas fa-shopping-cart text-4xl mb-3"></i><br />
                            Giỏ hàng của bạn đang trống.
                        </div>
                    @endif
                    <tfoot>
                        <th colspan="4">
                            <a class="btn btn-success px-3"href="{{ route('site.home') }}">Mua thêm</a>
                            <button type="submit" class="btn btn-primary px-3">Cập nhật</button>
                        </th>
                    </tfoot>
                </form>
                <!-- Tabs for accessories and combo -->
                <div class="flex gap-3 mt-6 select-none">
                    <button class="text-xs border border-red-600 text-red-600 rounded-full px-3 py-1 font-semibold">
                        Sản phẩm mới nhất 
                    </button>
                </div>
                <!-- Accessories carousel -->
                <div class="mt-4 relative">
                    <button aria-label="Previous"
                        class="absolute top-1/2 -left-2 -translate-y-1/2 bg-white border border-[#E4E7F1] rounded-full w-7 h-7 flex items-center justify-center text-[#6B7280] hover:text-black shadow-sm z-10">
                        <i class="fas fa-chevron-left">
                        </i>
                    </button>
                    <div class="flex gap-4 overflow-x-auto scrollbar-hide px-8">
                        @foreach($new_products as $productnew)
                        <!-- Accessory item 1 -->
                        <div class="min-w-[100px] flex flex-col items-center gap-1 select-none">
                            <a href="{{ route('site.product.detail', ['slug' => $productnew->slug]) }}">
                             <img alt="{{ $productnew->name }}" class="w-[80px] h-[80px] object-contain" height="80"
                                src="{{ asset('images/products/' . $productnew->image) }}" width="80" />
                            </a>
                            <div class="text-[10px] text-[#6B7280]">
                                {{ Str::limit($productnew->name, 20) }}
                            </div>
                            <a href="{{ route('site.product.detail', ['slug' => $productnew->slug]) }}">
                                <button class="bg-red-600 text-white text-xs rounded px-3 py-1 mt-1 w-full hover:bg-red-700">
                                    Thêm vào giỏ hàng 
                                </button>
                            </a>
                        </div>
                       @endforeach
                    </div>
                    <button aria-label="Next"
                        class="absolute top-1/2 -right-2 -translate-y-1/2 bg-white border border-[#E4E7F1] rounded-full w-7 h-7 flex items-center justify-center text-[#6B7280] hover:text-black shadow-sm z-10">
                        <i class="fas fa-chevron-right">
                        </i>
                    </button>
                </div>
                <!-- Chương trình khuyến mãi -->
                <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 gap-4 select-none">
                    <img src="https://beta-api.bachlongmobile.com/media/MageINIC/bannerslider/Banner-macbookpro-1200x200.jpg"
                        class="banner-img" alt="Banner 2">
                    <img src="https://beta-api.bachlongmobile.com/media/MageINIC/bannerslider/Banner-LG-1200x200.jpg"
                        class="banner-img" alt="Banner 1">
                </div>
            </div>

            <!-- Right sidebar -->
            <div class="w-full lg:w-[320px] flex flex-col gap-6">
                <!-- Khuyến mãi -->
                <div class="bg-white rounded-lg p-4 shadow-sm select-none">
                    <div class="flex items-center justify-between text-xs font-semibold text-[#6B7280] mb-2">
                        <div>
                            Khuyến mãi
                        </div>
                        <div class="flex gap-2 text-blue-600 cursor-pointer">
                            <span>
                                Danh sách mã giảm giá
                            </span>
                            <i class="fas fa-angle-right mt-0.5">
                            </i>
                        </div>
                    </div>
                    <input
                        class="w-full border border-[#E4E7F1] rounded px-3 py-2 text-xs text-[#6B7280] focus:outline-none focus:ring-1 focus:ring-blue-600"
                        placeholder="Nhập mã giảm giá" type="text" />
                    <button
                        class="mt-2 w-full bg-blue-600 text-white text-xs font-semibold rounded px-3 py-2 hover:bg-blue-700">
                        Áp dụng
                    </button>
                </div>
                <!-- Thông tin thanh toán -->
                <div class="bg-white rounded-lg p-4 shadow-sm select-none">
                    <div class="flex items-center gap-2 text-[#6B7280] text-xs font-semibold mb-3">
                        <i class="fas fa-info-circle">
                        </i>
                        <span>
                            Thông tin thanh toán
                        </span>
                    </div>
                    <div class="flex justify-between text-xs text-[#6B7280] mb-1">
                        <span>
                            Tiền hàng
                        </span>
                        <span>
                            {{ number_format($totalMoney) }}
                        </span>
                    </div>
                    <div class="flex justify-between text-xs text-[#6B7280] font-semibold mb-4">
                        <span>
                            Tổng tiền tạm tính
                        </span>
                        <span>
                            {{ number_format($totalMoney) }}
                        </span>
                    </div>
                    <a href="{{ route('site.cart.checkout') }}" class="block">
                        <button
                            class="w-full bg-red-600 text-white text-xs font-semibold rounded px-3 py-2 mb-3 hover:bg-red-700">
                            Mua ngay
                        </button>
                    </a>
                    <div class="text-[9px] text-white bg-red-600 rounded px-2 py-0.5 mb-3 text-center">
                        Giao hàng tận nơi, hoá đơn điện tử
                    </div>
                    <button
                        class="w-full bg-blue-900 text-white text-xs font-semibold rounded px-3 py-2 mb-2 hover:bg-blue-800">
                        Trả góp 0% Qua thẻ tín dụng quốc tế
                    </button>
                    <button
                        class="w-full bg-blue-700 text-white text-xs font-semibold rounded px-3 py-2 hover:bg-blue-600">
                        Trả góp 0% qua thẻ Visa, Master Card, JCB, AMEX
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('title', 'Giỏ Hàng')
@section('header')
@endsection
@section('footer')
@endsection
