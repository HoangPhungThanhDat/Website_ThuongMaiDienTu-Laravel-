@extends('layouts.admin')
@section('title', 'Quản lý bài viết')
@section('maincontent')
<section class="content-header">
  <div class="container-fluid">
      <div class="row mb-2">
          <div class="col-sm-6">
              <h1>Detail post</h1>
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
                  <a href="{{ route('admin.post.edit', ['id' => $post->id]) }}"
                      class="btn btn-sm btn-primary">
                      <i class="far fa-edit"></i> Edit
                  </a>
                  <a href="{{ route('admin.post.delete', ['id' => $post->id]) }}" class="btn btn-sm btn-danger">
                      <i class="fas fa-trash"></i> Delete
                  </a>
                  <a class="btn btn-sm btn-info" href="{{ route('admin.post.index') }}">
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
                      <td>{{ $post->id }}</td>
                  </tr>
                  <tr>
                      <td>Name</td>
                      <td>{{ $post->title }}</td>
                  </tr>
                  <tr>
                      <td>Slug</td>
                      <td>{{ $post->slug }}</td>
                  </tr>
                  <tr>
                      <td>Image</td>
                      <td>
                        <img style="width: 90px;" src="{{ asset('images/posts/' . $post->image) }}"
                        alt="{{ $post->image }}">
                      </td>
                  </tr>
                 
                  <tr>
                      <td>Description</td>
                      <td>{{ $post->description }}</td>
                  </tr>
                  <tr>
                      <td>Created at</td>
                      <td>{{ $post->created_at }}</td>
                  </tr>
                  <tr>
                      <td>Updated at</td>
                      <td>{{ $post->updated_at }}</td>
                  </tr>
                  <tr>
                      <td>Created by</td>
                      <td>{{ $post->created_by }}</td>
                  </tr>
                  <tr>
                      <td>Updated by</td>
                      <td>{{ $post->updated_by }}</td>
                  </tr>
                  <tr>
                      <td>Status</td>
                      <td>{{ $post->status }}</td>
                  </tr>
              </tbody>
          </table>
      </div>
  </div>
</section>
@endsection


