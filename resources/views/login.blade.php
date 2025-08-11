<html lang="vi">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>
        Đăng nhập Bạch Long Mobile
    </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter&amp;display=swap" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-yellow-100 min-h-screen flex items-center justify-center p-6">
    <div class="bg-white rounded-xl max-w-md w-full p-8 drop-shadow-md" style="min-width: 320px">
        <p class="text-center text-gray-600 mb-2 text-base">
            Chào mừng đến
            <span class="font-semibold text-red-700">
                Bạch Long Mobile
            </span>
        </p>
        <h1 class="text-center font-extrabold text-2xl mb-6">
            Đăng nhập
        </h1>
        <form action="{{ route('website.dologin') }}" method="post">
            @csrf
            <label class="block font-semibold text-gray-800 mb-1" for="phoneEmail">
               Tên đăng nhập/email
                <span class="text-red-600">
                    *
                </span>
            </label>
            <input type="text"
                class="w-full border border-gray-300 rounded-md px-4 py-2 mb-5 text-gray-400 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                id="username" placeholder="nhập tên đăng nhập hoặc email" name="username">
            <label class="block font-semibold text-gray-800 mb-1" for="password">
                Mật khẩu
                <span class="text-red-600">
                    *
                </span>
            </label>
            <div class="relative mb-3">
                <input type="password"
                    class="w-full border border-gray-300 rounded-md px-4 py-2 pr-10 text-gray-400 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                    id="password" placeholder="mật khẩu" name="password">
                <button aria-label="Hiển thị mật khẩu"
                    class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-600 toggle-password" tabindex="-1"
                    type="button">
                    <i class="fas fa-eye"></i>
                </button>
            </div>
            <div class="flex justify-between items-center mb-6 text-sm text-gray-700">
                <label class="flex items-center gap-2 select-none">
                    <input class="w-4 h-4 border border-gray-300 rounded" type="checkbox" />
                    Ghi nhớ đăng nhập
                </label>
                <a class="hover:underline" href="#">
                    Quên mật khẩu ?
                </a>
            </div>
            <div class="flex justify-center gap-6 mb-6">
                <button aria-label="Đăng nhập bằng Facebook"
                    class="bg-gray-100 rounded-lg p-3 flex items-center justify-center w-12 h-12" type="button">
                    <img alt="Biểu tượng Facebook màu xanh dương" height="24"
                        src="data:image/png;base64,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"
                        width="24" />
                </button>
                <button aria-label="Đăng nhập bằng Google"
                    class="bg-gray-100 rounded-lg p-3 flex items-center justify-center w-12 h-12" type="button">
                    <img alt="Biểu tượng Google nhiều màu" height="24"
                        src="data:image/png;base64,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"
                        width="24" />
                </button>
            </div>
            <button
                class="w-full bg-blue-700 text-white font-semibold py-3 rounded-md hover:bg-blue-800 transition-colors"
                type="submit">
                Đăng nhập
            </button>
        </form>
        <p class="text-center text-sm mt-5 text-gray-800">
            Bạn chưa có tài khoản?
            <a class="font-semibold text-blue-700 hover:underline" href="{{ route('website.getregister') }}">
                Đăng ký ngay
            </a>
        </p>
    </div>


    {{-- // Thêm script để hiển thị/ẩn mật khẩu --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword = document.querySelector('.toggle-password');
            const passwordInput = document.getElementById('password');

            togglePassword.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);

                // Đổi icon
                this.querySelector('i').classList.toggle('fa-eye');
                this.querySelector('i').classList.toggle('fa-eye-slash');
            });
        });
    </script>
    <!-- Hiển thị thông báo SweetAlert2 -->
    @if (session('error'))
        <script>
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'error',
                title: '❌ {{ session('error') }}',
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
</body>

</html>


<style>
    body {
        font-family: 'Inter', sans-serif;
        background-image: url('{{ asset('image/backgroundLG.jpg') }}');
        /* Đường dẫn đến hình ảnh */
        background-size: cover;
        /* Đảm bảo hình ảnh phủ toàn bộ màn hình */
        background-position: center;
        /* Căn giữa hình ảnh */
        background-repeat: no-repeat;
        /* Không lặp lại hình ảnh */
    }

    /* Custom style cho toast */
    .swal2-popup.my-toast {
        background-color: #fff4f4 !important;
        color: #b91c1c;
        font-weight: bold;
        border-left: 6px solid #ef4444;
        box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
        padding: 1rem;
        border-radius: 10px;
    }

    /* Màu thanh thời gian */
    .swal2-timer-progress-bar {
        background: #ef4444 !important;
        height: 4px;
    }
</style>
