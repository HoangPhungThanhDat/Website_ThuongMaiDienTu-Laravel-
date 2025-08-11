<!-- filepath: d:\xampp\htdocs\Website_SmartPhone_LARAVEL\Website_SmartPhone_LARAVEL\resources\views\register.blade.php -->
<html lang="vi">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <title>Đăng ký Bạch Long Mobile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter&amp;display=swap" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-image: url('{{ asset('image/backgroundLG.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .form-container {
            padding: 16px; /* Giảm padding */
            width: 100%; /* Đặt chiều rộng 100% */
            max-width: 500px; /* Tăng chiều rộng tối đa */
        }

        .form-container label {
            margin-bottom: 2px; /* Giảm khoảng cách giữa label và input */
        }

        .form-container input,
        .form-container button {
            padding: 6px 10px; /* Giảm padding trong input và button */
        }

        .form-container .mb-5 {
            margin-bottom: 10px; /* Giảm khoảng cách giữa các trường */
        }
    </style>
</head>
<body class="bg-yellow-100 min-h-screen flex items-center justify-center p-6">
    <div class="bg-white rounded-xl w-full drop-shadow-md form-container">
        <p class="text-center text-gray-600 mb-2 text-base">
            Chào mừng đến
            <span class="font-semibold text-red-700">Bạch Long Mobile</span>
        </p>
        <h1 class="text-center font-extrabold text-2xl mb-3">Đăng ký</h1>
        <form action="{{ route('website.doregister') }}" method="post">
            @csrf
            <!-- Họ và tên -->
            <label class="block font-semibold text-gray-800" for="fullname">
                Họ và tên <span class="text-red-600">*</span>
            </label>
            <input type="text" class="w-full border border-gray-300 rounded-md mb-5 text-gray-400 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" id="fullname" placeholder="Nhập họ và tên" name="fullname" required>

            <!-- Tên đăng nhập -->
            <label class="block font-semibold text-gray-800" for="username">
                Tên đăng nhập <span class="text-red-600">*</span>
            </label>
            <input type="text" class="w-full border border-gray-300 rounded-md mb-5 text-gray-400 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" id="username" placeholder="Nhập tên đăng nhập" name="username" required>

            <!-- Email -->
            <label class="block font-semibold text-gray-800" for="email">
                Email <span class="text-red-600">*</span>
            </label>
            <input type="email" class="w-full border border-gray-300 rounded-md mb-5 text-gray-400 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" id="email" placeholder="Nhập email" name="email" required>

            <!-- Số điện thoại -->
            <label class="block font-semibold text-gray-800" for="phone">
                Số điện thoại <span class="text-red-600">*</span>
            </label>
            <input type="text" class="w-full border border-gray-300 rounded-md mb-5 text-gray-400 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" id="phone" placeholder="Nhập số điện thoại" name="phone" required>

            <!-- Mật khẩu -->
            <label class="block font-semibold text-gray-800" for="password">
                Mật khẩu <span class="text-red-600">*</span>
            </label>
            <div class="relative mb-5">
                <input type="password" class="w-full border border-gray-300 rounded-md px-4 py-2 pr-10 text-gray-400 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" id="password" placeholder="Nhập mật khẩu" name="password" required>
                <button aria-label="Hiển thị mật khẩu" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-600 toggle-password" tabindex="-1" type="button">
                    <i class="fas fa-eye"></i>
                </button>
            </div>

            <!-- Nhập lại mật khẩu -->
            <label class="block font-semibold text-gray-800" for="password_confirmation">
                Nhập lại mật khẩu <span class="text-red-600">*</span>
            </label>
            <div class="relative mb-5">
                <input type="password" class="w-full border border-gray-300 rounded-md px-4 py-2 pr-10 text-gray-400 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent" id="password_confirmation" placeholder="Nhập lại mật khẩu" name="password_confirmation" required>
                <button aria-label="Hiển thị mật khẩu" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-600 toggle-password" tabindex="-1" type="button">
                    <i class="fas fa-eye"></i>
                </button>
            </div>
            <!-- Giới tính -->
            <label class="block font-semibold text-gray-800" for="gender">
                Giới tính <span class="text-red-600">*</span>
            </label>
            <div class="flex items-center mb-5">
                <label class="flex items-center mr-4">
                    <input type="radio" name="gender" value="1" class="mr-2 focus:ring-blue-600" required> Nam
                </label>
                <label class="flex items-center">
                    <input type="radio" name="gender" value="2" class="mr-2 focus:ring-blue-600" required> Nữ
                </label>
            </div>

            <!-- Nút Đăng ký -->
            <button class="w-full bg-blue-700 text-white font-semibold py-2 rounded-md hover:bg-blue-800 transition-colors" type="submit">
                Đăng ký
            </button>
        </form>
        <p class="text-center text-sm mt-3 text-gray-800">
            Bạn đã có tài khoản?
            <a class="font-semibold text-blue-700 hover:underline" href="{{ route('website.getlogin') }}">
                Đăng nhập ngay
            </a>
        </p>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const togglePasswordButtons = document.querySelectorAll('.toggle-password');
    
            togglePasswordButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const input = this.previousElementSibling; // Lấy input ngay trước nút
                    const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
                    input.setAttribute('type', type);
    
                    // Đổi icon
                    this.querySelector('i').classList.toggle('fa-eye');
                    this.querySelector('i').classList.toggle('fa-eye-slash');
                });
            });
        });
    </script>
</body>
</html>