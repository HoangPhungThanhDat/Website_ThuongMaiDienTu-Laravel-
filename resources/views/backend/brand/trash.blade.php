@extends('layouts.admin')
@section('title', 'Thùng rác danh muc ')
@section('maincontent')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Thùng rác danh muc</h1>
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
           
             
            <a href="{{ route('admin.brand.index') }}" class="btn btn-sm btn-info">
              <i class = "fa fa-arrow-left" aria-hidden="true"></i>  Về danh sách 
             
            </a>

          </div>
        </div>
      </div>
      <div class="card-body">
        <table class="table table-bordered table-hover">
          <thead>
              <tr>
                  <th style="width: 30px" class="text-center">#</th>
                  <th style="width: 90px"class="text-center">Hình</th>
               
                  <th>Tên danh muc</th>
                  <th>Slug</th>
                  <th style="width: 180px"class="text-center">Chức năng</th>
                  <th style="width: 30px" class="text-center">ID</th>
  
  
              </tr>
          </thead>
          <tbody>
            @foreach($list as $row)
            <tr>
              <td class="text-center">
                  <input type="checkbox"> 
              </td>
              <td class="text-center">
                  <img src="{{ asset('images/brands/' .$row->image) }}" class="img-fluid" 
                  alt="{{ $row->image }}">
              </td>
              <td class="text-center">{{ $row->name }}</td>
              <td class="text-center">{{ $row->slug }}</td>
             
              <td class="text-center">
                @php
                    $args=['id'=> $row->id];
                @endphp
                  
                  <a href="{{ route('admin.brand.show', $args) }}"
                  class="btn btn-sm btn-info">
                      <i class="fa fa-eye" aria-hidden="true"></i>
                  </a>
                  <a href="{{ route('admin.brand.restore', $args) }}" 
                  class="btn btn-sm btn-primary">
                  <i class="fa fa-undo"></i>
                  </a>

                  <form action="{{ route('admin.brand.destroy', $args) }}" 
                    method="post">
                      @csrf
                      @method('delete')
                      <button class="btn btn-sm btn-danger d-inline" name="delete" type="submit">
                        <i class="fa fa-trash"></i>
                      </button>
                        
                  </form>
  
              </td>
              <td class="text-center">
                {{ $row->id }}
              </td>
  
  
          </tr>
            @endforeach
          </tbody>
              
         </table>
       
      </div>
    </div>
  </section>
@endsection


