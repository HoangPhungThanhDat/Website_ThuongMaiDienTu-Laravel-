<html lang="vi">
<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title>Đăng ký Bạch Long Mobile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter&amp;display=swap" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-image: url('{{ asset('image/backgroundLG.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .form-container {
            padding: 16px;
            width: 100%;
            max-width: 500px;
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
            <label class="block font-semibold text-gray-800" for="fullname">Họ và tên <span class="text-red-600">*</span></label>
            <input type="text" name="fullname" value="{{ old('fullname') }}"
                class="w-full border rounded-md px-3 py-2 mb-1 @error('fullname') border-red-500 @else border-gray-300 @enderror"
                placeholder="Nhập họ và tên" required>
            @error('fullname')
                <p class="text-red-500 text-sm mb-3">{{ $message }}</p>
            @enderror

            <!-- Tên đăng nhập -->
            <label class="block font-semibold text-gray-800" for="username">Tên đăng nhập <span class="text-red-600">*</span></label>
            <input type="text" name="username" value="{{ old('username') }}"
                class="w-full border rounded-md px-3 py-2 mb-1 @error('username') border-red-500 @else border-gray-300 @enderror"
                placeholder="Nhập tên đăng nhập" required>
            @error('username')
                <p class="text-red-500 text-sm mb-3">{{ $message }}</p>
            @enderror

            <!-- Email -->
            <label class="block font-semibold text-gray-800" for="email">Email <span class="text-red-600">*</span></label>
            <input type="email" name="email" value="{{ old('email') }}"
                class="w-full border rounded-md px-3 py-2 mb-1 @error('email') border-red-500 @else border-gray-300 @enderror"
                placeholder="Nhập email" required>
            @error('email')
                <p class="text-red-500 text-sm mb-3">{{ $message }}</p>
            @enderror

            <!-- Số điện thoại -->
            <label class="block font-semibold text-gray-800" for="phone">Số điện thoại <span class="text-red-600">*</span></label>
            <input type="text" name="phone" value="{{ old('phone') }}"
                class="w-full border rounded-md px-3 py-2 mb-1 @error('phone') border-red-500 @else border-gray-300 @enderror"
                placeholder="Nhập số điện thoại" required>
            @error('phone')
                <p class="text-red-500 text-sm mb-3">{{ $message }}</p>
            @enderror

            <!-- Mật khẩu -->
            <label class="block font-semibold text-gray-800" for="password">Mật khẩu <span class="text-red-600">*</span></label>
            <div class="relative mb-1">
                <input type="password" name="password"
                    class="w-full border rounded-md px-3 py-2 pr-10 @error('password') border-red-500 @else border-gray-300 @enderror"
                    placeholder="Nhập mật khẩu" required>
                <button type="button" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-600 toggle-password">
                    <i class="fas fa-eye"></i>
                </button>
            </div>
            @error('password')
                <p class="text-red-500 text-sm mb-3">{{ $message }}</p>
            @enderror

            <!-- Nhập lại mật khẩu -->
            <label class="block font-semibold text-gray-800" for="password_confirmation">Nhập lại mật khẩu <span class="text-red-600">*</span></label>
            <div class="relative mb-1">
                <input type="password" name="password_confirmation"
                    class="w-full border rounded-md px-3 py-2 pr-10 border-gray-300"
                    placeholder="Nhập lại mật khẩu" required>
                <button type="button" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-600 toggle-password">
                    <i class="fas fa-eye"></i>
                </button>
            </div>

            <!-- Giới tính -->
            <label class="block font-semibold text-gray-800">Giới tính <span class="text-red-600">*</span></label>
            <div class="flex items-center mb-1">
                <label class="flex items-center mr-4">
                    <input type="radio" name="gender" value="1" class="mr-2" {{ old('gender') == 1 ? 'checked' : '' }}> Nam
                </label>
                <label class="flex items-center">
                    <input type="radio" name="gender" value="2" class="mr-2" {{ old('gender') == 2 ? 'checked' : '' }}> Nữ
                </label>
            </div>
            @error('gender')
                <p class="text-red-500 text-sm mb-3">{{ $message }}</p>
            @enderror

            <!-- Nút Đăng ký -->
            <button class="w-full bg-blue-700 text-white font-semibold py-2 rounded-md hover:bg-blue-800 transition-colors"
                type="submit">Đăng ký</button>
        </form>

        <p class="text-center text-sm mt-3 text-gray-800">
            Bạn đã có tài khoản?
            <a class="font-semibold text-blue-700 hover:underline" href="{{ route('website.getlogin') }}">
                Đăng nhập ngay
            </a>
        </p>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const togglePasswordButtons = document.querySelectorAll('.toggle-password');
            togglePasswordButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const input = this.previousElementSibling;
                    const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
                    input.setAttribute('type', type);
                    this.querySelector('i').classList.toggle('fa-eye');
                    this.querySelector('i').classList.toggle('fa-eye-slash');
                });
            });
        });
    </script>
</body>
</html>
