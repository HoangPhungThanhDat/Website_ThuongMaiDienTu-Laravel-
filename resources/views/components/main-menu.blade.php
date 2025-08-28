<div class="header-wrapper">
    <div class="top-banner-alert">
        🔥 Khuyến mãi cực sốc: Giảm đến 50% cho đơn hàng đầu tiên trong hôm nay!
    </div>
    <header>
        <a href="{{ route('site.home') }}" class="logo" aria-label="Bach Long Mobile logo">
            <img src="https://bachlongmobile.com/assets/images/logo/logo-website-1.png"
                alt="Logo Bach Long Mobile màu vàng đỏ" width="120" height="40" />
        </a>
        <!-- Nút Danh Mục -->
        <div class="category-menu-wrapper">
            <button class="category-btn" aria-label="Danh mục sản phẩm">
                <i class="fas fa-bars" aria-hidden="true"></i> Danh mục
            </button>
            <!-- Mega Menu -->
            <div class="mega-menu">
                <div class="mega-column">
                    <h4>Điện thoại</h4>
                    <ul>
                        <li><a href="{{ route('site.product.category', ['slug' => 'dien-thoai-iphone']) }}">iPhone</a>
                        </li>
                        <li><a href="{{ route('site.product.category', ['slug' => 'dien-thoai-samsung']) }}">Samsung</a>
                        </li>
                        <li><a href="#">Xiaomi</a></li>
                    </ul>
                </div>
                <div class="mega-column">
                    <h4>Phụ kiện</h4>
                    <ul>
                        <li><a href="#">Ốp lưng</a></li>
                        <li><a href="#">Sạc dự phòng</a></li>
                        <li><a href="#">Tai nghe</a></li>
                    </ul>
                </div>
                <div class="mega-column">
                    <h4>Dịch vụ</h4>
                    <ul>
                        <li><a href="#">Sửa chữa</a></li>
                        <li><a href="#">Bảo hành</a></li>
                        <li><a href="#">Đổi trả</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Thanh Tìm Kiếm -->
        <form class="search-bar" role="search" aria-label="Tìm kiếm sản phẩm">
            <input type="search" class="search-input" placeholder="Bạn cần tìm sản phẩm gì..."
                aria-label="Tìm kiếm sản phẩm" />
            <button type="submit" class="search-btn" aria-label="Tìm kiếm">
                <i class="fas fa-search"></i>
            </button>
        </form>
        <nav class="header-links" aria-label="Liên kết chức năng chính">
            <a href="{{ route('site.home') }}" class="header-link"><i class="fas fa-home"></i> Trang chủ</a>

            <!-- Chính sách -->
            <div class="dropdown">
                <a href="#" class="header-link"><i class="fas fa-file-contract"></i> Chính sách</a>
                <div class="dropdown-content">
                    <a href="{{ route('site.post.index') }}">Chính sách đổi trả</a>
                    <a href="{{ route('site.post.topic', ['slug' => 'tin-tuc']) }}">Chính sách bảo hành</a>
                    <a href="{{ route('site.lienhe') }}">Liên hệ</a>
                    <a href="{{ route('site.lienhe') }}">Giới thiệu về chúng tôi </a>
                </div>
            </div>

            <!-- Bài viết -->
            <div class="dropdown">
                <a href="#" class="header-link"><i class="fas fa-newspaper"></i> Bài viết</a>
                <div class="dropdown-content">
                    <a href="{{ route('site.post.index') }}">Tất cả bài viết</a>
                    <a href="{{ route('site.post.topic', ['slug' => 'tin-tuc']) }}">Tin tức</a>
                    <a href="{{ route('site.post.topic', ['slug' => 'dich-vu']) }}">Dịch vụ</a>
                </div>
            </div>

            <!-- Sản phẩm -->
            <div class="dropdown">
                <a href="#" class="header-link"><i class="fas fa-box-open"></i> Sản phẩm</a>
                <div class="dropdown-content">
                    <a href="{{ route('site.sanpham') }}">Tất cả sản phẩm</a>
                    <a href="{{ route('site.product.category', ['slug' => 'dien-thoai-iphone']) }}">iPhone</a>
                    <a href="{{ route('site.product.category', ['slug' => 'dien-thoai-samsung']) }}">Samsung</a>
                </div>
            </div>

            <!-- Thương hiệu -->
            <div class="dropdown">
                <a href="#" class="header-link"><i class="fas fa-industry"></i> Thương hiệu</a>
                <div class="dropdown-content">
                    <a href="{{ route('site.product.brand', ['slug' => 'han-quoc']) }}">Hàn Quốc</a>
                    <a href="{{ route('site.product.brand', ['slug' => 'viet-nam']) }}">Việt Nam</a>
                </div>
            </div>

            <!-- Giỏ hàng -->
            @php $count = count(session('carts', [])); @endphp
            <a class="header-link cart" aria-label="Giỏ hàng" href="{{ route('site.cart.index') }}">
                <i class="fas fa-shopping-cart"></i> <strong>Giỏ hàng</strong> (<span
                    id="showqty">{{ $count }}</span>)
            </a>

            <!-- Đăng nhập / Đăng xuất -->
            @if (Auth::check())
                @php $user = Auth::user(); @endphp
                <div class="header-link dropdown d-flex align-items-center gap-2">
                    <span class="navbar-text dropdown-toggle" id="userDropdown" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fa-solid fa-user"></i>
                        <strong>{{ $user->name }}</strong>
                    </span>
                    <ul class="dropdown-menu" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="{{ route('website.profile') }}">Quản lý thông tin cá
                                nhân</a></li>
                        <li><a class="dropdown-item" href="{{ route('website.logout') }}">Đăng xuất</a></li>
                    </ul>
                </div>
            @else
                <a class="header-link" href="{{ route('website.getlogin') }}">
                    <i class="fa-solid fa-sign-in-alt"></i> Đăng nhập
                </a>
            @endif
        </nav>
    </header>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dropdownToggle = document.querySelector('#userDropdown');
        dropdownToggle.addEventListener('click', function() {
            const dropdownMenu = this.nextElementSibling;
            dropdownMenu.classList.toggle('show');
        });
    });
</script>
