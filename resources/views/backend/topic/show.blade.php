@extends('layouts.admin')
@section('title','Show Chủ Đề')
@section('maincontent')
<section class="content-header">
      <div class="card-body">

        <section class="content">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-12 text-right">
                            <a href="{{ route('admin.topic.edit', ['id' => $topic->id]) }}" class="btn btn-sm btn-primary">
                                <i class="far fa-edit"></i> Sửa
                            </a>
                            <a href="{{ route('admin.topic.delete', ['id' => $topic->id]) }}" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i> Xóa
                            </a>
                            <a class="btn btn-sm btn-info" href="{{ route('admin.topic.index') }}">
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
                                <td>{{ $topic->id }}</td>
                            </tr>
                       
                            <tr>
                                <td>Name</td>
                                <td>{{ $topic->name }}</td>
                            </tr>
                            <tr>
                                <td>Slug</td>
                                <td>{{ $topic->slug }}</td>
                            </tr>

                            <tr>
                                <td>Description</td>
                                <td>{{ $topic->description }}</td>
                            </tr>
                            
                            <tr>
                                <td>Created_At</td>
                                <td>{{ $topic->created_at}}</td>
                            </tr>
                            <tr>
                                <td>Updated_At</td>
                                <td>{{ $topic->updated_at}}</td>
                            </tr>
                            <tr>
                                <td>Created_By</td>
                                <td>{{ $topic->created_by}}</td>
                            </tr>                           
                            <tr>
                                <td>Updated_By</td>
                                <td>{{ $topic->updated_by}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
  </section>
    
@endsection