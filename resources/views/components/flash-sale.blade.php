

<div class="container my-5">
  <div class="highlight-products rounded-4 shadow-lg p-4 position-relative overflow-hidden">
<!-- Swiper Banner - Hiển thị 2 ảnh mỗi lần -->
<div class="container mt-4">
  <div class="swiper banner-top-swiper">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
        <img src="https://beta-api.bachlongmobile.com/media/MageINIC/bannerslider/Banner-LG-1200x200.jpg"
             class="banner-img" alt="Banner 1">
      </div>
      <div class="swiper-slide">
        <img src="https://beta-api.bachlongmobile.com/media/MageINIC/bannerslider/Banner-macbookpro-1200x200.jpg"
             class="banner-img" alt="Banner 2">
      </div>
      <div class="swiper-slide">
        <img src="https://beta-api.bachlongmobile.com/media/MageINIC/bannerslider/Banner-oppo-1200x200.jpg"
             class="banner-img" alt="Banner 3">
      </div>
      <div class="swiper-slide">
        <img src="https://beta-api.bachlongmobile.com/media/MageINIC/bannerslider/Banner-xiaomi-1200x200.jpg"
             class="banner-img" alt="Banner 4">
      </div>
    </div>
  </div>
</div>

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h1 style= "color: black" >Sale Sốc Hôm Nay</h1>
      <div class="header">
      
        <div class="countdown text-white">
          <span class="d-block mb-1">Kết thúc sau:</span>
          <div id="countdown-timer" >00 : 00 : 00</div>
        </div>
      </div>
    </div>

    <!-- Swiper Slider -->
    <div class="swiper product-carousel">
      <div class="swiper-wrapper">

        @foreach($product_flash_sale as $product)
        <div class="swiper-slide">
          <div class="bg-white rounded-lg p-3 product-card">

            <!-- Badge -->
            <div class="border border-danger rounded text-danger text-[10px] font-semibold px-2 py-[2px] w-max mb-2">
              Trả góp 0%
            </div>

            <!-- Image -->
            <a href="{{route('site.product.detail',['slug'=>$product->slug])}}">
            <img 
              class="mx-auto mb-2"
              src="{{ asset('images/products/' . $product->image) }}"
              width="150" height="180"
              alt="{{ $product->name }}"
            />
            </a>
            <!-- Promotion Tags -->
            <div class="d-flex justify-content-center mb-1 gap-1">
              <div class="bg-danger text-white px-1 rounded-sm text-[10px] fw-bold">TẾT THIẾU NHI</div>
              <div class="bg-warning text-dark px-1 rounded-sm text-[10px] fw-bold">ƯU ĐÃI HẾT Ý</div>
              <div class="bg-warning text-dark px-2 rounded-sm text-[14px] fw-bold">-500K</div>
            </div>

            <!-- Countdown -->
            <div class="bg-warning text-dark text-[11px] fw-semibold px-2 py-1 rounded mb-1">
              <i class="far fa-clock me-1"></i> Kết thúc: 01 Ngày - 10:02:11
            </div>

            <!-- Product Info -->
            <div class="text-[14px] fw-semibold text-dark mb-1">{{ $product->name }}</div>
            <div class="text-[13px] text-secondary mb-1">99,9% - Starlight</div>

            <!-- Pricing -->
            <div class="text-[16px] fw-bold text-danger mb-1">{{ number_format($product->price) }} VNĐ</div>
            <div class="text-[14px] text-muted text-decoration-line-through mb-1">17.990.000 VNĐ</div>
            <div class="border border-danger text-danger text-[11px] fw-semibold rounded px-2 py-1 w-max mb-1">-40%</div>

            <!-- Installment -->
            <div class="text-[12px] text-danger mb-1">
              Trả trước từ <span class="fw-semibold">1.089.000 VNĐ</span>
            </div>

            <!-- Stock Info -->
            <div class="bg-gradient rounded-pill text-[12px] fw-semibold text-dark px-3 py-1 mb-1" style="background: linear-gradient(to right, #ff7a00, #ffcc00);">
              <i class="fas fa-fire me-1"></i> Còn 1/20 sản phẩm
            </div>

            <!-- Promotion Note -->
            <div class="bg-light border border-danger-subtle rounded text-[12px] text-danger px-2 py-1 mb-1 text-center">
              Giá thu bằng giá bán - Trợ giá lên đến 100%
            </div>

            <!-- Rating -->
            <div class="d-flex justify-content-center text-warning text-[14px]">
              <i class="fas fa-star me-1"></i>
              <i class="fas fa-star me-1"></i>
              <i class="fas fa-star me-1"></i>
              <i class="fas fa-star me-1"></i>
              <i class="fas fa-star me-1"></i>
              <span class="text-[13px] fw-semibold text-dark ms-1">5</span>
            </div>

          </div>
        </div>
        @endforeach

      </div>

      <!-- Navigation -->
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>

  </div>
</div>

<!-- Swiper CDN -->
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- Script countdown + swiper -->
<script>
  function countdown() {
    const end = new Date().getTime() + 1000 * 60 * 60 * 24;
    const timer = document.getElementById("countdown-timer");
    setInterval(() => {
      const now = new Date().getTime();
      const diff = end - now;
      const hrs = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      const min = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
      const sec = Math.floor((diff % (1000 * 60)) / 1000);
      timer.innerText = `${hrs.toString().padStart(2, '0')} : ${min.toString().padStart(2, '0')} : ${sec.toString().padStart(2, '0')}`;
    }, 1000);
  }
  countdown();

  new Swiper('.product-carousel', {
    loop: true,
    spaceBetween: 20,
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    breakpoints: {
      0: { slidesPerView: 1 },
      576: { slidesPerView: 2 },
      768: { slidesPerView: 3 },
      992: { slidesPerView: 4 },
      1200: { slidesPerView: 5 }
    }
  });
</script>
<script>
  // Swiper hiển thị 2 banner một lúc
  new Swiper('.banner-top-swiper', {
    loop: true,
    spaceBetween: 20,
    autoplay: {
      delay: 4000,
      disableOnInteraction: false,
    },
    speed: 1000, // mượt mà hơn
    slidesPerView: 2,
    breakpoints: {
      0: {
        slidesPerView: 1
      },
      768: {
        slidesPerView: 2
      }
    }
  });
</script>

<!-- Style -->
<style>
  .highlight-products {
    background: linear-gradient(135deg, #ffe0ec, #ffd6e0); /* Nền hồng phấn */
  }

  .product-card img {
    transition: transform 0.3s ease, filter 0.3s ease;
    

    height: 180px;
  object-fit: contain;
  padding: 10px;
  }

  .product-card:hover img {
    transform: scale(1.05);
    filter: brightness(1.1);
  }

  .swiper-button-next,
  .swiper-button-prev {
    color: #fff;
    background: rgba(0, 0, 0, 0.4);
    border-radius: 50%;
    width: 40px;
    height: 40px;
    transition: background 0.3s;
  }

  .swiper-button-next:hover,
  .swiper-button-prev:hover {
    background: rgba(0, 0, 0, 0.6);
  }




  .banner-img {
  width: 100%;
  height: auto;
  object-fit: contain;
  border-radius: 5px;
  transition: transform 0.4s ease, box-shadow 0.3s ease;
  display: block;
  max-height: 200px;
}

.banner-img:hover {
  transform: scale(1.02);
  box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2);
}

/* Responsive container cho Swiper */
.banner-top-swiper {
  padding: 0 10px;
}





  
</style>
