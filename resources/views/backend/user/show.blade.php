@extends('layouts.admin')
@section('title','Chi Tiết Thành Viên')
@section('maincontent')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Chi tiết thành viên</h1>
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
                    <a href="{{ route('admin.user.edit', ['id' => $user->id]) }}" class="btn btn-sm btn-primary">
                        <i class="far fa-edit"></i> Sửa
                    </a>
                    <a href="#" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i> Xóa
                    </a>
                    <a class="btn btn-sm btn-info" href="{{route('admin.user.index')}}">
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
                        <td>{{ $user->id }}</td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <td>UserName</td>
                        <td>{{ $user->username }}</td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>{{ $user->password }}</td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td>{{ $user->gender }}</td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>{{ $user->phone }}</td>
                    </tr>

                    <tr>
                        <td>Email</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <td>Roles</td>
                        <td>{{ $user->roles }}</td>
                    </tr>
                    <tr>
                        <td>Image</td>
                        <td>
                            <img style="width: 90px;" src="{{ asset('images/users/' . $user->image) }}"
                                alt="{{ $user->image }}">
                        </td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>{{ $user->address }}</td>
                    </tr>
                    <tr>
                        <td>Created_At</td>
                        <td>{{ $user->created_at}}</td>
                    </tr>
                    <tr>
                        <td>Created_By</td>
                        <td>{{ $user->created_by}}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>{{ $user->status}}</td>
                    </tr>
                                       
                    <tr>
                </tbody>
            </table>
        </div>
    </div>
</section>   
@endsection