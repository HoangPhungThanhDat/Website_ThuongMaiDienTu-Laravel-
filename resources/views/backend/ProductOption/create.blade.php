@extends('layouts.admin')
@section('title', 'Thêm tùy chọn sản phẩm')
@section('maincontent')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Thêm tùy chọn sản phẩm</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Thêm tùy chọn sản phẩm</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="card">
        <form action="{{ route('admin.ProductOption.store') }}" method="post" enctype="multipart/form-data">
            @csrf

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
                        <a class="btn btn-sm btn-info" href="{{ route('admin.ProductOption.index') }}">
                            <i class="fa fa-arrow-left"></i> Về danh sách
                        </a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        {{-- Chọn sản phẩm --}}
                        <div class="mb-3">
                            <label for="product_id">Sản phẩm</label>
                            <select name="product_id" id="product_id" class="form-control @error('product_id') is-invalid @enderror">
                                <option value="">Chọn sản phẩm</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                                        {{ $product->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('product_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Màu sắc --}}
                        <div class="mb-3">
                            <label for="color">Màu sắc</label>
                            <input type="text" name="color" id="color" class="form-control @error('color') is-invalid @enderror" value="{{ old('color') }}">
                            @error('color')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Dung lượng --}}
                        <div class="mb-3">
                            <label for="storage_gb">Dung lượng (GB)</label>
                            <input type="number" name="storage_gb" id="storage_gb" class="form-control @error('storage_gb') is-invalid @enderror" value="{{ old('storage_gb') }}">
                            @error('storage_gb')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Số lượng kho --}}
                        <div class="mb-3">
                            <label for="quantity">Số lượng kho</label>
                            <input type="number" name="quantity" id="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{ old('quantity') }}">
                            @error('quantity')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        {{-- Giá --}}
                        <div class="mb-3">
                            <label for="price_adjust">Giá</label>
                            <input type="number" name="price_adjust" id="price_adjust" class="form-control @error('price_adjust') is-invalid @enderror" value="{{ old('price_adjust') }}">
                            @error('price_adjust')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Giá khuyến mãi --}}
                        <div class="mb-3">
                            <label for="pricesale">Giá khuyến mãi</label>
                            <input type="number" name="pricesale" id="pricesale" class="form-control @error('pricesale') is-invalid @enderror" value="{{ old('pricesale') }}">
                            @error('pricesale')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Hình ảnh --}}
                        <div class="mb-3">
                            <label for="image">Hình ảnh (có thể chọn nhiều)</label>
                            <input type="file" name="images[]" id="image" class="form-control @error('images') is-invalid @enderror" multiple>
                            @error('images')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Trạng thái --}}
                        <div class="mb-3">
                            <label for="status">Trạng thái</label>
                            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                <option value="2" {{ old('status') == 2 ? 'selected' : '' }}>Chưa xuất bản</option>
                                <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Xuất bản</option>
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
