@extends('layouts.site')
@section('content')
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
<style>
    .nav-pills .nav-link.active {
        background-color: #e9ecef !important; /* xám nhạt */
        color: #212529 !important; /* chữ đen */
    }

    .nav-pills .nav-link {
        border-radius: 0.375rem; /* làm bo nhẹ */
    }

    .nav-pills .nav-link:hover {
        background-color: #f8f9fa; /* màu khi hover */
    }
</style>
<body class="bg-gray-100 font-sans text-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <nav class="text-sm mb-6">
            <a class="text-blue-600 hover:underline" href="#">Trang chủ</a>
            <span class="mx-1">/</span>
            <span>Tài khoản</span>
        </nav>
        <div class="flex flex-col md:flex-row md:space-x-8">
            <!-- Left sidebar -->
            <div class="flex-shrink-0 w-full md:w-72 space-y-6">
                <!-- User info -->
                <div class="bg-white rounded-lg p-4 shadow-sm">
                    <div class="flex items-center space-x-3 mb-3">
                        <div class="w-12 h-12 rounded-full bg-orange-300 flex items-center justify-center relative">
                            <div class="w-5 h-5 rounded-full bg-orange-600 absolute top-3 left-1/2 -translate-x-1/2"></div>
                            <div class="w-8 h-4 rounded-b-full bg-purple-900 absolute bottom-1 left-1/2 -translate-x-1/2"></div>
                        </div>
                        <div>
                            <p class="font-semibold text-sm leading-tight">{{ $user->name }}</p>
                            <p class="text-gray-500 text-xs leading-tight">{{ $user->phone ?? 'Chưa cập nhật' }}</p>
                        </div>
                        <a class="text-blue-600 text-sm hover:underline" href="#">
                            Xem hồ sơ
                        </a>
                    </div>
                    <div class="bg-red-50 rounded-md p-3 flex items-center space-x-3">
                        <div class="flex-1 text-xs text-gray-700 leading-tight">
                            <p class="font-semibold mb-1">Quý khách chưa là thành viên tại Bạch Long Shop</p>
                            <p>Quan tâm Zalo Bạch Long Shop để kích hoạt điểm thưởng</p>
                        </div>
                        <img class="w-14 h-14 object-contain"
                             src="https://storage.googleapis.com/a1aa/image/2cf26935-2f3a-47ae-c300-4ebea96d2073.jpg"
                             alt="Gift image">
                    </div>
                    <div class="flex items-center justify-between mt-3">
                        <button class="bg-red-600 text-white text-xs font-semibold px-4 py-2 rounded-md hover:bg-red-700 transition">Quan tâm ngay</button>
                        <a class="text-blue-600 text-xs hover:underline" href="#">Xem thê lệ &gt;</a>
                    </div>
                </div>

                <!-- Navigation menu with Bootstrap Tabs -->
                <div class="bg-white rounded-lg p-4 shadow-sm nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active text-dark" data-bs-toggle="pill" href="#orders" role="tab"><i class="fas fa-box-open"></i> Đơn hàng của tôi</a>
                    <a class="nav-link text-dark" data-bs-toggle="pill" href="#services" role="tab"><i class="fas fa-file-invoice-dollar"></i> Dịch vụ thu hộ</a>
                    <a class="nav-link text-dark" data-bs-toggle="pill" href="#loyalty" role="tab"><i class="fas fa-heart"></i> Khách hàng thân thiết</a>
                    <a class="nav-link text-dark" data-bs-toggle="pill" href="#addresses" role="tab"><i class="fas fa-map-marker-alt"></i> Sổ địa chỉ</a>
                    <a class="nav-link text-dark" data-bs-toggle="pill" href="#warranty" role="tab"><i class="fas fa-shield-alt"></i> Thông tin bảo hành</a>
                    @if (Auth::check() && Auth::user()->roles === 'admin')
                        <a class="nav-link text-dark" href="{{ route('admin.dashbread') }}"><i class="fas fa-user-shield"></i> Quản trị admin</a>
                    @endif
                    <a class="nav-link text-dark" href="{{ route('website.logout') }}"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
                </div>
            </div>

            <!-- Right content area (tab content) -->
            <div class="tab-content flex-1 mt-6 md:mt-0">
                <div class="tab-pane fade show active" id="orders" role="tabpanel">
                    <h2 class="text-xl font-bold mb-4"  >
                        Thông tin cá nhân
                    </h2>
                    <div class="bg-white rounded-lg p-8 shadow-sm max-w-3xl mx-auto">
                        <div class="flex justify-center mb-6">
                            <div aria-label="User avatar with orange circle head and dark purple body"
                                class="w-20 h-20 rounded-full bg-orange-300 flex items-center justify-center relative">
                                <div class="w-8 h-8 rounded-full bg-orange-600 absolute top-6 left-1/2 -translate-x-1/2">
                                </div>
                                <div
                                    class="w-12 h-6 rounded-b-full bg-purple-900 absolute bottom-2 left-1/2 -translate-x-1/2">
                                </div>
                                <div class="absolute top-0 left-0 w-full h-full rounded-full opacity-20">
                                    <svg class="w-full h-full" fill="none" stroke="currentColor" stroke-width="1"
                                        viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="12" cy="7" fill="none" r="3" stroke="none">
                                        </circle>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-3 gap-x-6 gap-y-4 text-gray-600 text-sm">
                            <div class="col-span-1 flex items-center border-b border-gray-200 pb-2">
                                Họ và tên
                            </div>
                            <div class="col-span-2 flex items-center border-b border-gray-200 pb-2 font-normal">
                                {{ $user->name }}
                            </div>
                            <div class="col-span-1 flex items-center border-b border-gray-200 pb-2">
                                Số điện thoại
                            </div>
                            <div class="col-span-2 flex items-center border-b border-gray-200 pb-2 font-normal">
                                {{ $user->phone ?? 'Chưa cập nhật' }}
                            </div>
                            <div class="col-span-1 flex items-center border-b border-gray-200 pb-2">
                                Giới tính
                            </div>
                            <div class="col-span-2 flex items-center border-b border-gray-200 pb-2 font-normal">
                                @if ($user->gender == 1)
                                    Nam
                                @elseif ($user->gender == 2)
                                    Nữ
                                @else
                                    Chưa cập nhật
                                @endif
                            </div>
                        </div>
                        <div class="flex justify-center mt-8">
                            <button
                                class="bg-red-600 text-white font-semibold px-6 py-2 rounded-md hover:bg-red-700 transition"
                                type="button" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                                Chỉnh sửa thông tin
                            </button>
                        </div>

                        <!-- Modal chỉnh sửa thông tin cá nhân -->
                        <div class="modal fade" id="editProfileModal" tabindex="-1"
                            aria-labelledby="editProfileModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editProfileModalLabel">Chỉnh sửa thông tin cá nhân
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('website.updateProfile') }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Họ và tên</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    value="{{ $user->name }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="phone" class="form-label">Số điện thoại</label>
                                                <input type="text" class="form-control" id="phone" name="phone"
                                                    value="{{ $user->phone }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="gender" class="form-label">Giới tính</label>
                                                <select class="form-select" id="gender" name="gender">
                                                    <option value="1" {{ $user->gender == 1 ? 'selected' : '' }}>Nam
                                                    </option>
                                                    <option value="2" {{ $user->gender == 2 ? 'selected' : '' }}>Nữ
                                                    </option>
                                                    <option value="" {{ is_null($user->gender) ? 'selected' : '' }}>
                                                        Chưa cập nhật</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Hủy</button>
                                            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="services" role="tabpanel">
                    <div class="bg-white rounded-lg p-6 shadow-sm">
                        <h2 class="text-xl font-bold mb-4">Dịch vụ thu hộ đã thanh toán</h2>
                        <p>Thông tin các dịch vụ thu hộ đã hoàn tất.</p>
                    </div>
                </div>
                <div class="tab-pane fade" id="loyalty" role="tabpanel">
                    <div class="bg-white rounded-lg p-6 shadow-sm">
                        <h2 class="text-xl font-bold mb-4">Khách hàng thân thiết</h2>
                        <p>Chính sách và điểm thưởng cho khách hàng thân thiết.</p>
                    </div>
                </div>
                <div class="tab-pane fade" id="addresses" role="tabpanel">
                    <div class="bg-white rounded-lg p-6 shadow-sm">
                        <h2 class="text-xl font-bold mb-4">Sổ địa chỉ nhận hàng</h2>
                        <p>Danh sách địa chỉ nhận hàng bạn đã lưu.</p>
                    </div>
                </div>
                <div class="tab-pane fade" id="warranty" role="tabpanel">
                    <div class="bg-white rounded-lg p-6 shadow-sm">
                        <h2 class="text-xl font-bold mb-4">Thông tin bảo hành</h2>
                        <p>Chi tiết các sản phẩm còn hạn bảo hành.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
