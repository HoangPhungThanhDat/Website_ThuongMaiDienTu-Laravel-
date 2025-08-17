@extends('layouts.admin')
@section('title', 'Quản lý Đơn Hàng')
@section('maincontent')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý đơn hàng</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blank Page</li>
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
                        <a class="btn btn-sm btn-danger" href="{{ route('admin.order.trash') }}">
                            <i class="fas fa-trash"></i> Thùng rác
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center" style="width:30px;">#</th>
                            <th>Tên khách hàng</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Giá tiền</th>
                            <th>Số Lượng</th>
                            <th>Điện thoại</th>
                            <th>Email</th>
                            <th>Ngày tạo</th>
                            <th>Type</th>
                            <th class="text-center">Trạng thái</th>
                            <th class="text-center" style="width:200px;">Chức năng</th>
                            <th class="text-center" style="width:30px;">ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $row)
                            <tr>
                                <td class="text-center">
                                    <input type="checkbox" name="checkId[]" id="checkId" value="1">
                                </td>
                                <td>{{ $row->delivery_name }}</td>
                                <td>{{ $row->productname }}</td>
                                <td>{{ $row->productprice }}</td>
                                <td>{{ $row->productqty }}</td>
                                <td>{{ $row->delivery_phone }}</td>
                                <td>{{ $row->delivery_email }}</td>
                                <td>{{ $row->created_at }}</td>
                                <td>{{ $row->type}}</td>
                                <td>
                                    @if ($row->status == 1)
                                        <span class="badge badge-success">Đã xác nhận</span>
                                    @elseif($row->status == 2)
                                        <span class="badge badge-info">Đang giao</span>
                                    @elseif($row->status == 3)
                                        <span class="badge badge-primary">Hoàn thành</span>
                                    @else
                                        <span class="badge badge-danger">Hủy</span>
                                    @endif
                                </td>


                                <td class="text-center">
                                    @php
                                        $args = ['id' => $row->id];
                                    @endphp
                                    @if ($row->status == 2)
                                        <a href="{{ route('admin.order.status', $args) }}" class="btn btn-sm btn-success">
                                            <i class="fa fa-toggle-on " aria-hidden="true"></i>
                                        </a>
                                    @else
                                        <a href="{{ route('admin.order.status', $args) }}" class="btn btn-sm btn-danger">
                                            <i class="fa fa-toggle-off " aria-hidden="true"></i>
                                        </a>
                                    @endif
                                    <a href="{{ route('admin.order.show', $args) }}" class="btn btn-sm btn-info">
                                        <i class="fa fa-eye " aria-hidden="true"></i>
                                    </a>
                                     {{-- Nút cập nhật status = 3 --}}
                                     <form action="{{ route('admin.order.done', $row->id) }}" method="post" class="d-inline">
                                      @csrf
                                      <button type="submit" class="btn btn-sm btn-success" 
                                              onclick="return confirm('Xác nhận khách đã nhận hàng?')">
                                          <i class="fa fa-check"></i>
                                      </button>
                                    </form>
                                    <a href="{{ route('admin.order.edit', $args) }}" class="btn btn-sm btn-primary">
                                        <i class="fa fa-edit " aria-hidden="true"></i>
                                    </a>
                                    <a href="{{ route('admin.order.delete', $args) }}" class="btn btn-sm btn-danger">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                </td>
                                <td class="text-center">
                                    {{ $row->id }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
