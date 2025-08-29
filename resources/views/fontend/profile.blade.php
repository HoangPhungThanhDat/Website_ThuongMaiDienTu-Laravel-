@extends('layouts.site')
@section('content')

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
                        <a class="nav-link text-dark" data-bs-toggle="pill" href="#loyalty" role="tab"><i
                                class="fas fa-heart"></i> Khách hàng thân thiết</a>
                        <a class="nav-link text-dark" data-bs-toggle="pill" href="#addresses" role="tab">
                            <i class="fas fa-bell"></i> Thông báo
                        </a>
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
                                <div class="col-span-1 flex items-center border-b border-gray-200 pb-2">
                                    Địa chỉ nhận hàng
                                </div>
                                <div class="col-span-2 flex items-center border-b border-gray-200 pb-2 font-normal">
                                    {{ $user->address ?? 'Chưa cập nhật' }}
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
                                                <div class="mb-3">
                                                    <label for="address" class="form-label">Địa chỉ nhận hàng</label>
                                                    <input type="text" class="form-control" id="address"
                                                        name="address" value="{{ $user->address }}">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Hủy</button>
                                                <button type="submit" class="btn btn-danger">Lưu thay đổi</button>
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
                                                                xác nhận</span>
                                                        @elseif($order->status == '2')
                                                            <span class="badge badge-info" style="color: #28a745;">Đang
                                                                chuẩn bị hàng</span>
                                                        @elseif($order->status == '3')
                                                            <span class="badge badge-success" style="color: #28a745;">Đã
                                                                giao cho ĐVVC</span>
                                                        @elseif($order->status == '4')
                                                            <span class="badge badge-success" style="color: #28a745;">Đã
                                                                nhận được hàng</span>
                                                        @elseif($order->status == '0')
                                                            <span class="badge badge-danger" style="color: #28a745;">Đã
                                                                hủy</span>
                                                        @endif
                                                    </td>

                                                    <td>
                                                        <button class="btn btn-sm btn-outline-primary"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#orderDetailModal{{ $order->id }}">
                                                            <i class="fas fa-eye"></i> Xem chi tiết
                                                        </button>
                                                        @if ($order->status == '1')
                                                            <!-- Chỉ hiển thị nút Hủy nếu trạng thái là Chờ xử lý -->
                                                            <form action="{{ route('order.cancel', $order->id) }}"
                                                                method="POST" style="display: inline;">
                                                                @csrf
                                                                @method('PUT')
                                                                <button type="submit"
                                                                    class="btn btn-sm btn-outline-danger"
                                                                    onclick="return confirm('Bạn có chắc chắn muốn hủy đơn hàng này?')">
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
                                                                            <span class="badge bg-warning text-dark">Chờ
                                                                                xác
                                                                                nhận </span>
                                                                        @elseif($order->status == '2')
                                                                            <span class="badge bg-info text-dark">Đang
                                                                                chuẩn bị
                                                                                hàng</span>
                                                                        @elseif($order->status == '3')
                                                                            <span class="badge bg-success">Đã giao cho
                                                                                ĐVVC</span>
                                                                        @elseif($order->status == '4')
                                                                            <span class="badge bg-success">Đã nhận được
                                                                                hàng</span>
                                                                        @elseif($order->status == '0')
                                                                            <span class="badge bg-danger">Đã hủy</span>
                                                                        @endif
                                                                    </p>
                                                                    <p>
                                                                        <i
                                                                            class="fas fa-map-marker-alt me-2 text-danger"></i>
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
                                                                        <span>Chờ xác nhận</span>
                                                                    </div>
                                                                    <div class="line"></div>
                                                                    <div
                                                                        class="step {{ $order->status >= 2 ? 'completed' : '' }}">
                                                                        <div class="circle"><i
                                                                                class="fas fa-box-open"></i></div>
                                                                        <span>Đang chuẩn bị hàng </span>
                                                                    </div>
                                                                    <div class="line"></div>
                                                                    <div
                                                                        class="step {{ $order->status >= 3 ? 'completed' : '' }}">
                                                                        <div class="circle"><i
                                                                                class="fas fa-shipping-fast"></i></div>
                                                                        <span>Đã giao cho ĐVVC</span>
                                                                    </div>
                                                                    <div class="line"></div>
                                                                    <div
                                                                        class="step {{ $order->status >= 4 ? 'completed' : '' }}">
                                                                        <div class="circle"><i
                                                                                class="fas fa-check-circle"></i></div>
                                                                        <span>Đã nhận được hàng</span>
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

                                                                    <!-- Nút đánh giá -->
                                                                    @if ($order->status == 4)
                                                                        <!-- Kiểm tra trạng thái đơn hàng -->
                                                                        <div class="text-center mt-4">
                                                                            <a href=""
                                                                                class="btn btn-warning">
                                                                                <i class="fas fa-star"></i> Đánh giá sản
                                                                                phẩm
                                                                            </a>
                                                                        </div>
                                                                    @endif
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
                    <div class="tab-pane fade" id="loyalty" role="tabpanel">
                        <div class="bg-white rounded-lg shadow-sm p-6">
                            <h2 class="text-xl font-bold mb-4">Khách hàng thân thiết</h2>
                            <p class="text-muted mb-4">Tham gia chương trình khách hàng thân thiết để nhận nhiều ưu đãi và
                                quyền lợi hấp dẫn.</p>

                            <!-- Thông tin cấp độ -->
                            <div class="loyalty-level mb-4">
                                <h5 class="fw-bold">Cấp độ hiện tại: <span class="text-warning">Vàng</span></h5>
                                <div class="progress my-2" style="height: 12px;">
                                    <div class="progress-bar bg-warning" style="width: 65%"></div>
                                </div>
                                <small class="text-muted">Bạn còn thiếu <b>350 điểm</b> để lên hạng <span
                                        class="text-primary">Kim Cương</span>.</small>
                            </div>

                            <!-- Quyền lợi -->
                            <div class="loyalty-benefits grid grid-cols-1 md:grid-cols-2 gap-3">
                                <div class="benefit-item">
                                    <i class="fas fa-percent"></i>
                                    <div>
                                        <h6>Giảm giá độc quyền</h6>
                                        <p>Nhận mã giảm giá lên đến 20% cho hội viên.</p>
                                    </div>
                                </div>
                                <div class="benefit-item">
                                    <i class="fas fa-truck-fast"></i>
                                    <div>
                                        <h6>Miễn phí vận chuyển</h6>
                                        <p>Freeship cho các đơn hàng từ 300k.</p>
                                    </div>
                                </div>
                                <div class="benefit-item">
                                    <i class="fas fa-gift"></i>
                                    <div>
                                        <h6>Quà sinh nhật</h6>
                                        <p>Nhận voucher 200k vào tháng sinh nhật.</p>
                                    </div>
                                </div>
                                <div class="benefit-item">
                                    <i class="fas fa-star"></i>
                                    <div>
                                        <h6>Tích điểm nhanh hơn</h6>
                                        <p>Nhân đôi điểm thưởng cho mỗi đơn hàng.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="addresses" role="tabpanel">
                        <div class="bg-white rounded-lg shadow-sm p-6">
                            <h2 class="text-xl font-bold mb-4">Thông báo</h2>

                            <div class="list-group">

                                <!-- Thông báo chưa đọc -->
                                <a href="#"
                                    class="list-group-item list-group-item-action d-flex align-items-start border-0 border-bottom unread">
                                    <div class="me-3 text-warning">
                                        <i class="fas fa-tag fa-lg"></i>
                                    </div>
                                    <div class="flex-fill">
                                        <p class="mb-1 fw-bold">Giảm giá 50% cho đơn hàng hôm nay</p>
                                        <small class="text-muted">2 giờ trước</small>
                                    </div>
                                </a>

                                <!-- Thông báo đã đọc -->
                                <a href="#"
                                    class="list-group-item list-group-item-action d-flex align-items-start border-0 border-bottom">
                                    <div class="me-3 text-primary">
                                        <i class="fas fa-truck fa-lg"></i>
                                    </div>
                                    <div class="flex-fill">
                                        <p class="mb-1">Đơn hàng #12345 của bạn đã được giao</p>
                                        <small class="text-muted">Hôm qua</small>
                                    </div>
                                </a>

                                <!-- Thông báo khuyến mãi -->
                                <a href="#"
                                    class="list-group-item list-group-item-action d-flex align-items-start border-0 border-bottom">
                                    <div class="me-3 text-danger">
                                        <i class="fas fa-bullhorn fa-lg"></i>
                                    </div>
                                    <div class="flex-fill">
                                        <p class="mb-1">Săn sale cuối tuần – Giảm đến 70%</p>
                                        <small class="text-muted">3 ngày trước</small>
                                    </div>
                                </a>

                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="warranty" role="tabpanel">
                        <div class="bg-white rounded-lg shadow-sm p-6">
                            <h2 class="text-xl font-bold mb-4">Thông tin bảo hành</h2>
                            <p class="text-muted mb-4">Vui lòng tham khảo các quy định bảo hành áp dụng cho sản phẩm.</p>

                            <div class="warranty-rules">
                                <div class="rule-item">
                                    <i class="fas fa-shield-alt"></i>
                                    <div>
                                        <h6>Bảo hành chính hãng</h6>
                                        <p>Sản phẩm được bảo hành theo quy định của hãng sản xuất từ 12 - 24 tháng.</p>
                                    </div>
                                </div>
                                <div class="rule-item">
                                    <i class="fas fa-receipt"></i>
                                    <div>
                                        <h6>Điều kiện bảo hành</h6>
                                        <p>Sản phẩm còn nguyên tem, phiếu bảo hành và hóa đơn mua hàng hợp lệ.</p>
                                    </div>
                                </div>
                                <div class="rule-item">
                                    <i class="fas fa-tools"></i>
                                    <div>
                                        <h6>Trường hợp không bảo hành</h6>
                                        <p>Sản phẩm hư hỏng do tác động vật lý, rơi vỡ, ngấm nước hoặc tự ý sửa chữa.</p>
                                    </div>
                                </div>
                                <div class="rule-item">
                                    <i class="fas fa-clock"></i>
                                    <div>
                                        <h6>Thời gian xử lý</h6>
                                        <p>Thời gian tiếp nhận và xử lý bảo hành từ 7 - 15 ngày làm việc.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @endsection
