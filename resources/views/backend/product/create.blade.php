@extends('layouts.admin')
@section('title', 'Thêm sản phẩm')
@section('maincontent')

<section class="content-header">
  <div class="container-fluid">
      <div class="row mb-2">
          <div class="col-sm-6">
              <h1>Thêm sản phẩm</h1>
          </div>
          <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Thêm sản phẩm</li>
              </ol>
          </div>
      </div>
  </div>
</section>

<section class="content">
  <div class="card">
    <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
      @csrf

      {{-- Hiển thị tất cả lỗi --}}
      @if ($errors->any())
          <div class="alert alert-danger m-3">
              <strong>Có lỗi xảy ra:</strong>
              <ul class="mb-0">
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif

      <div class="card-header">
          <div class="row">
              <div class="col-12 text-right">
                  <button type="submit" class="btn btn-sm btn-success">
                      <i class="fa fa-save"></i> Lưu
                  </button>
                  <a class="btn btn-sm btn-info" href="{{ route('admin.product.index') }}">
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
                      <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                      @error('name')
                          <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                  </div>

                  <div class="mb-3">
                      <label for="detail">Chi tiết</label>
                      <textarea name="detail" id="detail" rows="6" class="form-control @error('detail') is-invalid @enderror">{{ old('detail') }}</textarea>
                      @error('detail')
                          <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                  </div>

                  <div class="mb-3">
                      <label for="description">Mô tả</label>
                      <textarea name="description" id="description" rows="4" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                      @error('description')
                          <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                  </div>
              </div>

              <div class="col-md-3">
                  <div class="mb-3">
                      <label for="category_id">Danh mục</label>
                      <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                          <option value="">Chọn danh mục</option>
                          @foreach($categories as $category)
                              <option value="{{ $category->id }}" {{ old('category_id')==$category->id ? 'selected':'' }}>{{ $category->name }}</option>
                          @endforeach
                      </select>
                      @error('category_id')
                          <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                  </div>

                  <div class="mb-3">
                      <label for="brand_id">Thương hiệu</label>
                      <select name="brand_id" id="brand_id" class="form-control @error('brand_id') is-invalid @enderror">
                          <option value="">Chọn thương hiệu</option>
                          @foreach($brands as $brand)
                              <option value="{{ $brand->id }}" {{ old('brand_id')==$brand->id ? 'selected':'' }}>{{ $brand->name }}</option>
                          @endforeach
                      </select>
                      @error('brand_id')
                          <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                  </div>

                  <div class="mb-3">
                      <label for="price">Giá</label>
                      <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}">
                      @error('price')
                          <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                  </div>

                  <div class="mb-3">
                      <label for="pricesale">Giá khuyến mãi</label>
                      <input type="number" name="pricesale" id="pricesale" class="form-control @error('pricesale') is-invalid @enderror" value="{{ old('pricesale') }}">
                      @error('pricesale')
                          <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                  </div>

                  <div class="mb-3">
                      <label for="quantity">Số lượng kho</label>
                      <input type="number" name="quantity" id="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{ old('quantity') }}">
                      @error('quantity')
                          <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                  </div>

                  <div class="mb-3">
                      <label for="image">Hình</label>
                      <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                      @error('image')
                          <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                  </div>

                  <div class="mb-3">
                      <label for="status">Trạng thái</label>
                      <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                          <option value="2" {{ old('status')==2?'selected':'' }}>Chưa xuất bản</option>
                          <option value="1" {{ old('status')==1?'selected':'' }}>Xuất bản</option>
                      </select>
                      @error('status')
                          <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                  </div>
              </div>
          </div>
      </div>
    </form>
  </div>
</section>
@endsection
