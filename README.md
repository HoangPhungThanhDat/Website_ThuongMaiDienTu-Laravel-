
# Website Bán Smartphone - Laravel E-Commerce
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>
<div align="center">

![Laravel](https://img.shields.io/badge/Laravel-11.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.x-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-ES6+-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)
![MySQL](https://img.shields.io/badge/MySQL-8.0+-4479A1?style=for-the-badge&logo=mysql&logoColor=white)

**Hệ thống quản lý và bán hàng thương mại điện tử toàn diện**

[Tính năng](#-tính-năng) • [Cài đặt](#-cài-đặt) • [Hướng dẫn](#-hướng-dẫn-sử-dụng)

</div>

---

## 📋 Mục lục

- [Giới thiệu](#-giới-thiệu)
- [Tính năng](#-tính-năng)
- [Công nghệ sử dụng](#-công-nghệ-sử-dụng)
- [Yêu cầu hệ thống](#-yêu-cầu-hệ-thống)
- [Cài đặt](#-cài-đặt)
- [Cấu trúc dự án](#-cấu-trúc-dự-án)
- [Hướng dẫn sử dụng](#-hướng-dẫn-sử-dụng)
- [Screenshots](#-screenshots)
- [Tác giả](#-tác-giả)

---

## 🎯 Giới thiệu

Website Bán Smartphone là một nền tảng thương mại điện tử được xây dựng trên Laravel Framework, chuyên cung cấp các sản phẩm điện thoại thông minh, Laptop, PC,  và phụ kiện công nghệ. Hệ thống được thiết kế với giao diện thân thiện, dễ sử dụng và tích hợp đầy đủ các tính năng cần thiết cho một website bán hàng chuyên nghiệp.

### ✨ Điểm nổi bật

- 🎨 Giao diện hiện đại, responsive trên mọi thiết bị
- 🔐 Hệ thống phân quyền Admin/User rõ ràng
- 📦 Quản lý sản phẩm đa dạng với nhiều thuộc tính
- 🛍️ Giỏ hàng và thanh toán thông minh
- 📰 Hệ thống tin tức và bài viết tích hợp
- ♻️ Tính năng xóa mềm và khôi phục dữ liệu
- 🔍 Tìm kiếm và lọc sản phẩm nâng cao

---

## 🚀 Tính năng

### 👨‍💼 Quản trị viên (Admin)

#### 📊 Dashboard
- Thống kê tổng quan doanh thu, đơn hàng
- Biểu đồ phân tích bán hàng theo thời gian
- Danh sách đơn hàng mới nhất

#### 🛍️ Quản lý sản phẩm
- ✅ Thêm, sửa, xóa sản phẩm
- 📸 Upload nhiều hình ảnh cho mỗi sản phẩm
- 🎨 Quản lý thuộc tính sản phẩm (màu sắc, dung lượng)
- 💰 Thiết lập giá gốc, giá sale
- 📦 Quản lý tồn kho
- 🗑️ CRUD, xóa mềm và khôi phục sản phẩm

#### 📂 Quản lý danh mục
- Tạo và quản lý danh mục sản phẩm
- Cấu trúc danh mục phân cấp
- CRUD, xóa mềm và khôi phục danh mục

#### 🏷️ Quản lý thương hiệu
- Quản lý các thương hiệu điện thoại
- Thêm logo và mô tả thương hiệu
- CRUD, xóa mềm và khôi phục

#### 📰 Quản lý bài viết
- Tạo và chỉnh sửa bài viết tin tức
- Phân loại bài viết theo chủ đề
- Quản lý hình ảnh bài viết
- CRUD, xóa mềm và khôi phục

#### 🎫 Quản lý Banner/Slider
- Upload và quản lý banner trang chủ
- Sắp xếp thứ tự hiển thị
- Thiết lập link liên kết

#### 📋 Quản lý đơn hàng
- Xem chi tiết đơn hàng
- Cập nhật trạng thái đơn hàng
- Thống kê doanh thu

#### 👥 Quản lý thành viên
- Quản lý tài khoản người dùng
- Phân quyền Admin/User
- Xem lịch sử mua hàng

#### 📧 Quản lý liên hệ
- Xem và trả lời tin nhắn liên hệ
- Quản lý phản hồi khách hàng

#### 🎯 Quản lý Menu
- Tùy chỉnh menu điều hướng
- Sắp xếp thứ tự menu

### 👤 Người dùng (User)

#### 🏠 Trang chủ
- 🔥 Hiển thị sản phẩm đang sale
- ⭐ Sản phẩm mới nhất
- 🎯 Sản phẩm theo danh mục
- 📱 Sản phẩm theo thương hiệu
- 🔥 Bài viết mới nhất 
- 🎪 Banner/Slider quảng cáo

#### 🔍 Tìm kiếm & Lọc
- Tìm kiếm sản phẩm theo tên
- Lọc theo danh mục
- Lọc theo thương hiệu
- Lọc theo khoảng giá
- Sắp xếp theo giá, tên, mới nhất

#### 📱 Chi tiết sản phẩm
- Xem thông tin chi tiết sản phẩm
- Xem nhiều hình ảnh sản phẩm
- Chọn thuộc tính (màu sắc, dung lượng)
- Xem sản phẩm liên quan
- Thêm vào giỏ hàng

#### 🛒 Giỏ hàng
- Thêm/Xóa/Cập nhật số lượng
- Tính toán tổng tiền tự động
- Áp dụng mã giảm giá (nếu có)

#### 💳 Thanh toán
- Nhập thông tin giao hàng
- Chọn phương thức thanh toán
- Xác nhận đơn hàng

#### 📰 Tin tức & Bài viết
- Xem danh sách bài viết
- Xem chi tiết bài viết
- Bài viết liên quan
- Phân loại theo chủ đề

#### 👤 Tài khoản cá nhân
- Xem thông tin cá nhân
- Lịch sử đơn hàng
- Cập nhật thông tin
- Đổi mật khẩu

#### 📞 Liên hệ
- Gửi tin nhắn liên hệ
- Thông tin công ty
- Bản đồ địa chỉ

---

## 💻 Công nghệ sử dụng

### Backend
- **Framework:** Laravel 11.x
- **Language:** PHP 8.2+
- **Database:** MySQL 8.0+
- **ORM:** Eloquent

### Frontend
- **HTML5** - Cấu trúc trang web
- **CSS3** - Styling và animations
- **JavaScript (ES6+)** - Tương tác động
- **Bootstrap 5.x** - Responsive framework
- **jQuery** - DOM manipulation

### Libraries & Tools
- **Font Awesome** - Icons
- **SweetAlert2** - Beautiful alerts
- **DataTables** - Advanced tables
- **Summernote** - WYSIWYG editor
- **Select2** - Enhanced select boxes
- **Chart.js** - Data visualization

---

## 📋 Yêu cầu hệ thống

- **PHP:** >= 8.2
- **Composer:** >= 2.5
- **MySQL:** >= 8.0 hoặc MariaDB >= 10.6
- **Node.js:** >= 18.x (nếu build assets)
- **Web Server:** Apache/Nginx

### PHP Extensions
```
- BCMath
- Ctype
- Fileinfo
- JSON
- Mbstring
- OpenSSL
- PDO
- Tokenizer
- XML
- GD hoặc Imagick
```

---

## 🔧 Cài đặt

### 1️⃣ Clone dự án
```bash
git clone https://github.com/yourusername/smartphone-laravel.git
cd smartphone-laravel
```

### 2️⃣ Cài đặt dependencies
```bash
# Cài đặt PHP dependencies
composer install

# Cài đặt Node dependencies (nếu cần)
npm install
```

### 3️⃣ Cấu hình môi trường
```bash
# Copy file .env
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 4️⃣ Cấu hình Database

Mở file `.env` và cập nhật thông tin database:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=smartphone_db
DB_USERNAME=root
DB_PASSWORD=your_password
```

### 5️⃣ Chạy Migration và Seeder
```bash
# Tạo tables
php artisan migrate

# Import dữ liệu mẫu (nếu có)
php artisan db:seed
```

### 6️⃣ Tạo symbolic link cho storage
```bash
php artisan storage:link
```

### 7️⃣ Khởi chạy ứng dụng
```bash
# Development server
php artisan serve

# Hoặc sử dụng với port tùy chỉnh
php artisan serve --port=8080
```

Truy cập: `http://localhost:8000`

### 8️⃣ Build Assets (Optional)
```bash
# Development
npm run dev

# Production
npm run build

# Watch mode
npm run watch
```

---

## 📁 Cấu trúc dự án
```
Website_SmartPhone_LARAVEL/
├── 📂 app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── backend/          # Admin controllers
│   │   │   │   ├── DashboardController.php
│   │   │   │   ├── ProductController.php
│   │   │   │   ├── CategoryController.php
│   │   │   │   ├── BrandController.php
│   │   │   │   ├── OrderController.php
│   │   │   │   ├── PostController.php
│   │   │   │   ├── BannerController.php
│   │   │   │   ├── UserController.php
│   │   │   │   └── ...
│   │   │   └── fontend/          # User controllers
│   │   │       ├── HomeController.php
│   │   │       ├── SanPhamController.php
│   │   │       ├── CartController.php
│   │   │       ├── BaiVietController.php
│   │   │       └── ...
│   │   ├── Middleware/
│   │   └── Requests/             # Form validations
│   ├── Models/                   # Eloquent models
│   │   ├── Product.php
│   │   ├── Category.php
│   │   ├── Brand.php
│   │   ├── Order.php
│   │   ├── Post.php
│   │   └── ...
│   └── View/
│       └── Components/           # Blade components
├── 📂 public/
│   ├── images/                   # Static images
│   ├── css/                      # Stylesheets
│   ├── js/                       # JavaScript files
│   ├── bootstrap/
│   ├── fontawesome-free/
│   └── plugins/                  # Third-party plugins
├── 📂 resources/
│   └── views/
│       ├── backend/              # Admin views
│       │   ├── dashboard/
│       │   ├── product/
│       │   ├── category/
│       │   ├── brand/
│       │   ├── order/
│       │   ├── post/
│       │   └── ...
│       ├── fontend/              # User views
│       │   ├── home.blade.php
│       │   ├── sanpham.blade.php
│       │   ├── product_detail.blade.php
│       │   ├── cart.blade.php
│       │   ├── baiviet.blade.php
│       │   └── ...
│       ├── components/           # Reusable components
│       └── layouts/
│           ├── admin.blade.php
│           └── site.blade.php
├── 📂 routes/
│   └── web.php                   # Route definitions
├── 📂 database/
│   ├── migrations/               # Database migrations
│   └── seeders/                  # Data seeders
├── .env.example
├── composer.json
├── package.json
└── README.md
```

---

## 📖 Hướng dẫn sử dụng

### 🔐 Đăng nhập Admin

1. Truy cập: `http://localhost:8000/admin/login`
2. Thông tin đăng nhập mặc định:
```
   Email: admin@example.com
   Password: admin123
```

### 👤 Đăng ký tài khoản User

1. Truy cập: `http://localhost:8000/register`
2. Điền thông tin đăng ký
3. Đăng nhập và mua sắm

### 🛍️ Quy trình mua hàng

1. **Duyệt sản phẩm** → Chọn sản phẩm yêu thích
2. **Thêm vào giỏ** → Chọn màu sắc, dung lượng
3. **Xem giỏ hàng** → Kiểm tra sản phẩm
4. **Thanh toán** → Nhập thông tin giao hàng
5. **Xác nhận** → Hoàn tất đơn hàng

### ⚙️ Quản lý sản phẩm (Admin)

1. Đăng nhập Admin
2. Vào **Quản lý sản phẩm**
3. Click **Thêm mới** để tạo sản phẩm
4. Điền đầy đủ thông tin:
   - Tên sản phẩm
   - Danh mục
   - Thương hiệu
   - Giá gốc/Giá sale
   - Mô tả chi tiết
   - Upload hình ảnh
   - Thêm thuộc tính (màu sắc, dung lượng)
5. **Lưu** để hoàn tất

### ♻️ Xóa mềm và Khôi phục
```php
// Xóa mềm
$product->delete();

// Xem dữ liệu đã xóa
$trashedProducts = Product::onlyTrashed()->get();

// Khôi phục
$product->restore();

// Xóa vĩnh viễn
$product->forceDelete();
```

---

## 📸 Screenshots

### 🏠 Trang chủ
![Home Page](screenshots/home.png)

### 📱 Chi tiết sản phẩm
![Product Detail](screenshots/product-detail.png)

### 🛒 Giỏ hàng
![Shopping Cart](screenshots/cart.png)

### 👨‍💼 Admin Dashboard
![Admin Dashboard](screenshots/admin-dashboard.png)

### 📊 Quản lý sản phẩm
![Product Management](screenshots/product-management.png)

---

## 🗄️ Database Schema

### Bảng chính
```sql
-- users: Quản lý người dùng
-- categories: Danh mục sản phẩm
-- brands: Thương hiệu
-- products: Sản phẩm
-- product_images: Hình ảnh sản phẩm
-- product_options: Thuộc tính sản phẩm (màu, dung lượng)
-- orders: Đơn hàng
-- orderdetails: Chi tiết đơn hàng
-- posts: Bài viết
-- topics: Chủ đề bài viết
-- banners: Banner/Slider
-- menus: Menu điều hướng
-- contacts: Liên hệ
```

---

## 🔒 Bảo mật

- ✅ CSRF Protection
- ✅ XSS Protection
- ✅ SQL Injection Prevention (Eloquent ORM)
- ✅ Password Hashing (BCrypt)
- ✅ Authentication & Authorization
- ✅ Input Validation & Sanitization
- ✅ Secure Session Management

---

## 🚀 Deployment

### Production Checklist
```bash
# 1. Optimize configuration
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 2. Build assets
npm run build

# 3. Set permissions
chmod -R 755 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache

# 4. Update .env
APP_ENV=production
APP_DEBUG=false
```

### Khuyến nghị Server

- **RAM:** >= 2GB
- **Disk:** >= 10GB SSD
- **PHP:** >= 8.2 with OPcache
- **Database:** MySQL 8.0+ hoặc MariaDB 10.6+
- **SSL Certificate:** Bắt buộc cho production

---

## 📝 Changelog

### Version 1.0.0 (2025-01)
- ✨ Ra mắt phiên bản đầu tiên
- 🎯 Đầy đủ tính năng quản lý sản phẩm
- 🛍️ Hệ thống giỏ hàng và thanh toán
- 📰 Quản lý bài viết tin tức
- ♻️ Xóa mềm và khôi phục dữ liệu
- 🎨 Giao diện responsive

---

## 🤝 Đóng góp

Mọi đóng góp đều được chào đón! Hãy tạo Pull Request hoặc mở Issue nếu bạn có ý tưởng cải thiện.

### Quy trình đóng góp

1. Fork dự án
2. Tạo branch mới (`git checkout -b feature/AmazingFeature`)
3. Commit changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to branch (`git push origin feature/AmazingFeature`)
5. Mở Pull Request

---

## 📄 Giấy phép

Dự án này được phân phối dưới giấy phép MIT. Xem file `LICENSE` để biết thêm chi tiết.

---

## 👨‍💻 Tác giả

**Hoàng Phụng Thành Đạt**

- 📧 Email: hoangdatcoder@gmail.com
- 🌐 Website: [Portfolio](https://portfolio-hoang-dat.vercel.app/)
- 💼 LinkedIn: [Linkedin](https://www.linkedin.com/in/%C4%91%E1%BA%A1t-ho%C3%A0ng-69b60a327)
- 🐙 GitHub: [Github](https://github.com/HoangPhungThanhDat)

---

## 🙏 Lời cảm ơn

- [Laravel](https://laravel.com/) - Framework tuyệt vời
- [Bootstrap](https://getbootstrap.com/) - CSS Framework
- [Font Awesome](https://fontawesome.com/) - Icons
- [AdminLTE](https://adminlte.io/) - Admin template inspiration
- Và tất cả các thư viện mã nguồn mở đã sử dụng

---

## 📞 Hỗ trợ

Nếu bạn thích dự án này, hãy cho một ⭐️ trên GitHub!

Có câu hỏi? [Mở một issue](https://github.com/yourusername/smartphone-laravel/issues)

---

<div align="center">

**Made with ❤️ by Hoàng Phụng Thành Đạt**

© 2025 Website Bán Smartphone. All rights reserved.

</div>