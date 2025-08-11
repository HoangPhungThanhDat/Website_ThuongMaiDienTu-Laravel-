@extends('layouts.admin')
@section('title','Cập Nhật Liên Hệ')
@section('maincontent')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Cập Nhật Liên Hệ</h1>
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
            <a href="{{route('admin.contact.index')}}" class="btn btn-sm btn-info">  
              <i class="fa fa-arrow-left" aria-hidden="true"></i> Về Danh Sách
            </a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <form action="{{route ('admin.contact.update',['id'=>$contact->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            @method("put")
            <div class="mb-3">
                <label for="name">Họ Tên</label>
                <input type="text" value="{{old('name',$contact->name)}}" name="name" id="name" class="form-control">
                @error('name')
                  <span class="text-danger">{{$message}}</span>
                    
                @enderror
            </div>
            <div class="mb-3">
              <label for="phone">Điện thoại</label>
              <input type="text" value="{{old('phone',$contact->phone)}}" name="phone" id="phone" class="form-control">
          </div>
            <div class="mb-3">
              <label for="email">Email</label>
              <input type="text" value="{{old('email',$contact->email)}}" name="email" id="email" class="form-control">
          </div>
            <div class="mb-3">
                <label for="title">Title</label>
                <input type="text" value="{{old('title',$contact->title)}}" name="title" id="title" class="form-control">
            </div>
            <div class="mb-3">
                <button type="submit" name="create" class="btn btn-success">Cập Nhật Liên Hệ
                    </button>
            </div>
        </form>
    </div>
  </section>
    
@endsection