@extends('layouts.site')
@section('content')
<!-- hiện thị sản phẩm -->
<div class="main" style="margin-top: 0px; max-width: 2400px; margin: 0 auto;">
    <div class="container-fluid">
        <div class="row">                    
            <x-flash-sale/>
            <x-product-new/>
            <div class="bg-white p-4">
                <div class="max-w-7xl mx-auto rounded-lg border border-gray-100 shadow-sm p-4">
                 <h2 class="text-lg font-extrabold text-slate-900 mb-4 select-none">
                  PHỤ KIỆN BÁN CHẠY
                 </h2>
                 <div class="grid grid-cols-2 sm:grid-cols-4 gap-2">
                  <div class="border border-gray-200 rounded-md flex flex-col items-center justify-center p-4 cursor-pointer select-none">
                   <img alt="Apple logo in gray-blue color" class="mb-2" height="64" src="https://storage.googleapis.com/a1aa/image/96ecfd42-6c63-4326-13f7-4feb33adde8b.jpg" width="64"/>
                   <span class="text-sm font-semibold text-slate-900">
                    Apple
                   </span>
                  </div>
                  <div class="border border-gray-200 rounded-md flex flex-col items-center justify-center p-4 cursor-pointer select-none">
                   <img alt="Samsung logo in gray-blue color" class="mb-2" height="32" src="https://storage.googleapis.com/a1aa/image/c6ebf5d5-6c59-4e6d-16b2-e31d28c29ac3.jpg" width="64"/>
                   <span class="text-sm font-semibold text-slate-900">
                    Samsung
                   </span>
                  </div>
                  <div class="border border-gray-200 rounded-md flex flex-col items-center justify-center p-4 cursor-pointer select-none">
                   <img alt="Icon representing phone cases in gray-blue color" class="mb-2" height="48" src="https://storage.googleapis.com/a1aa/image/7ca63781-d47d-47e1-a789-dc8fed95573e.jpg" width="48"/>
                   <span class="text-sm font-semibold text-slate-900 text-center">
                    Bao da, ốp lưng
                   </span>
                  </div>
                  <div class="border border-gray-200 rounded-md flex flex-col items-center justify-center p-4 cursor-pointer select-none">
                   <img alt="Icon representing tempered glass screen protector in gray-blue color" class="mb-2" height="64" src="https://storage.googleapis.com/a1aa/image/2938bf27-ff2b-47da-56c4-4734c992c9f1.jpg" width="32"/>
                   <span class="text-sm font-semibold text-slate-900">
                    Cường lực
                   </span>
                  </div>
                  <div class="border border-gray-200 rounded-md flex flex-col items-center justify-center p-4 cursor-pointer select-none">
                   <img alt="Icon representing charger cable in gray-blue color" class="mb-2" height="48" src="https://storage.googleapis.com/a1aa/image/8da33dca-bf50-4aea-c1e3-eec0ce9cfdd4.jpg" width="48"/>
                   <span class="text-sm font-semibold text-slate-900 text-center">
                    Cốc/Cáp sạc
                   </span>
                  </div>
                  <div class="border border-gray-200 rounded-md flex flex-col items-center justify-center p-4 cursor-pointer select-none">
                   <img alt="Icon representing power bank battery in gray-blue color" class="mb-2" height="64" src="https://storage.googleapis.com/a1aa/image/8ba71db4-a6e9-4bb3-1f13-a46a906bc34a.jpg" width="48"/>
                   <span class="text-sm font-semibold text-slate-900">
                    Sạc dự phòng
                   </span>
                  </div>
                  <div class="border border-gray-200 rounded-md flex flex-col items-center justify-center p-4 cursor-pointer select-none">
                   <img alt="Icon representing technology gadget in gray-blue color" class="mb-2" height="48" src="https://storage.googleapis.com/a1aa/image/a928da07-30ee-444f-0d85-f85993c43655.jpg" width="64"/>
                   <span class="text-sm font-semibold text-slate-900 text-center">
                    Đồ chơi công nghệ
                   </span>
                  </div>
                  <div class="border border-gray-200 rounded-md flex flex-col items-center justify-center p-4 cursor-pointer select-none">
                   <img alt="Bach Long brand logo in yellow background with red text" class="mb-2" height="32" src="https://storage.googleapis.com/a1aa/image/1b16cfa8-4e0a-44ae-c880-8721aa52ebc0.jpg" width="96"/>
                   <span class="text-sm font-semibold text-slate-900">
                    Thương hiệu
                   </span>
                  </div>
                 </div>
                </div>
               </div>
            <x-product-category-home/>  
            <x-post-new/>
    </nav>
</div>
<div class="social-icons">
    <a href="https://zalo.me/your-zalo-id" target="_blank" class="social-icon">
        <img src="../public/image/zalo.webp" alt="Zalo">
    </a>
    <a href="https://m.me/your-facebook-id" target="_blank" class="social-icon">
        <img src="../public/image/iconmess.webp" alt="Messenger">
    </a>
</div>


<!-- CSS CỦA NÚT ZALO VÀ MESS -->
<style>
body {
    margin: 0;
    padding: 0;
}

.social-icons {
    position: fixed;
    bottom: 20px !important;
    right: 20px !important;
    display: flex;
    flex-direction: column;
    gap: 10px;
}
.social-icon {
    display: block;
}

.social-icon img {
    width: 40px; /* Adjust size as needed */
    height: auto;
    display: block;
    border-radius: 50%; /* Optional: round icons */
    transition: opacity 0.3s;
    animation: shake 3s infinite; /* Apply the shake animation */
}

/* Hover effect */
.social-icon img:hover {
    opacity: 0.7; /* Optional: add hover effect */
}

/* Keyframes for shake animation */
@keyframes shake {
    0%, 100% {
        transform: rotate(0deg);
    }
    10%, 30%, 50%, 70%, 90% {
        transform: rotate(-10deg);
    }
    20%, 40%, 60%, 80% {
        transform: rotate(10deg);
    }
}


</style>

    </header>
@endsection
@section('title', 'Trang chủ')
@section('header')
@endsection
@section('footer')
@endsection




