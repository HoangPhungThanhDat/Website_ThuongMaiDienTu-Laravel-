@extends('layouts.admin')
@section('title','Cập nhật banner')
@section('maincontent')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Cập nhật banner</h1>
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
                    <a class="btn btn-sm btn-danger" href="{{ route('admin.banner.trash') }}">
                        <i class="fas fa-trash"></i> Thùng rác
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route ('admin.banner.update',['id'=>$banner->id])}}" method="post" enctype="multipart/form-data">
                @csrf
            @method("put")
                <div class="mb-3">
                    <label for="name">Tên banner</label>
                    <input type="text" value="{{old('name',$banner->name)}}" name="name" id="name" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="link">Liên kết</label>
                    <input type="text" value="{{old('name',$banner->link)}}" name="link" id="link" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="description">Mô tả</label>
                    <textarea name="description" id="description" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label for="position">Vị trí</label>
                    <select name="position" id="position" class="form-control">
                        <option value="0">None</option>
                        <option value="sideshow">Sideshow</option>
                        <option value="mainshow">Mainshow</option>

                    </select>
                </div>
                <div class="mb-3">
                    <label for="image">Hình</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="status">Trạng thái</label>
                    <select name="status" id="status" class="form-control">
                        <option value="2">Chưa xuất bản</option>
                        <option value="1">Xuất bản</option>
                    </select>
                </div>
                <div class="mb-3">
        <button type="submit" name="create" class="btn btn-success">Cập Nhật banner</button>
                </div>
            </form>
        </div>
    </div>
</section>
    
@endsection