<!-- filepath: d:\xampp\htdocs\Website_SmartPhone_LARAVEL\Website_SmartPhone_LARAVEL\resources\views\fontend\checkout.blade.php -->
@extends('layouts.site')
@section('content')
<div class="max-w-[1200px] mx-auto p-4">
    <!-- Breadcrumb -->
    <div class="text-sm text-[#6B7280] mb-4 select-none">
        <span>Trang chủ</span>
        <span class="mx-1">›</span>
        <span>Thanh toán</span>
    </div>

    <h1 class="text-center text-2xl font-bold text-[#1E1E2D] mb-6">THÔNG TIN ĐẶT HÀNG </h1>

    <div class="flex flex-col lg:flex-row gap-6">
        <!-- Left: Danh sách sản phẩm -->
        <div class="flex-1 bg-white rounded-lg p-6 shadow-sm">
            <h2 class="text-lg font-semibold text-[#1E1E2D] mb-4">Sản phẩm trong giỏ hàng</h2>
            <table class="table-auto w-full text-xs text-[#6B7280] border-collapse">
                <thead>
                    <tr class="border-b border-[#E4E7F1]">
                        <th class="py-2 text-left">SẢN PHẨM</th>
                        <th class="py-2 text-center">SỐ LƯỢNG</th>
                        <th class="py-2 text-center">ĐƠN GIÁ</th>
                        <th class="py-2 text-center">TỔNG</th>
                    </tr>
                </thead>
                <tbody>
                    @php $totalMoney = 0; @endphp
                    @foreach($list_cart as $row_cart)
                    <tr class="border-b border-[#E4E7F1]">
                        <td class="py-2 flex items-center gap-3">
                            <img src="{{ asset('images/products/'.$row_cart['image']) }}" alt="{{ $row_cart['name'] }}" class="w-[60px] h-[60px] object-contain rounded">
                            <span class="text-[#1E1E2D] font-semibold">{{ $row_cart['name'] }}</span>
                        </td>
                        <td class="py-2 text-center">{{ $row_cart['qty'] }}</td>
                        <td class="py-2 text-center">{{ number_format($row_cart['price']) }}</td>
                        <td class="py-2 text-center">{{ number_format($row_cart['price'] * $row_cart['qty']) }}</td>
                    </tr>
                    @php $totalMoney += $row_cart['price'] * $row_cart['qty']; @endphp
                    @endforeach
                </tbody>
            </table>
            @if(count($list_cart) == 0)
            <div class="text-center py-10 text-gray-500">
                <i class="fas fa-shopping-cart text-4xl mb-3"></i><br/>
                Giỏ hàng của bạn đang trống.
            </div>
            @endif
        </div>

        <!-- Right: Thông tin thanh toán -->
        <div class="w-full lg:w-[320px] flex flex-col gap-6">
            <div class="bg-white rounded-lg p-6 shadow-sm">
                <h2 class="text-lg font-semibold text-[#1E1E2D] mb-4">Thông tin thanh toán</h2>
                @if(!Auth::check())
                <div class="text-center">
                    <h3 class="text-sm text-[#6B7280] mb-2">Hãy đăng nhập để thanh toán</h3>
                    <a href="{{ route('website.getlogin') }}" class="text-blue-600 hover:underline">Đăng Nhập</a>
                </div>
                @else
                <form action="{{ route('site.cart.docheckout') }}" method="post">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs text-[#6B7280] mb-1">Họ Tên:</label>
                            <input type="text" name="name" value="{{ Auth::user()->name }}" class="w-full border border-[#E4E7F1] rounded px-3 py-2 text-xs text-[#6B7280] focus:outline-none focus:ring-1 focus:ring-blue-600">
                        </div>
                        <div>
                            <label class="block text-xs text-[#6B7280] mb-1">Email:</label>
                            <input type="email" name="email" value="{{ Auth::user()->email }}" class="w-full border border-[#E4E7F1] rounded px-3 py-2 text-xs text-[#6B7280] focus:outline-none focus:ring-1 focus:ring-blue-600">
                        </div>
                        <div>
                            <label class="block text-xs text-[#6B7280] mb-1">Điện thoại:</label>
                            <input type="text" name="phone" value="{{ Auth::user()->phone }}" class="w-full border border-[#E4E7F1] rounded px-3 py-2 text-xs text-[#6B7280] focus:outline-none focus:ring-1 focus:ring-blue-600">
                        </div>
                        <div>
                            <label class="block text-xs text-[#6B7280] mb-1">Địa chỉ:</label>
                            <input type="text" name="address" value="{{ Auth::user()->address }}" class="w-full border border-[#E4E7F1] rounded px-3 py-2 text-xs text-[#6B7280] focus:outline-none focus:ring-1 focus:ring-blue-600">
                        </div>
                    </div>
                    <div class="mt-4">
                        <label class="block text-xs text-[#6B7280] mb-1">Chú ý:</label>
                        <textarea name="note" class="w-full border border-[#E4E7F1] rounded px-3 py-2 text-xs text-[#6B7280] focus:outline-none focus:ring-1 focus:ring-blue-600"></textarea>
                    </div>
                    <div class="mt-4 text-end">
                        <button type="submit" class="bg-red-600 text-white text-xs font-semibold rounded px-3 py-2 hover:bg-red-700">ĐẶT MUA</button>
                    </div>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@section('title', 'Thanh Toán')