
# Web chia sẻ khóa học online miễn phí



## Hướng dẫn cài đặt

Hãy chắc chắn máy tính của bạn đã được cài đặt các phần mềm sau:
### Windows
- [Xampp](https://www.apachefriends.org/download.html)
- [Git](https://git-scm.com/downloads)
- [Composer](https://getcomposer.org/download/)
- [Node.js](https://www.npmjs.com/get-npm)

### Ubuntu
- [Xampp](https://www.apachefriends.org/download.html)
- [Git](https://git-scm.com/download/linux)
- [Composer](https://www.digitalocean.com/community/tutorials/how-to-install-and-use-composer-on-ubuntu-20-04)
- [Node.js](https://www.digitalocean.com/community/tutorials/how-to-install-node-js-on-ubuntu-18-04)

###
Nếu bạn đã cài đặt các phần mềm trên, hãy làm tiếp các bước sau đây.
###

### Tạo 1 database mới với tên **free-course**
[Hướng dẫn tạo database](https://viettuts.vn/mysql/tao-database-trong-mysql#goto-h2-3)

*Hướng dẫn dưới đây dành cho người sử dụng Xampp*

Truy cập vào thư mục htdocs, mở gitbash hoặc cmd và thực thi lần lượt các lệnh sau:
```bash
Link thư mục htdocs: C:\xampp\htdocs
```
Sao chép dự án về máy

```bash
  git clone https://github.com/maiduyduc/itech_fix.git
```

Truy cập vào thư gốc của dự án

```bash
  cd itech_fix
```

Cài đặt Composer và update

```bash
  composer install
  composer update
```

Cài đặt Node.js và update

```bash
  npm install
  npm update
  npm run dev
```

Link thư mục

```bash
    php artisan storage:link
```

Khởi tạo khóa ứng dụng

```bash
  php artisan key:generate
```

Khởi tại database và dữ liệu mẫu

```bash
  php artisan migrate:fresh --seed
```

Chạy serve

```bash
  php artisan serve
```

Truy cập vào http://localhost:8000/ hoặc http://127.0.0.1:8000 và đăng nhập với thông tin:

```bash
  Quyền tài khoản admin
  ----------------
  Email: admin@admin
  Password: 123
```

*Nếu xuất hiện lỗi sai tài khoản/ mật khẩu hãy thử tạo lại dữ liệu mẫu*
## Authors

- [@maiduyduc](https://www.github.com/maiduyduc)

