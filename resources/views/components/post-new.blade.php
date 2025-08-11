<div class="container mt-5">
    <div class="row g-3 mb-4">
      <div class="col-md-6">
          <img src="{{ asset('https://bachlongmobile.com/_next/image/?url=https%3A%2F%2Fbeta-api.bachlongmobile.com%2Fmedia%2FMageINIC%2Fbannerslider%2Fbanner-quang-cao-left.jpg&w=1200&q=75') }}" class="img-fluid rounded banner-img" alt="Banner 1">
      </div>
      <div class="col-md-6">
          <img src="{{ asset('https://bachlongmobile.com/_next/image/?url=https%3A%2F%2Fbeta-api.bachlongmobile.com%2Fmedia%2FMageINIC%2Fbannerslider%2Fbanner-quang-cao-right.jpg&w=3840&q=75') }}" class="img-fluid rounded banner-img" alt="Banner 2">
      </div>
  </div>
  {{-- Tiêu đề --}}
  <h2 class="section-title mb-4">Bài viết mới nhất</h2>
    <div class="row">
        <!-- Sản phẩm 1 -->
        @foreach ($post_new as $post)
            <x-post-card :postitem="$post"/>
        @endforeach     
      </div>      
        <div class="col-12 text-center">                   
            <a href="{{ route('site.post.index') }}" class="view-all-btn">Xem thêm bài viết &gt;</a>
        </div>        
        </div>      
    </div> 
</div>

{{-- css của nút xem thêm sp  --}}
<style>
.view-all-btn {
  display: inline-block;
  padding: 10px 20px;
  border: 1px solid #000;
  border-radius: 20px;
  font-size: 16px;
  color: #000;
  text-decoration: none;
  transition: background-color 0.3s ease, color 0.3s ease;
}

.view-all-btn:hover {
  background-color: #000;
  color: #fff;
}
</style>





















