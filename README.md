# cover-letter: Các bước chạy project
1. Bước 1:
- Cài đặt xampp
- Khởi động xampp với Apache và MySQL
2. Bước 2:
- Copy thư mục code vào trong thư mục `C:\xampp\htdocs`
3. Bước 3:
- Tạo database: `create database cover_letter`
- Vào thư mục database để lấy file database sau đó import vào cơ sở dữ liệu vừa tạo
- Có thể cấu hình lại tên db trong thư mục `config/db_connect.php` và `admin/config/db_connect.php`
4. Bước 4:
- Vào file config.php để chỉnh sửa domain giống với tên thư mục
- Truy cập đường dẫn http://localhost/cover-letter/index.php để bắt đầu với trang người dùng
+ Đăng ký tài khoản người dùng và xác thực email để đăng nhập
- Truy cập vào đường dẫn http://localhost/cover-letter/admin/login.php để vào trang admin 
+ Tài khoản mặc định admin: `username = 'root'; password = 'root'`
- Lưu ý: đường dẫn ứng với domain tuỳ chỉnh.