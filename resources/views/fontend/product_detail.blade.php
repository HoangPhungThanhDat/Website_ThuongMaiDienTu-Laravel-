
@extends('layouts.site')
@section('content')
<style>
    /* Hide scrollbar for thumbnails */
    .scrollbar-hide::-webkit-scrollbar {
      display: none;
    }
    .scrollbar-hide {
      -ms-overflow-style: none;
      scrollbar-width: none;
    }

    .youtube-container {
    position: relative;
    width: 600px;
    padding-top: 56.25%; /* Tỷ lệ 16:9 */
}

.youtube-container iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 525px;
    height: 315px;
    border-radius: 8px; /* Bo góc video */
}

    /* Custom style cho toast */
.swal2-popup.my-toast {
    background-color: #f0fff4 !important;
    color: #166534;
    font-weight: bold;
    border-left: 6px solid #22c55e;
    box-shadow: 0 4px 12px rgba(34, 197, 94, 0.3);
    padding: 1rem;
    border-radius: 10px;
}

/* Màu thanh thời gian */
.swal2-timer-progress-bar {
    background: #22c55e !important;
    height: 4px;
}


/* Bình luận */
#comment-list .border {
    transition: box-shadow 0.2s ease;
}

#comment-list .border:hover {
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}
  </style>
</head>
<body class="bg-white font-sans text-gray-700 text-xs leading-tight">
  <div class="max-w-[1200px] mx-auto px-3 py-3">
    <!-- Breadcrumb -->
    <nav aria-label="Breadcrumb" class="text-gray-500 mb-3 select-none">
      <ol class="flex flex-wrap gap-1 items-center text-[10px] font-normal">
        <li><a href="#" class="hover:underline">Trang chủ</a></li>
        <li><span>&gt;</span></li>
        <li><a href="#" class="hover:underline">Máy cũ giá rẻ</a></li>
        <li><span>&gt;</span></li>
        <li><a href="#" class="hover:underline">iPhone 14 Series</a></li>
        <li><span>&gt;</span></li>
        <li class="text-gray-400 truncate max-w-[200px]">{{ $product->name}}</li>
      </ol>
    </nav>

    <div class="flex flex-col lg:flex-row gap-6">
      <!-- Left: Images -->
      <div class="w-full lg:w-[55%] flex flex-col">
        <div class="relative border border-gray-300 rounded-md p-3 flex justify-center items-center">
          <button aria-label="Previous image" class="absolute left-2 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
            <i class="fas fa-chevron-left text-lg"></i>
          </button>
          <img
            src="{{asset('images/products/'.$product->image)}}" alt="{{$product->image}}" 
            alt="Red iPhone 14 front and back view with screen on"
            class="max-w-full max-h-[400px] object-contain"
            width="400"
            height="400"
          />
          <button aria-label="Next image" class="absolute right-2 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
            <i class="fas fa-chevron-right text-lg"></i>
          </button>
        </div>
        <ul
          role="list"
          aria-label="Product color thumbnails"
          class="mt-3 flex gap-2 overflow-x-auto scrollbar-hide px-1"
        >
          <li>
            <button class="border border-gray-300 rounded-md p-1 focus:outline-none focus:ring-2 focus:ring-yellow-400">
              <img
                src="http://localhost/Website_SmartPhone_LARAVEL/Website_SmartPhone_LARAVEL/public/images/products/iphone13.jpg"
                alt="Thumbnail of Yellow iPhone 14"
                class="w-14 h-14 object-contain rounded"
                width="60"
                height="60"
              />
            </button>
          </li>
          <li>
            <button class="border border-gray-300 rounded-md p-1 focus:outline-none focus:ring-2 focus:ring-yellow-400">
              <img
                src="http://localhost/Website_SmartPhone_LARAVEL/Website_SmartPhone_LARAVEL/public/images/products/iphone-x.jpg"
                alt="Thumbnail of Black iPhone 14"
                class="w-14 h-14 object-contain rounded"
                width="60"
                height="60"
              />
            </button>
          </li>
          <li>
            <button aria-current="true" class="border-2 border-yellow-400 rounded-md p-1 focus:outline-none focus:ring-2 focus:ring-yellow-400">
              <img
                src="http://localhost/Website_SmartPhone_LARAVEL/Website_SmartPhone_LARAVEL/public/images/products/iphone12.webp"
                alt="Thumbnail of Red iPhone 14 selected"
                class="w-14 h-14 object-contain rounded"
                width="60"
                height="60"
              />
            </button>
          </li>
          <li>
            <button class="border border-gray-300 rounded-md p-1 focus:outline-none focus:ring-2 focus:ring-yellow-400">
              <img
                src="http://localhost/Website_SmartPhone_LARAVEL/Website_SmartPhone_LARAVEL/public/images/products/iphone-17.webp"
                alt="Thumbnail of Blue iPhone 14"
                class="w-14 h-14 object-contain rounded"
                width="60"
                height="60"
              />
            </button>
          </li>
          <li>
            <button class="border border-gray-300 rounded-md p-1 focus:outline-none focus:ring-2 focus:ring-yellow-400">
              <img
                src="http://localhost/Website_SmartPhone_LARAVEL/Website_SmartPhone_LARAVEL/public/images/products/iphone-17.webp"
                alt="Thumbnail of Purple iPhone 14"
                class="w-14 h-14 object-contain rounded"
                width="60"
                height="60"
              />
            </button>
          </li>
          <li>
            <button class="border border-gray-300 rounded-md p-1 focus:outline-none focus:ring-2 focus:ring-yellow-400">
              <img
                src="http://localhost/Website_SmartPhone_LARAVEL/Website_SmartPhone_LARAVEL/public/images/products/iphone11.jpg"
                alt="Thumbnail of Green iPhone 14"
                class="w-14 h-14 object-contain rounded"
                width="60"
                height="60"
              />
            </button>
          </li>
          <li>
            <button class="border border-gray-300 rounded-md p-1 focus:outline-none focus:ring-2 focus:ring-yellow-400">
              <img
                src="http://localhost/Website_SmartPhone_LARAVEL/Website_SmartPhone_LARAVEL/public/images/products/iphone-xs.jpg"
                alt="Thumbnail of Orange iPhone 14"
                class="w-14 h-14 object-contain rounded"
                width="60"
                height="60"
              />
            </button>
          </li>
        </ul>
      </div>

      <!-- Right: Product info -->
      <div class="w-full lg:w-[45%] space-y-3">
        <div class="border-2 border-yellow-400 rounded-md p-4">
          <h1 class="text-black font-semibold text-base leading-tight mb-1">
           {{ $product->name}} 128Gb Chính Hãng 99,9%
          </h1>
          <div class="flex items-center gap-2 mb-2">
            <div class="flex text-yellow-400 text-sm">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star-half-alt"></i>
            </div>
            <a href="#" class="text-blue-600 underline text-xs">1 Đánh giá</a>
            <button
              class="text-xs border border-blue-600 text-blue-600 rounded px-2 py-0.5 hover:bg-blue-600 hover:text-white transition"
            >
              So sánh
            </button>
          </div>

          <div class="flex gap-2 mb-2">
            <button
              class="bg-yellow-400 text-black font-semibold rounded px-3 py-1 text-xs"
            >
              128GB
            </button>
            <button
              class="border border-gray-300 rounded px-3 py-1 text-xs hover:bg-gray-100"
            >
              256GB
            </button>
            <button
              class="border border-gray-300 rounded px-3 py-1 text-xs hover:bg-gray-100"
            >
              512GB
            </button>
          </div>

          <p class="text-[10px] mb-2 font-semibold">
            Chọn màu để xem giá và chi nhánh có hàng
          </p>

          <div class="grid grid-cols-3 gap-2 text-[10px] mb-3">
            <button
              class="border border-gray-300 rounded px-2 py-1 text-center hover:bg-gray-100"
            >
              <p class="font-semibold">Red</p>
              <p>11.990.000 VND</p>
            </button>
            <button
              class="border border-gray-300 rounded px-2 py-1 text-center hover:bg-gray-100"
            >
              <p class="font-semibold">Starlight</p>
              <p>10.890.000 VND</p>
            </button>
            <button
              class="border border-gray-300 rounded px-2 py-1 text-center hover:bg-gray-100"
            >
              <p class="font-semibold">Midnight</p>
              <p>10.890.000 VND</p>
            </button>
            <button
              class="border border-gray-300 rounded px-2 py-1 text-center hover:bg-gray-100"
            >
              <p class="font-semibold">Purple</p>
              <p>11.990.000 VND</p>
            </button>
            <button
              class="border border-gray-300 rounded px-2 py-1 text-center hover:bg-gray-100"
            >
              <p class="font-semibold">Blue</p>
              <p>10.890.000 VND</p>
            </button>
            <button
              class="border border-gray-300 rounded px-2 py-1 text-center hover:bg-gray-100"
            >
              <p class="font-semibold">Yellow</p>
              <p>11.990.000 VND</p>
            </button>
          </div>

          <div class="flex gap-3 mb-3">
            <div
              class="flex-1 border border-yellow-400 rounded p-2 text-center text-[10px]"
            >
              <p class="font-semibold line-through text-gray-500 mb-1">
                47.990.000 VND
              </p>
              <p class="text-red-600 font-bold text-sm">-49%</p>
            </div>
            <div
              class="flex-1 border border-yellow-400 rounded p-2 text-center text-[10px]"
            >
              <p class="font-semibold mb-1">Mua trả góp</p>
              <p class="text-red-600 font-bold text-lg">{{number_format($product->price)}} VNĐ</p>
            </div>
            <div
              class="flex-1 border border-yellow-400 rounded p-2 text-center text-[10px]"
            >
              <p class="font-semibold mb-1">Mua thẳng</p>
              <p class="text-red-600 font-bold text-lg">{{number_format($product->price)}} VNĐ</p>
            </div>
          </div>

          <div
            class="bg-yellow-400 rounded p-3 text-white text-xs font-semibold flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2"
          >
            <div class="flex items-center gap-1">
              <span class="text-2xl font-extrabold">Chỉ 5 phút</span>
              <span>THU CŨ LÊN ĐỜI 100% GIÁ TRỊ MÁY</span>
            </div>
            <i class="fas fa-arrow-right text-xl"></i>
          </div>
        </div>

        <div class="flex flex-wrap gap-2">
          <button
            class="bg-red-600 text-white rounded w-full sm:w-auto px-6 py-2 font-semibold hover:bg-red-700 transition"
             id ="basic-addon2" onclick="handleAddCart({{$product->id}})"
          >
            MUA NGAY
            <br />
            <span class="text-xs font-normal">Giao hàng tận nơi</span>
          </button>

          
          <button
            class="border border-red-600 text-red-600 rounded w-full sm:w-auto px-6 py-2 font-semibold hover:bg-red-700 hover:text-white transition flex items-center justify-center gap-2"
            id ="basic-addon2" onclick="handleAddCart({{$product->id}})"
            >
            <i class="fas fa-shopping-cart"></i>Thêm giỏ hàng
          </button>
          Số lượng:<input type="number" value="1" min="0" aria-describedby="basic-addon2" id="qty">

          
          <button
            class="border border-gray-300 text-gray-600 rounded w-full sm:w-auto px-6 py-2 font-semibold hover:bg-gray-100 transition flex items-center justify-center gap-2"
          >
            <i class="far fa-heart"></i> Yêu thích
          </button>
        </div>

        <div class="flex flex-wrap gap-2">
          <button
            class="bg-blue-600 text-white rounded w-full sm:w-auto px-6 py-2 font-semibold hover:bg-blue-700 transition"
          >
            TRẢ GÓP 0%
            <br />
            <span class="text-xs font-normal">Duyệt nhanh qua điện thoại</span>
          </button>
          <button
            class="bg-blue-400 text-white rounded w-full sm:w-auto px-6 py-2 font-semibold hover:bg-blue-500 transition"
          >
            TRẢ GÓP 0% QUA THẺ
            <br />
            <span class="text-xs font-normal">Visa, Master Card, JCB, AMEX</span>
          </button>
        </div>

        <div class="flex flex-wrap gap-2">
          <button
            class="bg-blue-100 text-blue-700 rounded w-full sm:w-auto px-6 py-2 font-semibold hover:bg-blue-200 transition flex items-center justify-center gap-2"
          >
            <img
              src="https://placehold.co/20x20/png?text=Z"
              alt="Zalo icon"
              class="w-5 h-5"
              width="20"
              height="20"
            />
            Chat Zalo
          </button>
          <button
            class="bg-yellow-400 text-black rounded w-full sm:w-auto px-6 py-2 font-semibold hover:bg-yellow-500 transition flex items-center justify-center gap-2"
          >
            <i class="fas fa-phone"></i> Gọi Ngay Gì Tốt
          </button>
        </div>
      </div>
    </div>

    <div class="flex flex-col lg:flex-row gap-6 mt-6">
      <!-- Left bottom: Product info and store locations -->
      <div class="w-full lg:w-[55%] space-y-4">
        <div
          class="border border-red-400 rounded p-3 flex gap-3 items-center max-w-[300px]"
        >
          <img
            src="https://encrypted-tbn0.gstatic.com/shopping?q=tbn:ANd9GcShjlVzmscBjsE286Xho73Qulkh6yBokzmLE_rCelX4gIgkxdwZsAzCBY6XIzD-uHlnthNETRrEauT06qsKAoZsCZqGNptsu3QzdBPhmZLnSTbis_p1u1iUBAKnWmQ_hev6zDAO6O8bLIA&usqp=CAc"
            alt="Cốc sạc nhanh siêu nhỏ 20W Innostyle Ultra Miniclube charger product image"
            class="w-20 h-20 object-contain"
            width="80"
            height="80"
          />
          <div class="flex flex-col text-xs text-gray-700">
            <p class="font-semibold text-red-600 mb-1">Mua kèm giá sốc</p>
            <p class="font-semibold">
              Cốc sạc nhanh siêu nhỏ 20W Innostyle Ultra Miniclube...
            </p>
            <p>Giá niêm yết: 420.000 VND</p>
          </div>
        </div>

        <div class="border border-gray-300 rounded p-3 space-y-1 text-xs text-red-600 font-semibold">
          <p>
            Hàng được ưu tiên từ khách có nhu cầu bán lại, thu cũ đổi mới,
            ngoại hình đến 99% như máy mới
          </p>
          <p>Bảo test 60 ngày đổi trả tại Bach Long Mobile</p>
          <p>Hỗ trợ đổi trả NSX (Nổi nâng cấp gói bảo hành toàn diện)</p>
          <p class="text-black">Bảo hành 12 tháng</p>
        </div>

        <div class="flex items-center gap-2">
          <p class="text-red-600 font-semibold text-lg">
            Tạm tính:
            <span class="text-2xl">{{number_format($product->price)}}</span>
          </p>
          <p
            class="text-red-400 text-xs border border-red-400 rounded px-1 py-0.5"
          >
            0.00%
          </p>
        </div>

        <div class="flex flex-wrap gap-2">
            <button
              class="bg-red-600 text-white rounded w-full sm:w-auto px-6 py-2 font-semibold hover:bg-red-700 transition"
               id ="basic-addon2" onclick="handleAddCart({{$product->id}})"
            >
              MUA NGAY
              <br />
              <span class="text-xs font-normal">Giao hàng tận nơi</span>
            </button>
  
            
            <button
              class="border border-red-600 text-red-600 rounded w-full sm:w-auto px-6 py-2 font-semibold hover:bg-red-700 hover:text-white transition flex items-center justify-center gap-2"
              id ="basic-addon2" onclick="handleAddCart({{$product->id}})"
              >
              <i class="fas fa-shopping-cart"></i>Thêm giỏ hàng
            </button>
            <input type="number" value="1" min="0" aria-describedby="basic-addon2" id="qty">
  
            
            <button
              class="border border-gray-300 text-gray-600 rounded w-full sm:w-auto px-6 py-2 font-semibold hover:bg-gray-100 transition flex items-center justify-center gap-2"
            >
              <i class="far fa-heart"></i> Yêu thích
            </button>
          </div>

        <div
          class="border border-gray-300 rounded p-3 max-h-[180px] overflow-y-auto text-xs text-blue-600"
        >
          <p class="font-semibold mb-1">TP Hồ Chí Minh</p>
          <ul class="list-disc list-inside space-y-1">
            <li><a href="#" class="hover:underline">1900.63.64.69</a></li>
            <li>
              <a href="#" class="hover:underline"
                >15023 Đường Tân Phú, Phường 04, Quận 05, Hồ Chí Minh</a
              >
            </li>
            <li><a href="#" class="hover:underline">1900.63.64.69</a></li>
            <li>
              <a href="#" class="hover:underline"
                >15023 Đường Nguyễn Thị Thập, Phường Tân Phong, Quận 7, Hồ Chí
                Minh</a
              >
            </li>
            <li><a href="#" class="hover:underline">1900.63.64.69</a></li>
            <li>
              <a href="#" class="hover:underline"
                >2255 Đường Tân Quang Hiệp, Phường Tân Quang Hiệp, Quận 12, Hồ
                Chí Minh</a
              >
            </li>
            <li><a href="#" class="hover:underline">1900.63.64.69</a></li>
            <li>
              <a href="#" class="hover:underline"
                >2162/21 Đường 2 Tháng 9, Phường 12, Quận 10, Hồ Chí Minh</a
              >
            </li>
            <li><a href="#" class="hover:underline">1900.63.64.69</a></li>
            <li>
              <a href="#" class="hover:underline"
                >2162/21 Đường Vạn Ngân, Phường Bình Thọ, Thành phố Thủ Đức, Hồ
                Chí Minh</a
              >
            </li>
          </ul>
        </div>
      </div>




      <!-- Right bottom: Related products -->
      <div class="w-full lg:w-[45%] space-y-4">
        <div class="flex items-center justify-between mb-2">
          <p class="text-red-600 font-semibold text-sm">Phụ kiện mua cùng</p>
          <button
            class="text-red-600 text-xs border border-red-600 rounded px-3 py-1 hover:bg-red-600 hover:text-white transition"
          >
            Xem sản phẩm
          </button>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
          <div
            class="border border-gray-300 rounded p-2 flex flex-col items-center text-center"
          >
            <img
              src="data:image/jpeg;base64,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"
              alt="Ốp Lưng UNIQ HYPERDOME màu đen product image"
              class="w-20 h-20 object-contain mb-1"
              width="100"
              height="100"
            />
            <p class="text-xs font-semibold">ỐP LƯNG UNIQ HYPERDOME</p>
            <p class="text-red-600 text-xs font-semibold">250.000 VND</p>
          </div>
          <div
            class="border border-gray-300 rounded p-2 flex flex-col items-center text-center"
          >
            <img
              src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxIREhUSEBAVEhIXFRUVFRUVGBUVEBUVFRcXFhcVFRUYHCggGBolHRcYITEhJSkrLjAuGB8zOjMtNyotLi0BCgoKDg0NDw0NGi0ZFRkrLSsrNC0tOCsrNysrNy0tKzErKysrKzgrNzIrKysrKysrKzc3KysrKysrKysrKysrK//AABEIAOEA4QMBIgACEQEDEQH/xAAcAAEAAgMBAQEAAAAAAAAAAAAABAUBAgMGBwj/xABOEAACAgECAwMGBwoLBwUAAAABAgADEQQSBSExE0FRBiJhcXKRFDJCUoGhsQcjMzRTYnOzwdIWJENVkpSytMLR4RVjgoOTw/AIVGR0ov/EABQBAQAAAAAAAAAAAAAAAAAAAAD/xAAVEQEBAAAAAAAAAAAAAAAAAAAAAf/aAAwDAQACEQMRAD8A+zREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEROWrbCMfR9vKBW6nixL9lTgtjJPcFzjcT8kZBA6k4OByOJ1WksI86zzvAEkfaJ4W7iHY1vaObM1zH1adSu0eGdnvYmfP7fKvW7+1+FWBs52gkV+rs/i49GIH3R+RwbCD7LfvwGH5U/0W/flXwLip1ekrucYcqpP/EoJH0HP0YkoGBMGPyp/ot+9HL8qfc370jAwIEnl+V+pv8AObDH5T+1KzVaplztUEAgEsxUZIB7lPLBHP098j6fiNr9NMSMkb1es1ZB2kjcVcrnPPb3HAPLIXoU/JfP08/cRz9820mo3+sdfs+jmCMeiRAZHovxqSPEIT63Dgn3Uj3mBbX3BBk+oDvJ7gJC0973c1IC9xzgH1Hv9fITh5RudoUHGcrkdQXG0EekHnPFeXflBbplWrTt2ZYlQR1VUAzjwPnLg92DA+jNpyBncT6sn/FOfL559x/enxvyQ8rdVXqq0a97UsbaQ7F8E9CCeY54yO8T7DaQTkcgeePCB0wPnn3H96MD8ofcf3pxBmYHXA+efcf85nA+efr/AM5C1Fj9K8Z2lskFvUAuRknn38semV2m1+osJFYpsC7dzN2lJBYbggrw5Y4KkkkDn3nIAX4A+efrhiV5htwz456+nukRrgle+1lQKm6xs4rXaMudx6KMHme6bUWrYgYZ2uoOGDK21hnmrAFTg9CARAno4IyOhm0gcHtLIc+I95VWP1kyfAREQEREBERASNxH8G3qH2iSZF4p+Cf1D7RA+Z8Yb+Kn2df9ts8L/s+htG+oOrUXh8CjluIyB0zk8iTkDHL14+g67RPbpHFa5ONaoHeWdrVUD1nlPj7MMZJwR9GIo+8+QH4hV+jr+wS8AlR5Fadq9FWjgqwrqBB6ghRlT6Qcg+qXEDImlxPmjOMtjPLI5E8s+kAfTOggjPXp9UCr4pVYEdandrGBPm7QyAD4+SPjjGE8TtyCAzSINbclaV0ULWmDWhwdqYIrrVV5ZAAewjqEQLgscS/QAcgAB4DkJpqK9wxkj0jBP18vfy8QRkQIHCOI2Xux2bKlGDkHf2hw23dnBKrgNgY3Mwz5mW6NbjWVr3sE9WFF5P2yZpqVrUIgwo9ZPPmSSeZJJJJPMkkyvuQ/D6GA5BcH0ZFuPsMCd5RnnX7df9qfMfunsO0qycAvaCeuB9654HWfTfKP41ft1/258z+65pHHZWY8ze4J7hvCbc+vYfq8YFOvD6NPxDSrp9UupUsjFl2nac9CVJHpx1n3Fug9U/PXkfQX1tIQE4YufQFBOT4cyF9bAd8/Qrd3qgYE0uJ2nHX0cz6SB3nHdN5mBAuReZrJsfGFXtHKg/nMDlUPLcO/aMAnANdpdDfQX7FRYMHkxC9qyq77jjGxrLrSSeYATGPO830EQPL6qrV2KFd8qbNpKqFJNRCghCCNpIstHMc1pQ9XM9ShPfjPfjp9ExMiBF8nbNws8Ayj6di5+wS4lJ5MqR22R/KAj05UHl75dwEREBERAREQErvKC8Jp7GPh9ec/sljKXyxP8Us/87jApvJ9vveRj8JfyPMEG6zkR3iSrOF6Rn7YaKlb8g9ptQuG+dv278+nOZE4D+C/5l3615aCBugwMf6CbAzUTG7HWB1E1puVxuRgw5jKkEZBIIyPAgj6J871/lrbZvRa1Wlgyj4wu2kYzvzgH6P85d+QnErbVavsq0prAClNwO4nOMEnd3knI69+eQetBmZrMwMgyo4jYV1FRHin1drLUyq11e7UVAeK/wDcgSvKS8dtXX3+Y3oAFgH7fqkuylHUpbWtqEYKsMgg9fo9B5GVXlH+OV+yn6xZcCBE0PCNNRn4Pp66QcE7FRSSOhO0DP09Ocn5momYGZrbcqDLsFGQMsQBknAGT3k90q/KXjHwSjtAoZiwRAfi7iCcnHcApP1cp4DWeVdtzVPZXWWqYsnJxVuOMMybubDHI55ZPIwPq2ZmQeC6iy2iuy5VR2UMQpO3B5g8+mRjlzx4ybAzETECD5Pue1tXu2qfdgftMvpReT6ffbW9AHv5/sl7AREQEREBERASk8s/xSz/AM7jLuQeODOns9n9ogeY4CfvZ/S3/rrJZgys4MfMb9Nf+uslgDA6gzPrmgmdwAyeQHMnuED5Pr+EW03NSEdiCduFLFk7mGBz5e48p6T7ni3B7OWKceduB/CDkAvp65+j0T0A46LOWjrbU/nqdmkHrvIww5fyYcjwkXXXOW2W6ix3xz02iXa+GB29pafPTocOXqBMD0oM2DTxi8M1Od1WnfTADkV1r2ak8vl02K1Fjd3nufaHWWfB+O727K/C2g7dyhlrduoUq3nVWkYPZt1Bypcc4F/Kfih+/V+tf+5LYSu1VG/UIPDafoG/P04gY8pPxtPZT9akt1kbylHn1n01/rV/0nS+9a0LucKoyeRJ9QA5k9wA5k8oHYGZnka7NZq2Zq37JQSuCcUVkHBTNeH1FwIw+HWtTlQWKsZM+Ca5CPv/AGigHIRq1ye7Fd1Tnx/lh9MDv5ZcNbUaZlQZdGFigdSVBBA9O1mwPHE+XfBn27uzfYDgttbaD4E4xmfSU43qK/w9QQcye1U0BFHjcjXUMfW6fUZPr8oawM3LZpvN3brlxSB4/CELU/8A7gPJQXDS1jUDDgYUYwwQckD/AJ2P2Z55luDNKrVYBkYMp6MpBU+ojrNoG2YmuZkQK/gB+/2+z+0T0Mo+A04ssfx5e48/2S8gIiICIiAiIgJC41+At9gybIXGvwFvsGB5XhHxG/Taj9dZLASv4P8AEf8ATaj9fZJGu1a01va2SqKWIHNjjoqjvYnAA8SIEbWcSc2/B9MqtaFDWO+TTQrZ27gMF3bBwgI5AkkDGd14IjndqXbUnOQtmOwU8iNtCgJyI5FgzDxjgmiaqv75g3OxtuI5g2v1APeqjCL+aiyyBgLatwxuZR+adpI8MjmB6iDymaKVRdqKFXJOFAAyeZPLvPjGZAv4zWCyV7r7FJU10jewYDO135JWfbZYFnmV/FeE16gecNr4Kh1xu2n5LAgh079jAjODjIBFFrW1j251WnsGnGDWNHaDYj/Ov+I7Edy15XrkNynTTcYuUhRYuqB3bUtVtHxA7QSQK7FC2tgE9K+XPpzgSOH8Rt0zrp9YdwblVfz2tj5LFiTn2iSB1LYLm4r/ABpPY/ZZONiV6ugYOUsUMpI5g9VJVuhB6qfSCOolb5GcUGqNLgMCEKlX3Cxcb9ofdzLbSpJ6HPKB6Dym+NX7Vf65JS661tVeKKyRXWc2urEEEEr5pHyshlXwYO/I1pumfdD1bU0mysbrQF7NfnWdqmwerOM+gGa+T2hTSaVQWHxe1utbzdzbQWdyegAAHM8lUDugWtFKoqoihUUBVVRhVUDAAA6ACY02pSxd1brYuSNyEMuVOGGR3ggieWv0es4gfvjLptEw8yvDNqLVJ63qQNuRghMkDOHV+kP5IvT5+jvffjnufsnY4AGbK0KMBzwtlVgHILsUAQPYAyL/ALOrBLIDUxOSayUBPiyjzXPpYGee4bxfVU6mvT61X2XBlqtdaQDcgDbN9LkNuXefOSvmmADnl6uBVPwCrJetmqvJybqwlbscYHaKihLR6HU/ZiVwzVs4ZbBi2ttlgAIUnAIsQEnzGBBHM45qTlTJcquMOaSNUqllQbb1UZZqOZ3gDmWrJLAd6tYACSIFtMzRHBAKkEEZBHMEHmCD3iZga8C+X7TfbLaVPAfl+032y2gIiICIiAiIgJC41+At9gybIXG/xe32DA8pwj4r/ptR+vsnPWffr66eqV7b7fAsCRQh5fOVrPEGpfGaaXVpTTdba22tLdUzHwC3259Z9E68Cqfszbau225u1dfmZAVK/wDhRUU45Ehj3wLMTYGaCbQIfF+JChCQA9pwtVWcNZY3JF9AzzJ7gGPQGOB8O+DUrXu3v5z2PjBstclrLCO7LEnHcMDukO6tBr62dcsdPYtTHorK4NgHgxVl+hW9MuoG046zSpchSxdy8j1IIYHKsrDmrA8wwIIIyJ0jMCm02n1OmdioGpobLFRtTUiw9WCnFbFuZbBQE8wuS26J5F8Osp1lm5ClZCJSDjcaq0cISoJwQCE9PZ7u+elBnHTH+Np7B/xQOH3Q9G9q1BAjYsrLI+QLENio1e4A7ch8ZweWR35HZtNZcR24VagQeyUl95HMdq2ANoPyBkHAySPNkvyn6p66v19U6iBtMzEQInFuGpqajVZkc1ZXXlZXYh3JYh7mUgEe45BImnBta9gsruA7alxVYV/BuTWli2IDzAZbFO09DkZIAJnyp8nsN29wzi7UOwz3rUqaZWH5rCjcD3hgYFxGZiIFJwRTprG0Zz2fnW6UnoKiRvo/5TMMD5joPkmXsgcX0jWIDWB21bC2knkO0UEbScHCupasnHxXOOc76HVLdWliZ2uoYZGGGfksD0YdCO4gwO3AOj+039oy2lT5P9H9pv7RltAREQEREBERASFxr8Xt9gybIXG/xe32DA+ZaLTNrXKsMaOrU32Hw1No1FjIB40pyJPRmwOgzPYZlbwGsLWyqAqi7UgAYAAGotAAA6ADullA2EyBMCbiBX8a0hsQbHCXK4ehm6C1QcAjvVlLKwHPazTpwjiK6ivcAUdSUsrb49Vi/Grb0juPQggjkZLsrVgVZQynkQRkEekTzer4BqK7xqtFqMkKEsovJKW1jGFNwBcFfOKs28gsRnbkQPTRKqvj1YYJqFfSuTgC4AVsegCXKTWxPcu7d6JbGBgTjpT/ABuv2D/inYTjpfxtPYP+KBK8qOqe1V/eKp2E4+VPVPap/vFU7CBkTM1LAAkkAAZJPIADqSfCU1+uv1K40G1EI/G7F3V4OedFXI3HoQxKpzBBfpAm8SZrM0VPtdgN7j41VZ5Fh4OQCF8DluYXBmUUqiqiKFRVCqo5KqqMBQO4ADEg6DhCVrhne453E2HIZuWWZRyY8hzbJGAAcASygIiZgYlA2o+B6giwY0moYMj/ACadS589H+alhwwb57OD8ZZfznqdOliNXYodGBVlYZVlPUEQOnk/0f2m/tNLaef8jtK1VbobDYquwQtzcJk7Vdvlkcxu6kYzk5J9BAREQEREBERASDxz8Xt9gydIXG/xe32DA8lwT4j/AKfVf3i2WEr+B/Ef9Pqv7xbLLbAwIdsAnGcAnHecSr4lx6ql+yAe6/GexpUvYB3F/k1j0uROFXENe55aCupf97qPPI9mqpwPfAtBqyPjVkDljGD1zzOcY6TpVqgxxtYdeoA6DPjITNqz8UUIfEiy0e7KZ+qRzTxDr8J049HwWzH95gXboGBVgCpGCCMgjwIPWVo4W1P4pZ2S/kXBfTd3JFzuq5DA2HaM52kzjXq9ZWcXaZLl+fp2Kt6zTaenqcn0d0naLilNp2I+LMZNbhq7wMkZNTgMByPPGDA10XEtz9lanY343bCdyuo6tU+B2ig4zyDDIyoyMyNL+Np7P7814hoEvTZYDyO5WU7bK3HR62HNWHiPsJEg8But+FrTqOdqLysA2pcmHxYB8lu5l7j6GWBc+VXWv2qf7xVOfEeIJQgazJJIVEUbrbHPRK1Hxm5E+AAJOACRt5XWBQrMcKpqLE9ABchJ+qQtCFyup1JCXWKFrWxlBqRsEUoM43nlvIzlsDJCqAGa9A9+H1gGAQyacHdUuPim49LnHXHxFOMAlQ5t5Bu4pWCy15vsXka6sOwbGdrtkJWSPnsvUTlampsxlhQnza8PceffY67VyORAUnwYdYE7UWlcbU3E/R4d85jW+Nb55chjv8OfSVlfk/WG3MdQ7d5bVao9fBRYFHuE6Hg6jJR9ShPLI1OobHpCWOyfVAtaLg4yARzxzGDynWeau4Trh+C4paMd1tGltB9B21oT7xOmn4jqdOyprhW9bsEXU1Bq1VyQFS+pidm4nAcEjJAIGRkPQzMCIGPJ/o/tH7TLaVXAOj+0ftMtYCIiAiIgIiICQuN/i9vsGTZB44f4vb7BgeT4B+Df/wCxq/7zdHGdc67aNPg6mwHaSMpUg5NfZ+aOgHymwPEjhoNWtNFljAnGo1QCjG53OqtVa1zy3MxCj0kSbwjQtWGe0hr7CGtYcwCPi1ofyaA7R482PNjA14RwivS19nUCSTuscnNtrnm1ljfKYn/ISbtOe/GB/rOgE2EDjtPp+vx/ym+31/X6f9J1AmcQOGw5HXHf9f1TGs0Ndy7bq0sXOQHUMAfEZ6H0iSMTIECh1XBLVx8G1l9YU57Mslit15Cy6t3Xr0JI5YwOo48Mtus1+n7WgqawxawjYMNVauzbkjcSQTsZ18wHd3D0uJFpH8ar9X7LIHTyyp3qEPRjWp/4rFErtJ5NrhvhDC4uMWNtxZcO8WuWLFMk4rUqgDFdpEtfKnrX7VX65JIEDXT0JWoStFRFGFVQFRR4BRyAgg5+jl4Z9M3mQIHHacd+fp+n6plVOe/6+4/tnaZgcsH0+n/z3TmdMHRktUOrKVZW5qykYIIPXPQyTECr4Va1bHS2sWdF3VOc7rqAQAxJ62ISFf1q3LeALSQ+LaNrU+9sEuQ76XIyFcAjDDvRgSrDrtY4wcEZ4VrxqKhYFKHLK6N8euxCVetvSGBGeh5EciIErgPR/aMtZV8CHJvaP7JaQEREBERAREQE4a6rfW6nvUzvED5vwKvtLbM866LrineGuud3sfp8je9Y/ONoPNRPSSVruFkNvqyD6AOWe7GMFfQRNRbjk2nJPiFcD3DMDhMidDd/8c/0bZstmf5D3iwftgc5kCRv9oW5P8T5Z5fhySPEgLy95nTT6x2ODptvp23f4sQO0zMNqSOXYH6EsI/tzA1R/In/AKVv78DaR9BWW1RbuTao9pQ5f9Yg9amSUusYYWspnlkIyn6CxJHrBlhw7RCsek+4DwECF5S0FlUgZIOR6Sh3qPWSJlDkAjoeY9UtL6Q6lT/qD4iVYqes42lh6BkH047j6j9EDaZE1+Fj8g/9F5j4WPyL/wBF4HSJyu1ZVcihmPhh/rxkj3TieJt/7Zv6Fx/wwJgmZxq1hIyaSPRsfPuJBmPh3+5f/p2fvQO8pte3wW34Rg9jaVTUAD4tmAtV/wBPKpvXUeQUyz+Hf7lv+lZ+9MajT/CFNdlf3tgVZWXzSrDBBXv5eMCRwOoqnndeWfawNw98sZpTWFAUdBN4CIiAiIgIiICIiAiIgIiICIiAiIgIiICInPT2h1VxyDANz68xmB0icqbgxcAHzGCH0koj5How49xnOrWq1rVAHKgHJxtY8twXnk7dyZ5Y88DnzwEmJE1OosTn2aFdyqPvjA+ewQEjs+XMjPP3zY6hlBa1VRQOqszsSSAAF2AkknAAyScADnAkxIh1TgbjQ+30FWsHiSik59Skn0ZlH5b+WlXDKK9Q9bXJY4RezKjqpcNk9RgfXA9PE+Y6f7r/AGlfa18I1j1c/vijdX5vxjuAxy7/AAmdL913tU7Srg+tsr54dF3IcdcMFwcd8D6bE+XV/dkVkexeFas1oSHcYKIRjIdsYUjIznpkTK/diBq7ccJ1ZpwT2oA7LAO0nfjGARjPjA+oRPIeQHl9VxY3Cqh6jUEJ3lSG37sYx7P1z18BERAREQEREBERAREQEREBERAREQMiQdFWWoqAsZPMTmuwk+b089WEmzCqAAAAAOQA5ADwAgVmmsNQ1JLGxhcoXdtBZmp06omVUAZYgZx3ze3TmqtWHnNUe0JGd1hbcbvNHewZmAz8bb4Sd2S5ztGc7s4Gd2Nu714AGfCbwIuvIKKQcg2UYI6EdtXzEcQOAjn4qOGf2drLu9Slg/qXM7ipQAoUbRjAwNo2424HdjAx4Ym8DR7VVd7MAgGdxI248c+E+Rfd4UjhumyCM6t3AIwVVxc6qR3EKwGO7E+sLoag24U1hs5DBFDZPU5xnPpmvEOG0ahQmooqvQHcFtRLFDYI3AOCAcEjPpMD8r66oansb69XVUldFNZFjlLaHorVWC1jLMHcM4NYPOw5wcyfw+xLNVotWNZXTVSulVw77bqDp1RXCVdXDsGcFAV++HcVO7H6K/gjw7+bdH/VqP3I/gjw7+bdH/VqP3IH5wrsqeq3tb6Wpzq3UbmXVU3OCqCpQR2qWFas8mUDfnZ8Y2F3FaS66tF0SounRcs+pbUoUpFR03wcXKHB5oCF7MqcsRzE+/8A8EeHfzbo/wCrUfuR/BHh3826P+rUfuQPlP8A6bfja72dP9ts+3yFw7hGm0274NpqaN2N3ZV117tucbtgGcZOM+Jk2AiIgIiICIiAiIgIiICIiAiIgIiICIiAiIgIiICIiAiIgIiICIiAiIgf/9k="
              alt="Ốp Lưng UNIQ HYPERDOME màu trắng product image"
              class="w-20 h-20 object-contain mb-1"
              width="100"
              height="100"
            />
            <p class="text-xs font-semibold">ỐP LƯNG UNIQ HYPERDOME</p>
            <p class="text-red-600 text-xs font-semibold">250.000 VND</p>
          </div>
          <div
            class="border border-gray-300 rounded p-2 flex flex-col items-center text-center"
          >
            <img
              src="data:image/jpeg;base64,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SJ/cO96dZfNrkDqNKk/vYzpV3znO4VSKddvOrm3UKVFfeDOlB/FpmLUfYm5usyzlbsb63pGWU7TxxvpERKhERAREQE04xMyMOj3azdECk2YmVWX9I7dYqMagP+sj1GTQNJrxOFKm6DTmG9b7wOdeiY+mW0NJyecIflec7i6TJsNMaEgXF7HiLixseGk818Mj2zqj5SCuZQ2VgRZhcaHpE8HHD8zU/YaZXF3v4JvWrD5xqm42VaCvbOFbKQwzDNlbzhcaHpmatJXBVwGUggqwuCDoQQdCJBG1W1/u7/sVDp6hNlHaJY25Fh0lKnztJqm4kHC0/MT9kTFPB01OZUQNuzBAGsdSLjWxsOwTw2P4ck+n6NiP3pgbR/Rv/wBp/wCaXVNpVp7p0qYbO1ywGi81r7hznPbskMYxmHe03F9PEKe03IlN3ZY/adN6IwGHSohW9QlM2V8wGhzDW2tuNt43G44plXTY2hTqjKyE6qVYWB0OdbG+7vb6yOy67/fuOonEYXau3C9MPhECl6QcClbKpe1QhuU4KTw9Wth2+LdhUNlJXSwAuNABu4buBlym0xumSPl7osLnrmo44fman7DTBxw/NVP2GmNVrcb7D2fMzP498jV8cVW4osTzZW+RPumg7Wb8w/7FU/wy8abiwCi4+6YyLzewSPSx5IuaTDoyPf1AkGY/6h+if/tP/NJxq8olZQN2nqmHYKCxvYC59UjnaP6J+H+E/wDNPV3qEDKVAN7kWt024nrl41OUe9j0yFObfpf0sozDtvLCeaVMKABwnqdHMiIgIiICIiAiIgIiICIiAiIgIiICZViJiIHtqhM8REBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERA//2Q=="
              alt="Ốp Lưng APPLE iPhone phone holder red product image"
              class="w-20 h-20 object-contain mb-1"
              width="100"
              height="100"
            />
            <p class="text-xs font-semibold">ỐP LƯNG APPLE IPHONE</p>
            <p class="text-red-600 text-xs font-semibold">1.280.000 VND</p>
          </div>
          <div
            class="border border-gray-300 rounded p-2 flex flex-col items-center text-center"
          >
            <img
              src="data:image/jpeg;base64,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"
              alt="Ốp Lưng SPIGEN THIN FIT màu xám product image"
              class="w-20 h-20 object-contain mb-1"
              width="100"
              height="100"
            />
            <p class="text-xs font-semibold">ỐP LƯNG SPIGEN THIN FIT</p>
            <p class="text-red-600 text-xs font-semibold">490.000 VND</p>
          </div>
        </div>
        <div class="col-lg-4">
            
                <h3 class="text-red-600 font-semibold text-sm mb-2">Video giới thiệu</h3>
                <div class="aspect-w-16 aspect-h-9 youtube-container">
                    <iframe
                    width="500px"
                    height="500px"
                    src="https://www.youtube.com/embed/AkejKwaDWlU?si=JZ8sluMOS75hI5lN"
                    title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen
                ></iframe>
                </div>
            
        </div>
      </div>

    </div>



    <!-- Bottom right promotions and offers -->
<!-- filepath: d:\xampp\htdocs\Website_SmartPhone_LARAVEL\Website_SmartPhone_LARAVEL\resources\views\fontend\product_detail.blade.php -->
<div class="row">
  <div class="col-12">
      <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Sản Phẩm Liên Quan</button>
              <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Bình Luận</button>
          </div>
      </nav>

      <div class="tab-content" id="nav-tabContent">
          <!-- Tab Sản Phẩm Liên Quan -->
          <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
              <div class="container mt-5">
                  <div class="container mx-auto p-4">
                      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
                          @foreach ($list_product as $productitem)
                              <x-product-card :$productitem />
                          @endforeach
                      </div>
                  </div>
              </div>
          </div>

          <!-- Tab Bình Luận -->
          <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
              <div class="container mt-5">
                  <!-- Form bình luận -->
                  <div class="border border-gray-300 rounded p-4 mb-4">
                      <h3 class="text-lg font-semibold mb-3">Viết bình luận</h3>
                      <form id="comment-form">
                          <textarea
                              id="comment-text"
                              class="w-full border border-gray-300 rounded p-2 mb-3"
                              rows="4"
                              placeholder="Nhập bình luận của bạn..."
                          ></textarea>
                          <button
                              type="button"
                              class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition"
                              onclick="submitComment()"
                          >
                              Gửi bình luận
                          </button>
                      </form>
                  </div>

                  <!-- Danh sách bình luận -->
                  <div id="comment-list" class="space-y-4">
                      <!-- Bình luận mẫu -->
                      <div class="border border-gray-300 rounded p-4">
                          <div class="flex items-center justify-between mb-2">
                              <p class="font-semibold text-sm">Nguyễn Văn A</p>
                              <span class="text-xs text-gray-500">2 giờ trước</span>
                          </div>
                          <p class="text-gray-700 text-sm">
                              Sản phẩm rất tốt, giao hàng nhanh chóng. Mình rất hài lòng!
                          </p>
                      </div>
                      <div class="border border-gray-300 rounded p-4">
                          <div class="flex items-center justify-between mb-2">
                              <p class="font-semibold text-sm">Trần Thị B</p>
                              <span class="text-xs text-gray-500">1 ngày trước</span>
                          </div>
                          <p class="text-gray-700 text-sm">
                              Chất lượng sản phẩm ổn, nhưng giao hàng hơi chậm.
                          </p>
                      </div>
                  </div>

                  <!-- Phân trang -->
                  <div class="mt-4 flex justify-center">
                      <button
                          class="px-3 py-1 border border-gray-300 rounded hover:bg-gray-100 transition"
                      >
                          Trước
                      </button>
                      <button
                          class="px-3 py-1 border border-gray-300 rounded bg-blue-600 text-white mx-1"
                      >
                          1
                      </button>
                      <button
                          class="px-3 py-1 border border-gray-300 rounded hover:bg-gray-100 transition"
                      >
                          2
                      </button>
                      <button
                          class="px-3 py-1 border border-gray-300 rounded hover:bg-gray-100 transition"
                      >
                          Sau
                      </button>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
    <div
      class="mt-6 max-w-[1200px] mx-auto grid grid-cols-1 lg:grid-cols-3 gap-4 text-[10px] font-semibold"
    >
      <section
        class="bg-yellow-100 border border-yellow-400 rounded p-3 text-yellow-900 space-y-1"
      >
        <h2 class="mb-2">KHUYẾN MÃI HOT</h2>
        <ol class="list-decimal list-inside space-y-1 font-normal">
          <li>
            [Tháng 6]: PHỤ KIỆN MUA 1 TẶNG 1 - Combo phụ kiện siêu HOT giảm đến
            50% - Phụ kiện mua kèm giảm đến 50%
          </li>
          <li>[Tháng 6]: ĐĂNG KÝ ĐẠI HỌC HSSV | Tặng cường lực free</li>
          <li>[Tháng 6]: SĂN MÃ GIỜ VÀNG: Giảm thêm đến 1 triệu.</li>
        </ol>
      </section>

      <section
        class="bg-yellow-100 border border-yellow-400 rounded p-3 text-yellow-900 space-y-1"
      >
        <h2 class="mb-2">DỊCH VỤ ƯU ĐÃI "ĐỘC QUYỀN" KHI MUA SẢN PHẨM</h2>
        <ol class="list-decimal list-inside space-y-1 font-normal">
          <li>
            [Tháng 6]: GIÁ THU BÌNH QUÂN BÁN - Thu cũ đổi mới trợ giá lên đến
            100% giá trị máy
          </li>
          <li>
            [Tháng 6]: TRẢ GÓP SIÊU TỐC - lãi suất 0% | 0% phụ phí | 0% lợi nhuận
            - giảm đến 700.000đ
          </li>
          <li>
            [Tháng 6]: Miễn phí chuyển đi cho khách hàng tham quan mua sắm tại
            hệ thống Bach Long Mobile
          </li>
          <li>[Tháng 6]: Giảm ngay 300k khi thanh toán chuyển khoản 100%</li>
          <li>[Tháng 6]: Độc quyền 60 ngày đổi trả miễn phí</li>
          <li>[Tháng 6]: Giao hàng siêu tốc miễn phí 1H</li>
          <li>
            [Tháng 6]: Phụ Kiện C07 Đồng Bộ - Đem Đổi Deal Chất! Thu cũ tốt - Lên
            đời cực dễ!
          </li>
          <li>[Tháng 6]: Không cần đổi sale - B.Member có deal riêng!</li>
        </ol>
      </section>

      <section
        class="bg-yellow-100 border border-yellow-400 rounded p-3 text-yellow-900 space-y-1"
      >
        <h2 class="mb-2">ƯU ĐÃI THANH TOÁN KHI MUA HÀNG</h2>
        <ol class="list-decimal list-inside space-y-1 font-normal">
          <li>[Tháng 6]: Cà thẻ MIỄN PHÍ 100% với Visa, MasterCard</li>
          <li>[Tháng 6]: Giảm đến 700.000 khi thanh toán qua Home Paylater</li>
        </ol>
      </section>
    </div>
  </div>

  @endsection
  @section('title', ' Chi Tiết Sản Phẩm')
  @section('header')
  @endsection
  @section('footer')
  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
   function handleAddCart(productid)
   {
      let qty = document.getElementById("qty").value;
      $.ajax({
          url: "{{route('site.cart.addcart')}}",
          type: "GET",
          data: {
              productid: productid,
              qty: qty
          },
          success: function(result, status, xhr) {
              document.getElementById("showqty").innerHTML = result;
              // Hiển thị thông báo SweetAlert2
              Swal.fire({
                  toast: true,
                  position: 'top-end',
                  icon: 'success',
                  title: '🎉 Thêm vào giỏ hàng thành công!',
                  showConfirmButton: false,
                  timer: 3000,
                  timerProgressBar: true,
                  customClass: {
                      popup: 'my-toast animated-toast'
                  },
                  showClass: {
                      popup: 'animate__animated animate__slideInRight'
                  },
                  hideClass: {
                      popup: 'animate__animated animate__slideOutRight'
                  },
                  didOpen: (toast) => {
                      toast.addEventListener('mouseenter', Swal.stopTimer);
                      toast.addEventListener('mouseleave', Swal.resumeTimer);
                  }
              });
          },
          error: function(xhr, status, error) {
              Swal.fire({
                  icon: 'error',
                  title: 'Lỗi!',
                  text: 'Không thể thêm vào giỏ hàng. Vui lòng thử lại.',
              });
          }
      });
   }
  </script>


<!-- JavaScript -->
<script>
    const track = document.querySelector('.banner-track');
    const slides = document.querySelectorAll('.banner-image');
    const prevBtn = document.querySelector('.banner-btn.prev');
    const nextBtn = document.querySelector('.banner-btn.next');
  
    let currentIndex = 0;
    const totalSlides = slides.length;
  
    function showSlide(index) {
      track.style.transform = `translateX(-${index * 100}%)`;
    }
  
    function nextSlide() {
      currentIndex = (currentIndex + 1) % totalSlides;
      showSlide(currentIndex);
    }
  
    function prevSlide() {
      currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
      showSlide(currentIndex);
    }
  
    // Auto-slide
    let autoSlide = setInterval(nextSlide, 5000);
  
    nextBtn.addEventListener('click', () => {
      nextSlide();
      resetTimer();
    });
  
    prevBtn.addEventListener('click', () => {
      prevSlide();
      resetTimer();
    });
  
    function resetTimer() {
      clearInterval(autoSlide);
      autoSlide = setInterval(nextSlide, 5000);
    }
  </script>


    <script>
      function submitComment() {
          const commentText = document.getElementById('comment-text').value;

          if (!commentText.trim()) {
              alert('Vui lòng nhập nội dung bình luận!');
              return;
          }

          // Tạo bình luận mới
          const commentList = document.getElementById('comment-list');
          const newComment = document.createElement('div');
          newComment.classList.add('border', 'border-gray-300', 'rounded', 'p-4');
          newComment.innerHTML = `
              <div class="flex items-center justify-between mb-2">
                  <p class="font-semibold text-sm">Người dùng ẩn danh</p>
                  <span class="text-xs text-gray-500">Vừa xong</span>
              </div>
              <p class="text-gray-700 text-sm">${commentText}</p>
          `;

          // Thêm bình luận mới vào danh sách
          commentList.prepend(newComment);

          // Xóa nội dung trong textarea
          document.getElementById('comment-text').value = '';
      }
    </script>