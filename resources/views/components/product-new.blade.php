<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
<div class="new-products-section container mt-5">
    <!-- Slider 2 banner mỗi lần -->
    <div class="swiper banner-swiper mb-4">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="{{ asset('https://beta-api.bachlongmobile.com/media/MageINIC/bannerslider/Banner-samsung_galaxy_tab-1200x200.jpg') }}"
                    class="img-fluid rounded shadow w-100" alt="Banner 1">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('https://beta-api.bachlongmobile.com/media/MageINIC/bannerslider/Banner-ipad_pro-1200x200.jpg') }}"
                    class="img-fluid rounded shadow w-100" alt="Banner 2">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('https://beta-api.bachlongmobile.com/media/MageINIC/bannerslider/Banner-oppo-1200x200.jpg') }}"
                    class="img-fluid rounded shadow w-100" alt="Banner 3">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('https://beta-api.bachlongmobile.com/media/MageINIC/bannerslider/Banner-xiaomi-1200x200.jpg') }}"
                    class="img-fluid rounded shadow w-100" alt="Banner 4">
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
                    <x-product-card :productitem="$product" />
                @endforeach
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12 text-center">
                <a href="#" class="view-all-btn">Xem thêm sản phẩm &gt;</a>
            </div>
        </div>
    </div>
</div>

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
