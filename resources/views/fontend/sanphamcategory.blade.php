@extends('layouts.site')
@section('content')
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
    </div>
</div> 
@endsection
@section('title', ' Sản Phẩm Theo Danh Mục')
@section('header')
@endsection
@section('footer')
@endsection 
