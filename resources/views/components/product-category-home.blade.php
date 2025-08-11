<div class="container mt-5">
    <div class="row">
        @foreach($category_list as $cat_row)
        <!-- BANNER CHUYỂN ĐỘNG 2 ẢNH -->
        <div class="banner-slider mb-4">
            <div class="banner-wrapper" id="bannerWrapper-{{ $cat_row->id }}">
                <div class="banner-group fade active">
                    <img src="{{ asset('https://beta-api.bachlongmobile.com/media/MageINIC/bannerslider/Banner-dongho-apple-1200x200.jpg') }}" alt="Banner 1" class="banner-img">
                    <img src="{{ asset('https://beta-api.bachlongmobile.com/media/MageINIC/bannerslider/Banner-dongho-apple-1200x200.jpg') }}" alt="Banner 2" class="banner-img">
                </div>
                <div class="banner-group fade">
                    <img src="{{ asset('https://beta-api.bachlongmobile.com/media/MageINIC/bannerslider/Banner-ipad_pro-1200x200.jpg') }}" alt="Banner 3" class="banner-img">
                    <img src="{{ asset('https://beta-api.bachlongmobile.com/media/MageINIC/bannerslider/Banner-samsung_galaxy_tab-1200x200.jpg') }}" alt="Banner 4" class="banner-img">
                </div>
                <div class="banner-group fade">
                    <img src="{{ asset('https://beta-api.bachlongmobile.com/media/MageINIC/bannerslider/Banner-oppo-1200x200.jpg') }}" alt="Banner 3" class="banner-img">
                    <img src="{{ asset('https://beta-api.bachlongmobile.com/media/MageINIC/bannerslider/Banner-xiaomi-1200x200.jpg') }}" alt="Banner 4" class="banner-img">
                </div>
            </div>
        </div>
            <div class="col-12 category-section p-4 mb-5">

                <h2 class="category-title">{{ $cat_row->name }}</h2>
                <x-product-category :catrow="$cat_row" />

                <div class="text-center mt-3">
                    <a href="{{ route('site.product.category', ['slug' => $cat_row->slug]) }}" class="view-all-btn">
                        Xem thêm sản phẩm &gt;
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>

<style>
    .category-section {
        background: linear-gradient(135deg, #fff7ee, #fef3e7);
        border-radius: 15px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        transition: box-shadow 0.3s ease, transform 0.3s ease;
    }

    .category-section:hover {
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.12);
        transform: translateY(-2px);
    }

    .category-title {
        font-size: 24px;
        font-weight: bold;
        color: #333;
        border-bottom: 2px solid #e0cfc2;
        padding-bottom: 10px;
        margin-bottom: 20px;
    }

    .view-all-btn {
        display: inline-block;
        padding: 10px 24px;
        border: 2px solid #333;
        border-radius: 25px;
        font-size: 16px;
        font-weight: 500;
        color: #333;
        text-decoration: none;
        background-color: transparent;
        transition: all 0.3s ease;
    }

    .view-all-btn:hover {
        background-color: #333;
        color: #fff;
        transform: scale(1.05);
    }

    /* Banner */
    .banner-slider {
        overflow: hidden;
        border-radius: 12px;
        position: relative;
    }

    .banner-wrapper {
        position: relative;
        width: 100%;
        height: auto;
    }

    .banner-group {
        display: flex;
        justify-content: space-between;
        gap: 12px;
        opacity: 0;
        transition: opacity 1s ease;
        position: absolute;
        width: 100%;
        top: 0;
        left: 0;
        pointer-events: none;
    }

    .banner-group img {
 
        width: 49%;
        height: auto;
        object-fit: contain;
        border-radius: 5px;
        transition: transform 0.4s ease, box-shadow 0.3s ease;
        display: block;
        max-height: 200px;
    }

    .banner-group.active {
        opacity: 1;
        pointer-events: auto;
        position: relative;
    }

    .banner-img:hover {
        transform: scale(1.02);
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        @foreach($category_list as $cat_row)
            const wrapper{{ $cat_row->id }} = document.querySelector("#bannerWrapper-{{ $cat_row->id }}");
            const groups{{ $cat_row->id }} = wrapper{{ $cat_row->id }}.querySelectorAll(".banner-group");
            let current{{ $cat_row->id }} = 0;

            setInterval(() => {
                // Ẩn nhóm hiện tại
                groups{{ $cat_row->id }}[current{{ $cat_row->id }}].classList.remove("active");
                // Chuyển sang nhóm tiếp theo
                current{{ $cat_row->id }} = (current{{ $cat_row->id }} + 1) % groups{{ $cat_row->id }}.length;
                // Hiển thị nhóm mới
                groups{{ $cat_row->id }}[current{{ $cat_row->id }}].classList.add("active");
            }, 5000); // Chuyển đổi sau mỗi 5 giây
        @endforeach
    });
</script>
