@extends('layouts.admin')
@section('title', 'Chi tiết phân loại sản phẩm')
@section('maincontent')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Chi tiết phân loại sản phẩm</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Chi tiết</li>
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
                    <a href="{{ route('admin.ProductOption.edit', ['id' => $option->id]) }}" class="btn btn-sm btn-primary">
                        <i class="far fa-edit"></i> Edit
                    </a>
                    <a href="{{ route('admin.ProductOption.delete', ['id' => $option->id]) }}" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i> Delete
                    </a>
                    <a class="btn btn-sm btn-info" href="{{ route('admin.ProductOption.index') }}">
                        <i class="fa fa-arrow-left"></i> Back to list
                    </a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-center" style="width:30%;">Tên trường</th>
                        <th class="text-center" style="width:70%;">Giá trị</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>ID</td>
                        <td>{{ $option->id }}</td>
                    </tr>
                    <tr>
                        <td>Sản phẩm</td>
                        <td>{{ $option->product->name ?? '' }}</td>
                    </tr>
                    <tr>
                        <td>Màu sắc</td>
                        <td>{{ $option->color }}</td>
                    </tr>
                    <tr>
                        <td>Dung lượng (GB)</td>
                        <td>{{ $option->storage_gb }}</td>
                    </tr>
                    <tr>
                        <td>Giá tiền</td>
                        <td>{{ $option->price_adjust }}</td>
                    </tr>
                    <tr>
                        <td>Giá sale</td>
                        <td>{{ $option->pricesale }}</td>
                    </tr>
                    <tr>
                        <td>Tồn kho</td>
                        <td>{{ $option->quantity }}</td>
                    </tr>
                    <tr>
                        <td>Hình ảnh sản phẩm</td>
                        <td>
                            @if($option->product && $option->product->image)
                                <img style="width:120px;" src="{{ asset('images/products/' . $option->product->image) }}" 
                                     alt="{{ $option->product->name }}" class="img-thumbnail mb-2">
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>{{ $option->status }}</td>
                    </tr>
                    <tr>
                        <td>Created at</td>
                        <td>{{ $option->created_at }}</td>
                    </tr>
                    <tr>
                        <td>Updated at</td>
                        <td>{{ $option->updated_at }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection
