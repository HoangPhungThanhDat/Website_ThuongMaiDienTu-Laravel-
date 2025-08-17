<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.5.2-web/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layoutsize.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/menuDoc.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('public/jquery/jquery-3.7.1.min.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- SwiperJS CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- SwiperJS JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <link rel="icon" type="image/png" href="{{ asset('image/iconlogo.jpg') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <title>Bạch Long Mobile @yield('title')</title>
    @yield('header')
</head>

<body>
    <x-slider />

    <!-- Hiển thị sản phẩm -->
    <main>
        @yield('content')

        <!-- Hiển thị thông báo SweetAlert2 -->
        @if (session('success'))
            <script>
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: '🎉 {{ session('success') }}',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    customClass: {
                        popup: 'my-toast animated-toast'
                    },
                    showClass: {
                        popup: 'animate__animated animate__slideInRight'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__slideOutRight'
                    },
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer);
                        toast.addEventListener('mouseleave', Swal.resumeTimer);
                    }
                });
            </script>
        @endif
    </main>

    <footer class="section_footer text-dark py-2"
        style="background-color: #f8f9fa; margin-top: 20px; width: 100%; position: relative;">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h4>THÔNG TIN</h4>
                    <p>Apple Hoàng Đạt (H P T D)</p>
                    <p>Hệ thống bán lẻ smartphone, máy tính bảng, MacBook, thiết bị công nghệ chính hãng với giá tốt, có
                        trả góp 0%, giao hàng nhanh miễn phí.</p>
                    <p>Địa chỉ: Quận 9</p>
                    <p>Điện thoại: 1900 6750</p>
                    <p>Email: dat147714@gmail.com</p>
                    <p>Follower Chúng Tôi:</p>
                    <ul>
                        <li style="--clr: #ff0050;"><a href="#"><i class="fa-brands fa-tiktok"></i></a></li>
                        <li style="--clr: #55acee;"><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                        <li style="--clr: #0a66c2;"><a href="#"><i class="fa-brands fa-linkedin"></i></a></li>
                        <li style="--clr: #333333;"><a href="#"><i class="fa-brands fa-github"></i></a></li>
                    </ul>
                </div>
                <div class="col-md">
                    <h4>CHÍNH SÁCH</h4>
                    <p>Chính sách thanh toán</p>
                    <p>Chính sách bảo hành và bảo trì</p>
                    <p>Chính sách vận chuyển và giao nhận</p>
                    <p>Bảo mật thông tin cá nhân</p>
                </div>
                <div class="col-md">
                    <h4>HỖ TRỢ</h4>
                    <p>Sản phẩm yêu thích</p>
                    <p>So sánh sản phẩm</p>
                    <p>Hệ thống cửa hàng</p>
                    <p>Tra cứu bảo hành</p>
                    <p>Đăng nhập tài khoản</p>
                    <p>Liên hệ</p>
                </div>
                <div class="col-md">
                    <h4>MẠNG XÃ HỘI</h4>
                    <p>MUA ONLINE (08:00 - 21:00 mỗi ngày)</p>
                    <p>19006750</p>
                    <p>Tất cả các ngày trong tuần (Trừ tết Âm Lịch)</p>
                    <p>GÓP Ý & KHIẾU NẠI (08:30 - 20:30)</p>
                    <p>19006750</p>
                    <p>Tất cả các ngày trong tuần (Trừ tết Âm Lịch)</p>
                </div>
            </div>
            <hr class="m-0 p=0">
            <div class="row py-3 text-center">
                <div class="col-12">
                    Bản quyền thuộc về Apple Hoàng Đạt.
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    {{-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            AOS.init({
                duration: 1200,
                once: true
            });
        });
    </script> --}}
    <script src="{{ asset('js/layoutside.js') }}"></script>
    @yield('footer')
</body>

</html>
<style>
    @import url('https://use.fontawesome.com/releases/v6.5.1/css/all.css');

    body.footer ul {
        height: 100vh;
        margin: 0;
        display: grid;
        place-items: center;
    }

    footer ul li a {
        text-decoration: none;
    }

    footer ul {
        list-style: none;
        display: flex;
        gap: 20px;
    }

    footer ul li {
        width: 40px;
        height: 40px;
        color: var(--clr);
        line-height: 60px;
        border-radius: 12px;
        position: relative;
        transition: all .5s;
        box-shadow: 0px 8px 16px -6px, 0px 0px 16px -6px;
    }

    footer ul li a {
        width: 100%;
        height: 100%;
        font-size: 1.5em;
        background: transparent;
        color: var(--clr);
        display: flex;
        align-items: center;
        justify-content: center;
        transition: .5s;
        animation: icon-out .5s forwards;
        animation-timing-function: cubic-bezier(0.5, -0.6, 1, 1);
    }

    footer ul li:before {
        content: "";
        width: 110px;
        height: 110px;
        background: var(--clr);
        display: block;
        position: absolute;
        transform: rotate(-45deg) translate(-110%, -23px);
        z-index: -1;
        animation: back-out .5s forwards;
        animation-timing-function: cubic-bezier(0.5, -0.6, 1, 1);
    }

    footer ul li {
        overflow: hidden;
    }

    footer li:hover a {
        animation: icon-in .5s forwards;
        animation-timing-function: cubic-bezier(0, 0, 0.4, 1.6);
    }

    footer li:hover:before {
        animation: back-in .5s forwards;
        animation-timing-function: cubic-bezier(0, 0, 0.4, 1.6);
    }

    @keyframes back-in {
        0% {
            transform: rotate(-45deg) translate(-110%, -23px);
        }

        80% {
            transform: rotate(-45deg) translate(5%, -23px);
        }

        100% {
            transform: rotate(-45deg) translate(0%, -23px);
        }
    }

    @keyframes back-out {
        0% {
            transform: rotate(-45deg) translate(0%, -23px);
        }

        20% {
            transform: rotate(-45deg) translate(5%, -23px);
        }

        100% {
            transform: rotate(-45deg) translate(-120%, -23px);
        }
    }

    @keyframes icon-in {
        0% {
            font-size: 1.5em;
        }

        80% {
            color: #fff;
            font-size: 1.75em;
        }

        100% {
            color: #fff;
            font-size: 1.6em;
        }
    }

    @keyframes icon-out {
        0% {
            color: #fff;
            font-size: 1.6em;
        }

        20% {
            color: #fff;
            font-size: 1.75em;
        }

        100% {
            font-size: 1.5em;
        }
    }

    /* Custom style cho toast */
    .swal2-popup.my-toast {
        background-color: #f0fff4 !important;
        color: #166534;
        font-weight: bold;
        border-left: 6px solid #22c55e;
        box-shadow: 0 4px 12px rgba(34, 197, 94, 0.3);
        padding: 1rem;
        border-radius: 10px;
    }

    /* Màu thanh thời gian */
    .swal2-timer-progress-bar {
        background: #22c55e !important;
        height: 4px;
    }
</style>
