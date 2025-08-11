@extends('layouts.admin')
@section('title','Cập Nhật Menu')
@section('maincontent')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Cập Nhật Menu</h1>
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
                    <a class="btn btn-sm btn-danger" href="{{ route('admin.menu.trash') }}">
                        <i class="fas fa-trash"></i> Trash
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.menu.update',['id' => $menu->id]) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="card-header">
                    <div class="row">
                        <div class="col-12 text-right">
                            <button type="submit" name="create" class="btn btn-sm btn-success">
                                <i class="fa fa-save"></i> Save
                            </button>
                            <a class="btn btn-sm btn-info" href="{{ route('admin.menu.index') }}">
                                <i class="fa fa-arrow-left"></i> Back to list
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.menu.update', ['id' => $menu->id]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-9">
                                <div class="mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" value="{{ old('name', $menu->name) }}" name="name"
                                        id="name" class="form-control">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="card md-3">
                                    <label for="position">Vị trí</label>
                                    <select name="position" id="position" class="form-control">
                                        <option value="mainmenu">Main Menu</option>
                                        <option value="footermenu">Footer Menu</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="link">Link</label>
                                    <textarea name="link" id="link" class="form-control">{{ old('link', $menu->link) }}</textarea>
                                </div>
                            </div>
                                <div class="mb-3">
                                    <label for="status">Trạng thái</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="2"
                                            {{ old('status', $menu->status) == 2 ? 'selected' : '' }}>
                                            Chưa xuất bản</option>
                                        <option value="1"
                                            {{ old('status', $menu->status) == 1 ? 'selected' : '' }}>
                                            Xuất bản</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </form>

                </div>
            </form>
        </div>
    </div>
</section>  
@endsection