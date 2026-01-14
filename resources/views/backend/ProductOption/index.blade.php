@extends('layouts.admin')
@section('title', 'Quản lý phân loại sản phẩm')
@section('maincontent')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý phân loại sản phẩm</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Phân loại sản phẩm</li>
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
                        <a href="{{ route('admin.ProductOption.create') }}" class="btn btn-sm btn-success">
                            <i class="fa fa-plus"></i> Thêm
                        </a>
                        <a href="{{ route('admin.ProductOption.trash') }}" class="btn btn-sm btn-danger">
                            <i class="fa fa-trash"></i> Thùng rác
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Hình</th>
                            <th class="text-center">Sản phẩm</th>
                            <th class="text-center">Màu sắc</th>
                            <th class="text-center">Dung lượng (GB)</th>
                            <th class="text-center">Giá tiền</th>
                            <th class="text-center">Giá sale</th>
                            <th class="text-center">Tồn kho</th>
                            <th class="text-center">Ngày tạo</th>
                            <th class="text-center">Ngày cập nhật</th>
                            <th class="text-center">Chức năng</th>
                            <th class="text-center">ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $row)
                            <tr>
                                <td class="text-center">
                                    <input type="checkbox">
                                </td>
                                <td class="text-center">
                                    @if ($row->product && $row->product->image)
                                        <img src="{{ asset('images/products/' . $row->product->image) }}"
                                            alt="{{ $row->product->name }}" class="img-fluid"
                                            style="max-width: 60px; height: auto;">
                                    @endif
                                </td>

                                <td class="text-center">{{ $row->product->name ?? '' }}</td>
                                <td class="text-center">{{ $row->color }}</td>
                                <td class="text-center">{{ $row->storage_gb }}</td>
                                <td class="text-center">{{ $row->price_adjust }}</td>
                                <td class="text-center">{{ $row->pricesale }}</td>
                                <td class="text-center">{{ $row->quantity }}</td>
                                <td class="text-center">{{ $row->created_at }}</td>
                                <td class="text-center">{{ $row->updated_at }}</td>
                                <td class="text-center">
                                    @php
                                        $argrs = ['id' => $row->id];
                                    @endphp
                                    <?php if ($row->status == 1): ?>
                                    <a href="{{ route('admin.ProductOption.status', $argrs) }}" class="btn btn-sm btn-success">
                                        <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                    </a>
                                    <?php 
                                        endif;
                                        if($row->status ==2): 
                                    ?>

                                    <a href="{{ route('admin.ProductOption.status', $argrs) }}" class="btn btn-sm btn-danger">
                                        <i class="fa fa-toggle-off" aria-hidden="true"></i>
                                    </a>
                                    <?php
                                        endif;
                                    ?>
                                    <a href="{{ route('admin.ProductOption.show', $row->id) }}"
                                        class="btn btn-sm btn-info">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.ProductOption.edit', $row->id) }}"
                                        class="btn btn-sm btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{ route('admin.ProductOption.delete', $row->id) }}"
                                        class="btn btn-sm btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                                <td class="text-center">{{ $row->id }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
