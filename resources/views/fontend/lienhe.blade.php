@extends('layouts.site')
@section('content')
<div class="container mt-5">
    <h1 class="text-center">Liên Hệ Chúng Tôi</h1>
    <p class="text-center">Nếu bạn có bất kỳ câu hỏi hoặc yêu cầu nào, vui lòng điền vào biểu mẫu dưới đây và chúng tôi sẽ liên hệ lại với bạn sớm nhất có thể.</p>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form>
                <div class="form-group">
                    <label for="name">Họ và Tên</label>
                    <input type="text" class="form-control" id="name" placeholder="Nhập họ và tên">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Nhập email">
                </div>
                <div class="form-group">
                    <label for="subject">Chủ Đề</label>
                    <input type="text" class="form-control" id="subject" placeholder="Nhập chủ đề">
                </div>
                <div class="form-group">
                    <label for="message">Nội Dung Tin Nhắn</label>
                    <textarea class="form-control" id="message" rows="5" placeholder="Nhập nội dung tin nhắn"></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Gửi Tin Nhắn</button>
            </form>
        </div>
    </div>
</div>
@endsection
@section('title', 'Liên hệ')
@section('header')
@endsection
@section('footer')
@endsection