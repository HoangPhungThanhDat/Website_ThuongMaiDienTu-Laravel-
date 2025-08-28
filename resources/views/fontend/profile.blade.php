@extends('layouts.site')
@section('content')
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        .nav-pills .nav-link.active {
            background-color: #e9ecef !important;
            /* xám nhạt */
            color: #212529 !important;
            /* chữ đen */
        }

        .nav-pills .nav-link {
            border-radius: 0.375rem;
            /* làm bo nhẹ */
        }

        .nav-pills .nav-link:hover {
            background-color: #f8f9fa;
            /* màu khi hover */
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
                                <div class="w-5 h-5 rounded-full bg-orange-600 absolute top-3 left-1/2 -translate-x-1/2">
                                </div>
                                <div
                                    class="w-8 h-4 rounded-b-full bg-purple-900 absolute bottom-1 left-1/2 -translate-x-1/2">
                                </div>
                            </div>
                            <div>
                                <p class="font-semibold text-sm leading-tight">{{ $user->name }}</p>
                                <p class="text-gray-500 text-xs leading-tight">{{ $user->phone ?? 'Chưa cập nhật' }}</p>
                            </div>
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
                            <button
                                class="bg-red-600 text-white text-xs font-semibold px-4 py-2 rounded-md hover:bg-red-700 transition">Quan
                                tâm ngay</button>
                            <a class="text-blue-600 text-xs hover:underline" href="#">Xem thê lệ &gt;</a>
                        </div>
                    </div>

                    <!-- Navigation menu with Bootstrap Tabs -->
                    <div class="bg-white rounded-lg p-4 shadow-sm nav flex-column nav-pills" role="tablist"
                        aria-orientation="vertical">
                        <a class="nav-link active text-dark" data-bs-toggle="pill" href="#profile" role="tab"><i
                                class="fas fa-user"></i> Thông tin cá nhân </a>
                        <a class="nav-link text-dark" data-bs-toggle="pill" href="#orders" role="tab"><i
                                class="fas fa-box-open"></i> Đơn hàng của tôi</a>
                        <a class="nav-link text-dark" data-bs-toggle="pill" href="#services" role="tab"><i
                                class="fas fa-file-invoice-dollar"></i> Dịch vụ thu hộ</a>
                        <a class="nav-link text-dark" data-bs-toggle="pill" href="#loyalty" role="tab"><i
                                class="fas fa-heart"></i> Khách hàng thân thiết</a>
                        <a class="nav-link text-dark" data-bs-toggle="pill" href="#addresses" role="tab"><i
                                class="fas fa-map-marker-alt"></i> Sổ địa chỉ</a>
                        <a class="nav-link text-dark" data-bs-toggle="pill" href="#warranty" role="tab"><i
                                class="fas fa-shield-alt"></i> Thông tin bảo hành</a>
                        @if (Auth::check() && Auth::user()->roles === 'admin')
                            <a class="nav-link text-dark" href="{{ route('admin.dashbread') }}"><i
                                    class="fas fa-user-shield"></i> Quản trị admin</a>
                        @endif
                        <a class="nav-link text-dark" href="{{ route('website.logout') }}"><i
                                class="fas fa-sign-out-alt"></i> Đăng xuất</a>
                    </div>
                </div>

                <!-- Right content area (tab content) -->
                <div class="tab-content flex-1 mt-6 md:mt-0">
                    <div class="tab-pane fade show active" id="profile" role="tabpanel">
                        <h2 class="text-xl font-bold mb-4">
                            Thông tin cá nhân
                        </h2>
                        <div class="bg-white rounded-lg p-8 shadow-sm max-w-3xl mx-auto">
                            <div class="flex justify-center mb-6">
                                <div aria-label="User avatar with orange circle head and dark purple body"
                                    class="w-20 h-20 rounded-full bg-orange-300 flex items-center justify-center relative">
                                    <div
                                        class="w-8 h-8 rounded-full bg-orange-600 absolute top-6 left-1/2 -translate-x-1/2">
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
                                                    <input type="text" class="form-control" id="name"
                                                        name="name" value="{{ $user->name }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="phone" class="form-label">Số điện thoại</label>
                                                    <input type="text" class="form-control" id="phone"
                                                        name="phone" value="{{ $user->phone }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="gender" class="form-label">Giới tính</label>
                                                    <select class="form-select" id="gender" name="gender">
                                                        <option value="1" {{ $user->gender == 1 ? 'selected' : '' }}>
                                                            Nam
                                                        </option>
                                                        <option value="2" {{ $user->gender == 2 ? 'selected' : '' }}>
                                                            Nữ
                                                        </option>
                                                        <option value=""
                                                            {{ is_null($user->gender) ? 'selected' : '' }}>
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
                    <div class="tab-pane fade" id="orders" role="tabpanel">
                        <div class="bg-white rounded-lg p-4 shadow-sm">
                            <h2 class="h5 font-weight-bold mb-3">🛒 Đơn hàng của tôi</h2>
                            <p class="text-muted mb-4">Danh sách tất cả các đơn hàng bạn đã đặt</p>
                            @if (isset($orders) && count($orders) > 0)
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover align-middle">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">Mã đơn</th>
                                                <th scope="col">Ngày đặt</th>
                                                <th scope="col">Hình</th>
                                                <th scope="col">Tổng tiền</th>
                                                <th scope="col">Trạng thái</th>
                                                <th scope="col">Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $order)
                                                <tr>
                                                    <td>#{{ $order->id }}</td>
                                                    <td>{{ date('d/m/Y H:i', strtotime($order->created_at)) }}</td>
                                                    <td>
                                                        @if ($order->product_image)
                                                            <img src="{{ asset('images/products/' . $order->product_image) }}"
                                                                alt="Product Image" width="50" height="50">
                                                        @else
                                                            <span>Không có hình</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ number_format($order->total, 0, ',', '.') }} đ</td>
                                                    <td>
                                                        @if ($order->status == '1')
                                                            <span class="badge badge-warning" style="color: #28a745;">Chờ
                                                                xử lý</span>
                                                        @elseif($order->status == '2')
                                                            <span class="badge badge-info" style="color: #28a745;">Đang
                                                                giao hàng</span>
                                                        @elseif($order->status == '3')
                                                            <span class="badge badge-success" style="color: #28a745;">Hoàn
                                                                thành</span>
                                                        @elseif($order->status == '0')
                                                            <span class="badge badge-danger" style="color: #28a745;">Đã
                                                                hủy</span>
                                                        @endif
                                                    </td>
                                                   
                                                    <td>
                                                        <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#orderDetailModal{{ $order->id }}">
                                                            <i class="fas fa-eye"></i> Xem chi tiết
                                                        </button>
                                                        @if ($order->status == '1') <!-- Chỉ hiển thị nút Hủy nếu trạng thái là Chờ xử lý -->
                                                            <form action="{{ route('order.cancel', $order->id) }}" method="POST" style="display: inline;">
                                                                @csrf
                                                                @method('PUT')
                                                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Bạn có chắc chắn muốn hủy đơn hàng này?')">
                                                                    <i class="fas fa-times"></i> Hủy
                                                                </button>
                                                            </form>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach

                                            @foreach ($orders as $order)
                                                <!-- Modal -->
                                                <div class="modal fade" id="orderDetailModal{{ $order->id }}"
                                                    tabindex="-1"
                                                    aria-labelledby="orderDetailModalLabel{{ $order->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                                        <div class="modal-content shadow-lg border-0 rounded-3">
                                                            <div class="modal-header bg-primary text-white">
                                                                <h5 class="modal-title fw-bold"
                                                                    id="orderDetailModalLabel{{ $order->id }}">
                                                                    <i class="fas fa-box"></i> Đơn hàng
                                                                    #{{ $order->id }}
                                                                </h5>
                                                                <button type="button" class="btn-close btn-close-white"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>

                                                            <div class="modal-body">
                                                                <!-- Thông tin đơn hàng -->
                                                                <div class="p-3 mb-4 border rounded bg-light">
                                                                    <p><i
                                                                            class="far fa-calendar-alt me-2 text-primary"></i><strong>Ngày
                                                                            đặt:</strong>
                                                                        {{ date('d/m/Y H:i', strtotime($order->created_at)) }}
                                                                    </p>
                                                                    <p><i
                                                                            class="fas fa-money-bill-wave me-2 text-success"></i><strong>Tổng
                                                                            tiền:</strong>
                                                                        <span
                                                                            class="fw-bold text-danger">{{ number_format($order->total, 0, ',', '.') }}
                                                                            đ</span>
                                                                    </p>
                                                                    <p><i
                                                                            class="fas fa-info-circle me-2 text-warning"></i><strong>Trạng
                                                                            thái:</strong>
                                                                        @if ($order->status == '1')
                                                                            <span class="badge bg-warning text-dark">Chờ xử
                                                                                lý</span>
                                                                        @elseif($order->status == '2')
                                                                            <span class="badge bg-info text-dark">Đang giao
                                                                                hàng</span>
                                                                        @elseif($order->status == '3')
                                                                            <span class="badge bg-success">Hoàn
                                                                                thành</span>
                                                                        @elseif($order->status == '0')
                                                                            <span class="badge bg-danger">Đã hủy</span>
                                                                        @endif
                                                                    </p>

                                                                    <p>
                                                                        <i class="fas fa-map-marker-alt me-2 text-danger"></i>
                                                                        <strong>Địa chỉ giao hàng:</strong>
                                                                        {{ $order->address }}
                                                                    </p>
                                                                    
                                                                </div>

                                                                <!-- Timeline trạng thái -->
                                                                <div
                                                                    class="order-progress d-flex justify-content-between align-items-center text-center mb-3">
                                                                    <div
                                                                        class="step {{ $order->status >= 1 ? 'completed' : '' }}">
                                                                        <div class="circle"><i
                                                                                class="fas fa-clipboard-list"></i></div>
                                                                        <span>Chờ xử lý</span>
                                                                    </div>
                                                                    <div class="line"></div>
                                                                    <div
                                                                        class="step {{ $order->status >= 2 ? 'completed' : '' }}">
                                                                        <div class="circle"><i
                                                                                class="fas fa-shipping-fast"></i></div>
                                                                        <span>Đang giao hàng</span>
                                                                    </div>
                                                                    <div class="line"></div>
                                                                    <div
                                                                        class="step {{ $order->status >= 3 ? 'completed' : '' }}">
                                                                        <div class="circle"><i
                                                                                class="fas fa-check-circle"></i></div>
                                                                        <span>Hoàn thành</span>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Thông tin sản phẩm -->
                                                            <div class="product-details">
                                                                <h5 class="mb-3">Chi tiết sản phẩm</h5>
                                                                @foreach ($order->orderDetails as $detail)
                                                                    <div
                                                                        class="product-item d-flex align-items-center mb-3 p-3 border rounded shadow-sm">
                                                                        <img src="{{ asset('images/products/' . $detail->product->image) }}"
                                                                            alt="{{ $detail->product->name }}"
                                                                            class="product-img me-3">

                                                                        <div class="flex-grow-1">
                                                                            <h6 class="mb-1 fw-bold">
                                                                                {{ $detail->product->name }}</h6>
                                                                            <p class="mb-1 text-muted">
                                                                                Giá: <span
                                                                                    class="text-danger fw-bold">{{ number_format($detail->price, 0, ',', '.') }}
                                                                                    đ</span>
                                                                            </p>
                                                                            <p class="mb-0">
                                                                                Số lượng:
                                                                                <strong>{{ $detail->qty }}</strong>
                                                                                | Tổng: <span
                                                                                    class="text-primary fw-bold">{{ number_format($detail->price * $detail->qty, 0, ',', '.') }}
                                                                                    đ</span>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>

                                                            <div class="modal-footer border-0">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">
                                                                    <i class="fas fa-times"></i> Đóng
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="alert alert-info">
                                    Bạn chưa có đơn hàng nào.
                                    <a href="{{ route('site.sanpham') }}" class="font-weight-bold">Mua ngay</a>
                                </div>
                            @endif
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
    <style>
        /* Timeline trạng thái */
        .order-progress {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 30px 0;
            position: relative;
        }

        .order-progress .step {
            position: relative;
            flex: 1;
            text-align: center;
            transition: 0.3s;
        }

        .order-progress .circle {
            width: 55px;
            height: 55px;
            border-radius: 50%;
            background: #e9ecef;
            margin: 0 auto 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            color: #adb5bd;
            transition: 0.3s;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
        }

        .order-progress .circle i {
            font-size: 20px;
        }

        .order-progress .line {
            flex: 1;
            height: 5px;
            background: #dee2e6;
            margin: 0 5px;
            position: relative;
            top: 27px;
            border-radius: 3px;
            transition: 0.3s;
        }

        .order-progress .step.completed .circle {
            background: linear-gradient(135deg, #0d6efd, #4dabf7);
            color: #fff;
            box-shadow: 0 4px 12px rgba(13, 110, 253, 0.3);
        }

        .order-progress .step.completed span {
            font-weight: bold;
            color: #0d6efd;
        }

        .order-progress .step span {
            display: block;
            font-size: 14px;
            margin-top: 5px;
            color: #6c757d;
            transition: 0.3s;
        }

        .order-progress .step.completed~.line {
            background: linear-gradient(90deg, #0d6efd, #4dabf7);
        }

        /* Bảng chi tiết sản phẩm */
        ..product-details h5 {
            font-size: 18px;
            font-weight: 700;
            color: #343a40;
            border-left: 4px solid #0d6efd;
            padding-left: 10px;
        }

        .product-item {
            transition: all 0.2s ease-in-out;
            background: #fff;
        }

        .product-item:hover {
            background: #f8f9fa;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .product-img {
            width: 70px;
            height: 70px;
            border-radius: 8px;
            object-fit: cover;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }


        /* Modal Header */
        .modal-header {
            background: linear-gradient(135deg, #0d6efd, #4dabf7);
            color: #fff;
            border-bottom: none;
            padding: 16px 24px;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
        }

        .modal-header .modal-title {
            font-weight: 700;
            font-size: 18px;
            letter-spacing: 0.5px;
        }

        .modal-header .btn-close {
            filter: brightness(0) invert(1);
            opacity: 0.9;
            transition: 0.2s;
        }

        .modal-header .btn-close:hover {
            opacity: 1;
        }

        /* Modal Body */
        .modal-body {
            padding: 25px;
        }

        /* Modal Footer */
        .modal-footer {
            border-top: none;
            justify-content: center;
            padding: 15px;
        }

        .modal-footer .btn {
            padding: 10px 22px;
            font-size: 14px;
            font-weight: 600;
            border-radius: 8px;
            transition: 0.2s;
        }

        .modal-footer .btn-secondary {
            background: #6c757d;
            color: #fff;
            border: none;
        }

        .modal-footer .btn-secondary:hover {
            background: #5a6268;
        }
    </style>
