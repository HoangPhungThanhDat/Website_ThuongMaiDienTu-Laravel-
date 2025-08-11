@extends('layouts.admin')
@section('title','Chi Tiết Đơn Hàng')
@section('maincontent')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Chi tiết đơn hàng</h1>
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
                    <a href="{{ route('admin.order.delete', ['id' => $order->id]) }}" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i> Xóa
                    </a>
                    <a class="btn btn-sm btn-info" href="{{ route('admin.order.index') }}">
                        <i class="fa fa-arrow-left"></i> Về danh sách
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-center" style="width:30%;">
                            <strong>Tên trường</strong>
                        </th>
                        <th class="text-center" style="width:70%;">Giá trị</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>ID</td>
                        <td>{{ $order->id }}</td>
                    </tr>
                   
                    <tr>
                        <td>Name</td>
                        <td>{{ $order->delivery_name}}</td>
                    </tr>
                   
                    <tr>
                        <td>Email</td>
                        <td>{{ $order->delivery_email }}</td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>{{ $order->delivery_phone}}</td>
                    </tr>
                  
                   
                    <tr>
                        <td>Created_At</td>
                        <td>{{ $order->created_at}}</td>
                    </tr>
                    <tr>
                        <td>Created_By</td>
                        <td>{{ $order->created_by}}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>{{ $order->status}}</td>
                    </tr>                   
                   <tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection