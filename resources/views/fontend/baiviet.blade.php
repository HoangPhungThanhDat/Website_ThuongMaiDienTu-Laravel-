@extends('layouts.site')
@section('content')
<h1 class="col-12 text-center" style="margin-top:20px"> Tất Cả Bài Viết</h1>
<div class="container mt-5">
    <div class="row">          
        @foreach ($list_post as $postitem)
            <x-post-card :$postitem/>                  
        @endforeach           
            </div>
    </div>
        <div class="col-12 d-flex justify-content-center">
            {{$list_post->links()}}
        </div>
    </div>
</div>
@endsection
@section('title', 'Tất cả bài viết ')
@section('header')
@endsection
@section('footer')
@endsection 