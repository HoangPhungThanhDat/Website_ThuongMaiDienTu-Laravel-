@extends('layouts.admin')
@section('title','Quản Lý Người Dùng')
@section('maincontent')
<section class="content-header">
  <div class="container-fluid">
      <div class="row mb-2">
          <div class="col-sm-6">
              <h1>Quản lý thành viên</h1>
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
                  <a class="btn btn-sm btn-success" href="{{route('admin.user.create')}}">
                      <i class="fas fa-plus"></i> Thêm
                  </a>
                  <a class="btn btn-sm btn-danger" href="{{route('admin.user.trash')}}">
                      <i class="fas fa-trash"></i> Thùng rác
                  </a>
              </div>
          </div>
      </div>
      <div class="card-body">
          <table class="table table-bordered table-striped table-hover">
              <thead>
                  <tr>
                      <th class="text-center" style="width:30px;">#</th>
                      <th class="text-center" style="width:90px;">Hình</th>
                      <th>Họ tên</th>
                      <th>Điện thoại</th>
                      <th>Email</th>
                      <th>Quyền</th>
                      <th class="text-center" style="width:200px;">Chức năng</th>
                      <th class="text-center" style="width:30px;">ID</th>
                  </tr>
              </thead>
          
              <tbody>
                @foreach ($list as $row)
                <tr>
                  <td  class="text-center">
                    <input type="checkbox"></td>
                  <td  class="text-center">
                    <img src="{{asset('images/users/'.$row->image)}}" class="img-fluid" alt="{{$row->image}}">
                  </td>
                  </td>
                  <td>{{$row->name}}</td>
                  <td>{{$row->phone}}</td>
                  <td>{{$row->email}}</td>
                  <td>{{$row->roles}}</td>

                  <td  class="text-center">
                    @php
                    $args=['id'=>$row->id];
                @endphp
                 @if($row->status==1)
                 <a href="{{route('admin.user.status',$args)}}" class="btn btn-sm btn-success"> 
                   <i class="fa fa-toggle-on " aria-hidden="true"></i>
                 </a>
                 @else
                 <a href="{{route('admin.user.status',$args)}}" class="btn btn-sm btn-danger"> 
                   <i class="fa fa-toggle-off " aria-hidden="true"></i>
                 </a>
    
    
                 @endif
    
                
                <a href="{{route('admin.user.show',$args)}}" class="btn btn-sm btn-info"> 
                  <i class="fa fa-eye " aria-hidden="true"></i>
                </a>
                <a href="{{route('admin.user.edit',$args)}}" class="btn btn-sm btn-primary"> 
                  <i class="fa fa-edit " aria-hidden="true"></i>
                </a>
                <a href="{{route('admin.user.delete',$args)}}" 
                class="btn btn-sm btn-danger"> 
                  <i class="fa fa-trash" aria-hidden="true"></i>
                </a>
                  </td>
                  <td  class="text-center">
                    {{$row->id}}
                  </td>
                </tr>
              </tbody>
              @endforeach
          </table>
      </div>
  </div>
</section>
  
  
    
@endsection