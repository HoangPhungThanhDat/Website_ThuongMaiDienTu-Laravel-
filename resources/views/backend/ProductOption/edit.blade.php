@extends('layouts.admin')
@section('title','Cập Nhật Phân Loại Sản Phẩm')
@section('maincontent')
<section class="content-header">
      <div class="card-body">
        <form action="{{ route('admin.ProductOption.update', ['id' => $option->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method("put")
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Cập Nhật Phân Loại Sản Phẩm</h1>
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
                                <button type="submit" name="create" class="btn btn-sm btn-success">
                                    <i class="fa fa-save"></i> Lưu
                                </button>
                                <a class="btn btn-sm btn-info" href="{{ route('admin.ProductOption.index') }}">
                                    <i class="fa fa-arrow-left"></i> Về danh sách
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="mb-3">
                                    <label for="name">Tên sản phẩm</label>
                                    <select name="product_id" id="product_id" class="form-control">
                                        <option value="">Chọn sản phẩm</option>
                                        @foreach($products as $product)
                                            <option value="{{ $product->id }}" {{ $option->product_id == $product->id ? 'selected' : '' }}>
                                                {{ $product->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="color">Màu sắc</label>
                                    <input type="text" name="color" id="color" class="form-control" value="{{ old('color', $option->color) }}">
                                </div>
                                <div class="mb-3">
                                    <label for="storage_gb">Dung lượng (GB)</label>
                                    <input type="text" name="storage_gb" id="storage_gb" class="form-control" value="{{ old('storage_gb', $option->storage_gb) }}">
                                </div>
                                
                                
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="price_adjust">Giá điều chỉnh</label>
                                    <input type="number" name="price_adjust" id="price_adjust" class="form-control" value="{{ old('price_adjust', $option->price_adjust) }}">
                                </div>
                                <div class="mb-3">
                                    <label for="pricesale">Giá sale</label>
                                    <input type="number" name="pricesale" id="pricesale" class="form-control" value="{{ old('pricesale', $option->pricesale) }}">
                                </div>

                                <div class="mb-3">
                                    <label for="quantity">Tồn kho</label>
                                    <input type="number" name="quantity" id="quantity" class="form-control" value="{{ old('quantity', $option->quantity) }}">
                                </div>

                                <div class="mb-3">
                                    <label for="status">Trạng thái</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="2" {{ $option->status == 2 ? 'selected' : '' }}>Chưa xuất bản</option>
                                        <option value="1" {{ $option->status == 1 ? 'selected' : '' }}>Xuất bản</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </form>
    </div>
  </section>
    
@endsection