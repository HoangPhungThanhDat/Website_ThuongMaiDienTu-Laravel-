<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />


<!-- Product Card -->
<div class="product-card">
  <!-- Top Badge -->
  <div class="top-badge">Trả góp 0%</div>

  <!-- Product Image -->
  <a href="{{route('site.product.detail',['slug'=>$product->slug])}}">
    <img
      src="{{asset('images/products/'.$product->image)}}"
      alt="{{$product->image}}"
      class="product-image"
      width="150"
      height="180"
    />
  </a>

  <!-- Promotion Tags -->
  <div class="promotion-tags">
    <div class="tag-red">TẾT THIẾU NHI</div>
    <div class="tag-yellow">ƯU ĐÃI HẾT Ý</div>
    <div class="discount-tag">-500K</div>
  </div>

  <!-- Countdown -->
  <div class="countdown">
    <i class="far fa-clock"></i> Kết thúc: 01 Ngày - 10:02:11
  </div>

  <!-- Product Title -->
  <div class="product-name">{{$product->name}}</div>
  <div class="product-desc">99,9% - Starlight</div>

  <!-- Price -->
  <div class="product-price">{{number_format($product->price)}} VNĐ</div>
  <div class="old-price">17.990.000 VNĐ</div>
  <div class="percent-off">-40%</div>

  <!-- Installment -->
  <div class="installment">Trả trước từ <span>1.089.000 VNĐ</span></div>

  <!-- Stock -->
  <div class="stock-info"><i class="fas fa-fire"></i> Còn 1/20 sản phẩm</div>

  <!-- Promotion Note -->
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



<style>
 /* Custom font sizes */
 .text-10px { font-size: 10px; line-height: 1.2; }
    .text-11px { font-size: 11px; line-height: 1.2; }
    .text-12px { font-size: 12px; line-height: 1.2; }
    .text-13px { font-size: 13px; line-height: 1.2; }
    .text-14px { font-size: 14px; line-height: 1.2; }
    .text-15px { font-size: 15px; line-height: 1.2; }
    .text-16px { font-size: 16px; line-height: 1.2; }


    .container {
        max-width: 1300px; /* Đặt kích thước tối đa cho container */
    }

    .row {
        margin: 0; /* Loại bỏ margin mặc định của hàng */
    }

    .col-md-3 {
        padding: 0 15px; /* Thêm padding bên trái và phải của cột */
    }

    .product-card {
    background-color: white;
    border-radius: 8px;
    padding: 12px;
    display: flex;
    flex-direction: column;
    transition: all 0.3s ease;
    border: 1px solid transparent;
  }

  .product-card:hover {
    border: 2px solid #b91c1c;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
  }

  .top-badge {
    border: 1px solid #b91c1c;
    color: #b91c1c;
    font-size: 10px;
    font-weight: 600;
    padding: 2px 6px;
    border-radius: 4px;
    width: max-content;
    margin-bottom: 8px;
  }

  .product-image {
    margin: 0 auto 8px auto;
    display: block;
    width: 100%; /* Đảm bảo hình ảnh chiếm toàn bộ chiều rộng container */
    height: 180px; /* Chiều cao cố định */
    object-fit: cover; /* Cắt hình ảnh để vừa với khung mà không bị méo */
    border-radius: 8px; /* Bo góc nhẹ để trông hiện đại hơn */
    background-color: #f8f8f8; /* Màu nền để tránh khoảng trống khi ảnh không tải */
}

  .promotion-tags {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 6px;
    gap: 4px;
  }

  .tag-red {
    background-color: #ff0040;
    color: white;
    font-size: 10px;
    font-weight: 800;
    padding: 2px 4px;
    border-radius: 2px;
  }

  .tag-yellow {
    background-color: #ffcc00;
    color: black;
    font-size: 10px;
    font-weight: 800;
    padding: 2px 4px;
    border-radius: 2px;
  }

  .discount-tag {
    background-color: #ffcc00;
    color: black;
    font-size: 14px;
    font-weight: 800;
    padding: 2px 6px;
    border-radius: 3px;
  }

  .countdown {
    background-color: #ffcc00;
    font-size: 11px;
    font-weight: 600;
    color: black;
    padding: 2px 6px;
    border-radius: 4px;
    margin-bottom: 6px;
  }

  .product-name {
    font-size: 14px;
    font-weight: 600;
    color: black;
    margin-bottom: 4px;
  }

  .product-desc {
    font-size: 13px;
    color: #555;
    margin-bottom: 6px;
  }

  .product-price {
    font-size: 16px;
    font-weight: 800;
    color: #b91c1c;
    margin-bottom: 4px;
  }

  .old-price {
    font-size: 14px;
    color: gray;
    text-decoration: line-through;
    margin-bottom: 4px;
  }

  .percent-off {
    font-size: 11px;
    font-weight: 600;
    color: #b91c1c;
    border: 1px solid #b91c1c;
    padding: 2px 6px;
    border-radius: 4px;
    width: max-content;
    margin-bottom: 6px;
  }

  .installment {
    font-size: 12px;
    color: #b91c1c;
    margin-bottom: 6px;
  }

  .installment span {
    font-weight: 600;
  }

  .stock-info {
    background: linear-gradient(to right, #ff7a00, #ffcc00);
    font-size: 12px;
    font-weight: 600;
    color: black;
    padding: 6px 12px;
    border-radius: 9999px;
    margin-bottom: 6px;
  }

  .note {
    background-color: #ffe6ef;
    border: 1px solid #ffb6c1;
    color: #d6336c;
    font-size: 12px;
    padding: 6px 8px;
    border-radius: 6px;
    text-align: center;
    margin-bottom: 6px;
  }

  .rating {
    display: flex;
    justify-content: center;
    align-items: center;
    color: #facc15;
    font-size: 14px;
  }

  .rating span {
    font-size: 13px;
    font-weight: 600;
    color: black;
    margin-left: 4px;
  }
</style>
