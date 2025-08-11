@extends('layouts.admin')
@section('title', 'Quản lý danh muc ')
@section('maincontent')
<section class="content-header">
  <div class="container-fluid">
      <div class="row mb-2">
          <div class="col-sm-6">
              <h1>Detail category</h1>
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
                  <a href="{{ route('admin.product.edit', ['id' => $product->id]) }}"
                      class="btn btn-sm btn-primary">
                      <i class="far fa-edit"></i> Edit
                  </a>
                  <a href="{{ route('admin.product.delete', ['id' => $product->id]) }}" class="btn btn-sm btn-danger">
                      <i class="fas fa-trash"></i> Delete
                  </a>
                  <a class="btn btn-sm btn-info" href="{{ route('admin.product.index') }}">
                      <i class="fa fa-arrow-left"></i> Back to list
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
                      <td>{{ $product->id }}</td>
                  </tr>
                  <tr>
                      <td>Name</td>
                      <td>{{ $product->name }}</td>
                  </tr>
                  <tr>
                      <td>Slug</td>
                      <td>{{ $product->slug }}</td>
                  </tr>
                  <tr>
                      <td>Image</td>
                      <td>
                        <img style="width: 90px;" src="{{ asset('images/products/' . $product->image) }}"
                        alt="{{ $product->image }}">
                      </td>
                  </tr>
                  <tr>
                      <td>Parent_id</td>
                      <td>{{ $product->parent_id }}</td>
                  </tr>
                  <tr>
                      <td>Sort_order</td>
                      <td>{{ $product->sort_order }}</td>
                  </tr>
                  <tr>
                      <td>Description</td>
                      <td>{{ $product->description }}</td>
                  </tr>
                  <tr>
                      <td>Created at</td>
                      <td>{{ $product->created_at }}</td>
                  </tr>
                  <tr>
                      <td>Updated at</td>
                      <td>{{ $product->updated_at }}</td>
                  </tr>
                  <tr>
                      <td>Created by</td>
                      <td>{{ $product->created_by }}</td>
                  </tr>
                  <tr>
                      <td>Updated by</td>
                      <td>{{ $product->updated_by }}</td>
                  </tr>
                  <tr>
                      <td>Status</td>
                      <td>{{ $product->status }}</td>
                  </tr>
              </tbody>
          </table>
      </div>
  </div>
</section>
@endsection


