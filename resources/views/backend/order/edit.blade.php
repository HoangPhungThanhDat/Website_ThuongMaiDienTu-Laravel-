@extends('layouts.admin')
@section('title','Cập Nhật Đơn Hàng')
@section('maincontent')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Cập Nhật Đơn Hàng</h1>
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
            <a href="{{route('admin.order.index')}}" class="btn btn-sm btn-info">  
              <i class="fa fa-arrow-left" aria-hidden="true"></i> Về Danh Sách
            </a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <form action="{{route ('admin.order.update',['id'=>$order->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            @method("put")
            <div class="mb-3">
                <label for="delivery_name">Tên Sản Phẩm</label>
                <input type="text" value="{{old('delivery_name',$order->delivery_name)}}" name="delivery_name" id="delivery_name" class="form-control">
                @error('delivery_name')
                  <span class="text-danger">{{$message}}</span>
                    
                @enderror
            </div>
            <div class="mb-3">
              <label for="delivery_phone">Điện thoại</label>
              <input type="text" value="{{old('delivery_phone',$order->delivery_phone)}}" name="delivery_phone" id="delivery_phone" class="form-control">
          </div>
            <div class="mb-3">
              <label for="delivery_email">Email</label>
              <input type="text" value="{{old('delivery_email',$order->delivery_email)}}" name="delivery_email" id="delivery_email" class="form-control">
          </div>
          <div class="mb-3">
            <label for="created_at">Ngày Tạo</label>
            <input type="text" value="{{old('created_at',$order->created_at)}}" name="created_at" id="created_at" class="form-control">
        </div>
                <button type="submit" name="create" class="btn btn-success">Cập Nhật Đơn Hàng
                    </button>
            </div>
        </form>
    </div>
  </section>
    
@endsection