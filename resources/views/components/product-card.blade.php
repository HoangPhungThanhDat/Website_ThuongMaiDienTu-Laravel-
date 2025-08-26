<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
<link rel="stylesheet" href="{{ asset('css/product-card.css') }}">
<!-- Product Card -->
<div class="product-card">
    <div class="top-badge">Trả góp 0%</div>
    <a href="{{ route('site.product.detail', ['slug' => $product->slug]) }}">
        <img src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->image }}" class="product-image"
            width="150" height="180" />
    </a>
    <div class="promotion-tags">
        <div class="tag-red">TẾT THIẾU NHI</div>
        <div class="tag-yellow">ƯU ĐÃI HẾT Ý</div>
        <div class="discount-tag">-500K</div>
    </div>
    <div class="countdown">
        <i class="far fa-clock"></i> Kết thúc: 01 Ngày - 10:02:11
    </div>
    <div class="product-name">{{ $product->name }}</div>
    <div class="product-desc">99,9% - Starlight</div>
    <div class="product-price">{{ number_format($product->price) }} VNĐ</div>
    <div class="old-price">17.990.000 VNĐ</div>
    <div class="percent-off">-40%</div>
    <div class="installment">Trả trước từ <span>1.089.000 VNĐ</span></div>
    <div class="stock-info"><i class="fas fa-fire"></i> Còn 1/20 sản phẩm</div>
    <div class="note">Giá thu bằng giá bán - Trợ giá lên đến 100%</div>

    <!-- Rating -->
    <div class="rating">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <span>5</span>
    </div>
</div>
