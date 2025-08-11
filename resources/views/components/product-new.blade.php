<!-- Thêm vào phần <head> hoặc trên cùng file Blade nếu chưa có -->
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"
  />
  
  <div class="new-products-section container mt-5">
  
      <!-- Slider 2 banner mỗi lần -->
      <div class="swiper banner-swiper mb-4">
          <div class="swiper-wrapper">
              <div class="swiper-slide">
                  <img src="{{ asset('https://beta-api.bachlongmobile.com/media/MageINIC/bannerslider/Banner-samsung_galaxy_tab-1200x200.jpg') }}" class="img-fluid rounded shadow w-100" alt="Banner 1">
              </div>
              <div class="swiper-slide">
                  <img src="{{ asset('https://beta-api.bachlongmobile.com/media/MageINIC/bannerslider/Banner-ipad_pro-1200x200.jpg') }}" class="img-fluid rounded shadow w-100" alt="Banner 2">
              </div>
              <div class="swiper-slide">
                  <img src="{{ asset('https://beta-api.bachlongmobile.com/media/MageINIC/bannerslider/Banner-oppo-1200x200.jpg') }}" class="img-fluid rounded shadow w-100" alt="Banner 3">
              </div>
              <div class="swiper-slide">
                  <img src="{{ asset('https://beta-api.bachlongmobile.com/media/MageINIC/bannerslider/Banner-xiaomi-1200x200.jpg') }}" class="img-fluid rounded shadow w-100" alt="Banner 4">
              </div>
          </div>
      </div>
  
      <div class="highlight-products shadow-box">
          <div class="header mb-4 d-flex justify-content-between align-items-center">
              <h2 class="section-title">Sản Phẩm Mới Nhất</h2>
          </div>
  
          <div class="container mx-auto p-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
                @foreach ($product_new as $product)
                    <x-product-card :productitem="$product"/>
                @endforeach
            </div>
        </div>

  
          <div class="row mt-4">
              <div class="col-12 text-center">
                  <a href="#" class="view-all-btn">Xem thêm sản phẩm &gt;</a>
              </div>
          </div>
  
          {{-- <div class="banner mt-4 text-center">
              <img src="{{ asset('image/banner25.webp') }}" alt="Banner" class="img-fluid rounded shadow" style="max-width: 100%; height: auto;">
          </div> --}}
      </div>
  </div>
  
  <style>
      .view-all-btn {
          display: inline-block;
          padding: 12px 28px;
          border: 2px solid #000;
          border-radius: 30px;
          font-size: 16px;
          font-weight: 500;
          color: #000;
          text-decoration: none;
          background-color: transparent;
          transition: all 0.3s ease;
      }
  
      .view-all-btn:hover {
          background-color: #000;
          color: #fff;
          transform: scale(1.05);
      }
  
      .highlight-products {
          background: linear-gradient(135deg, #fff5e6, #ffeedd);
          padding: 30px;
          border-radius: 15px;
          box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
          transition: all 0.3s ease;
      }
  
      .highlight-products:hover {
          box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
          transform: translateY(-2px);
      }
  
      .section-title {
          font-size: 28px;
          font-weight: bold;
          color: #2e2e2e;
      }
  
      /* Swiper Banner style */
  

.swiper-slide img {
    max-height: 100%;
    max-width: 100%;
    object-fit: contain; /* giữ nguyên tỉ lệ, không cắt */
    border-radius: 15px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

  
      .swiper-slide img:hover {
          transform: scale(1.03);
          box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
      }
  
      @media (max-width: 768px) {
          .swiper-slide img {
              height: 160px;
          }
      }
  </style>
  
  <!-- Swiper JS CDN -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
  <script>
      const swiper = new Swiper(".banner-swiper", {
          loop: true,
          autoplay: {
              delay: 5000,
              disableOnInteraction: false,
          },
          slidesPerView: 2,
          spaceBetween: 20,
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
  