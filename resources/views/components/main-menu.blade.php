<div class="header-wrapper">
    <div class="top-banner-alert">
        🔥 Khuyến mãi cực sốc: Giảm đến 50% cho đơn hàng đầu tiên trong hôm nay!
    </div>
    <header>
        <!-- Logo -->
        <a href="#" class="logo" aria-label="Bach Long Mobile logo">
            <img src="https://bachlongmobile.com/assets/images/logo/logo-website-1.png"
                alt="Logo Bach Long Mobile màu vàng đỏ" width="120" height="40" />
        </a>

        <!-- Nút Danh Mục -->
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

        <!-- Liên kết Chức Năng -->
        <nav class="header-links" aria-label="Liên kết chức năng chính">
            <a href="{{ route('site.home') }}" class="header-link"><i class="fas fa-home"></i> Trang chủ</a>

            <!-- Chính sách -->
            <div class="dropdown">
                <a href="#" class="header-link"><i class="fas fa-file-contract"></i> Chính sách</a>
                <div class="dropdown-content">
                    <a href="{{ route('site.post.index') }}">Chính sách đổi trả</a>
                    <a href="{{ route('site.post.topic', ['slug' => 'tin-tuc']) }}">Chính sách bảo hành</a>
                    <a href="{{ route('site.lienhe') }}">Liên hệ</a>
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
                        <li><a class="dropdown-item" href="{{ route('website.profile') }}">Quản lý thông tin cá nhân</a></li>
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
    document.addEventListener('DOMContentLoaded', function () {
    const dropdownToggle = document.querySelector('#userDropdown');
    dropdownToggle.addEventListener('click', function () {
        const dropdownMenu = this.nextElementSibling;
        dropdownMenu.classList.toggle('show');
    });
});
</script>
<!-- CSS Dropdown Style -->
<style>
    .header-wrapper {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;

        z-index: 999;
    }

    .top-banner-alert {
        background: linear-gradient(90deg, #ff4e50, #f9d423);
        color: white;
        padding: 8px 12px;
        font-weight: bold;
        text-align: center;
        font-size: 15px;
        animation: pulse 3s infinite;

    }

    @keyframes pulse {

        0%,
        100% {
            opacity: 1;
        }

        50% {
            opacity: 0.8;
        }
    }



    header {
        background-color: #e4e2d6;
        padding: 8px 12px;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        /* Đảm bảo các phần tử không bị tràn khi thu nhỏ */
        max-width: 1500px;
        /* Giới hạn chiều rộng tối đa */
        margin: 0 auto;
        /* Căn giữa menu */
    }

    .header-wrapper {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 999;
        background-color: #e4e2d6;
        /* Đảm bảo màu nền menu */
    }

    .logo {
        flex-shrink: 0;
        margin-right: 12px;
    }

    .search-bar {
        flex-grow: 1;
        max-width: 400px;
        margin: 0 12px;
        display: flex;
        align-items: center;
    }

    .category-btn {
        background-color: #faf9f5;
        border: none;
        font-weight: 700;
        font-size: 14px;
        padding: 8px 12px;
        border-radius: 6px;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .search-input {
        flex-grow: 1;
        height: 36px;
        border: none;
        border-radius: 6px 0 0 6px;
        padding: 0 12px;
        font-size: 14px;
    }

    .search-btn {
        background-color: #0a122a;
        border: none;
        border-radius: 0 6px 6px 0;
        width: 40px;
        height: 36px;
        cursor: pointer;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .search-btn i {
        color: #fff;
    }

    /* Header Links */
    .header-links {
        display: flex;
        gap: 16px;
        flex-wrap: wrap;
        align-items: center;
    }

    .header-link {
        position: relative;
        background-color: #f9f9f8;
        border-radius: 6px;
        padding: 8px 12px;
        font-size: 12px;
        font-weight: 700;
        color: #222;
        display: flex;
        align-items: center;
        gap: 6px;
        text-decoration: none;
        transition: background-color 0.2s ease;
    }

    .header-link:hover {
        background-color: #dcdcdc;
    }

    /* Dropdown */
    .dropdown {
        position: relative;
    }

    .dropdown-content {
        opacity: 0;
        visibility: hidden;
        position: absolute;
        top: 120%;
        left: 0;
        min-width: 200px;
        background-color: #ffffff;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        border-radius: 10px;
        z-index: 999;
        transform: translateY(10px);
        transition: opacity 0.3s ease, transform 0.3s ease, visibility 0.3s ease;
        padding: 8px 0;
    }

    .dropdown-content a {
        display: block;
        padding: 10px 20px;
        font-size: 14px;
        color: #333;
        text-decoration: none;
        white-space: nowrap;
        transition: background-color 0.2s ease, color 0.2s ease;
    }

    .dropdown-content a:hover {
        background-color: #f5f5f5;
        color: #007bff;
    }

    .dropdown:hover .dropdown-content {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    /* Cart count style */
    .header-link.cart {
        position: relative;
    }

    .header-link.cart .cart-count {
        position: absolute;
        top: 2px;
        right: 6px;
        background: #f00;
        color: #fff;
        font-size: 10px;
        font-weight: 700;
        padding: 1px 5px;
        border-radius: 50%;
    }














    .category-menu-wrapper {
        position: relative;
        display: inline-block;
    }

    .category-btn {
        background: #f7c600;
        border: none;
        padding: 10px 15px;
        cursor: pointer;
        font-weight: bold;
        color: #000;
        display: flex;
        align-items: center;
        gap: 5px;
        border-radius: 4px;
        transition: background-color 0.3s ease;
    }

    .category-btn:hover {
        background-color: #e6b800;
    }

    /* Mega Menu style */
    .mega-menu {
        position: absolute;
        top: 100%;
        left: 0;
        width: 800px;
        background-color: white;
        padding: 20px 30px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        border-radius: 8px;

        /* Ẩn mặc định */
        opacity: 0;
        pointer-events: none;
        transform: translateY(20px);
        transition: opacity 0.3s ease, transform 0.3s ease;
        display: flex;
        gap: 30px;
        z-index: 1000;
    }

    .category-menu-wrapper:hover .mega-menu {
        opacity: 1;
        pointer-events: auto;
        transform: translateY(0);
    }

    .mega-column {
        flex: 1;
    }

    .mega-column h4 {
        margin-bottom: 12px;
        font-weight: 700;
        color: #222;
        font-size: 1.1rem;
    }

    .mega-column ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .mega-column ul li {
        margin-bottom: 10px;
    }

    .mega-column ul li a {
        text-decoration: none;
        color: #555;
        font-weight: 500;
        transition: color 0.3s ease;
    }

    .mega-column ul li a:hover {
        color: #f7c600;
    }
</style>
