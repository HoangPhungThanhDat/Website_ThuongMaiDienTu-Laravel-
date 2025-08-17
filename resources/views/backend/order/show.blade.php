@extends('layouts.admin')
@section('title', 'Chi Tiết Đơn Hàng')
@section('maincontent')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Chi tiết đơn hàng</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item active">Chi tiết đơn hàng</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-12 text-right">
                        <a href="{{ route('admin.order.delete', ['id' => $order->id]) }}" 
                           class="btn btn-sm btn-danger"
                           onclick="return confirm('Bạn có chắc muốn xóa đơn hàng này?')">
                            <i class="fas fa-trash"></i> Xóa
                        </a>
                        <a class="btn btn-sm btn-info" href="{{ route('admin.order.index') }}">
                            <i class="fa fa-arrow-left"></i> Về danh sách
                        </a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                {{-- Thông tin đơn hàng --}}
                <h5><strong>Thông tin đơn hàng</strong></h5>
                <table class="table table-bordered table-striped table-hover">
                    <tbody>
                        <tr>
                            <td><strong>ID</strong></td>
                            <td>{{ $order->id }}</td>
                        </tr>
                        <tr>
                            <td><strong>Tên khách hàng</strong></td>
                            <td>{{ $order->delivery_name }}</td>
                        </tr>
                        <tr>
                            <td><strong>Email</strong></td>
                            <td>{{ $order->delivery_email }}</td>
                        </tr>
                        <tr>
                            <td><strong>Phone</strong></td>
                            <td>{{ $order->delivery_phone }}</td>
                        </tr>
                        <tr>
                            <td><strong>Ngày tạo</strong></td>
                            <td>{{ $order->created_at }}</td>
                        </tr>
                        <tr>
                            <td><strong>Người tạo</strong></td>
                            <td>{{ $order->created_by }}</td>
                        </tr>
                        <tr>
                            <td><strong>Trạng thái</strong></td>
                            <td>
                                @if($order->status == 1)
                                    <span class="badge badge-success">Đã xác nhận</span>
                                @elseif($order->status == 2)
                                    <span class="badge badge-info">Đang giao</span>
                                @elseif($order->status == 3)
                                    <span class="badge badge-primary">Hoàn thành</span>
                                @else
                                    <span class="badge badge-danger">Hủy</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>

                {{-- Danh sách sản phẩm --}}
                <h5 class="mt-4"><strong>Danh sách sản phẩm</strong></h5>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr class="text-center">
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($list as $item)
                            <tr>
                                <td>{{ $item->productname }}</td>
                                <td class="text-center">{{ $item->productqty }}</td>
                                <td>{{ number_format($item->productprice, 0, ',', '.') }} VNĐ</td>
                                <td>{{ number_format($item->productqty * $item->productprice, 0, ',', '.') }} VNĐ</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
