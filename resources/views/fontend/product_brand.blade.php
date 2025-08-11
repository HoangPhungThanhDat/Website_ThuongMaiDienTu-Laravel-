@extends('layouts.site')
@section('content')
<h1 class="col-12 text-center" style="margin-top:20px"> {{ $row->name}}</h1>
<div class="container mt-5">
    <div class="container mx-auto p-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
            @foreach ($list_product as $productitem)
                <x-product-card :$productitem/>            
            @endforeach    
        </div>
    </div>
</div>
    <div class="col-12 d-flex justify-content-center">
        {{$list_product->links()}}
    </div>
@endsection
@section('title', ' Sản Phẩm Theo Thương Hiệu')
@section('header')
@endsection
@section('footer')
@endsection