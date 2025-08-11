@extends('layouts.admin')
@section('title', 'Chi tiết liên hệ ')
@section('maincontent')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Chi tiết liên hệ</h1>
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
                    <a href="{{ route('admin.contact.edit', ['id' => $contact->id]) }}" class="btn btn-sm btn-primary">
                        <i class="far fa-edit"></i> Sửa
                    </a>
                    <a href="{{ route('admin.contact.delete', ['id' => $contact->id]) }}" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i> Xóa
                    </a>
                    <a class="btn btn-sm btn-info" href="{{ route('admin.contact.index') }}">
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
                        <td>{{ $contact->id }}</td>
                    </tr>
                   
                    <tr>
                        <td>Name</td>
                        <td>{{ $contact->name}}</td>
                    </tr>
                   
                    <tr>
                        <td>Email</td>
                        <td>{{ $contact->email }}</td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>{{ $contact->phone}}</td>
                    </tr>
                    <tr>
                        <td>Title</td>
                        <td>{{ $contact->title }}</td>
                    </tr>
                    <tr>
                        <td>Content</td>
                        <td>{{ $contact->content }}</td>
                    </tr>
                    <tr>
                        <td>Created_At</td>
                        <td>{{ $contact->created_at}}</td>
                    </tr>
                    <tr>
                      <td>Created_By</td>
                        <td>{{ $contact->created_by}}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>{{ $contact->status}}</td>
                    </tr>
                    
                   
                    
                    <tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection