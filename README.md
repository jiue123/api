Tutorial
==============

### #Enable extension PDO
Trong project sử dụng ``extension PDO`` để ``connect`` đến ``database`` do đó đầu tiên ta cần ``enable extension PDO`` 
trong file ``php.ini``.

### #Import database
Tạo một ``database`` với tên ``api``. Sau đó tiến hành import file ``api.sql`` vào database vừa khởi tạo.

File ``api.sql`` nằm bên trong thư mục ``database`` của project.

Sau khi hoàn thành ``import database``, ta tiến hành ``config`` file ``connection.php`` để kết nối đến database. 
File ``connection.php`` nằm bên trong thư mục ``connection`` của project.

```
$server_host = "mysql";
$database = "api";
$username = "root";
$password = "root";
```
Thay đổi các giá trị trên trong file ``connection.php`` cho phù hợp với database của mình.

### #User interface
Sau khi hoàn thành các bước ở trên bây giờ tao vào phần giao diện người dùng bằng url ``http://localhost/index.php``

Phần giao diện người dùng có 3 page.

- Page Login
- Page Register
- Page Home 

Ta tiến hành đăng ký một `user` mới trong `page register` sau đó đến ``page login`` để tiến hành đăng nhập.

Sau khi đăng nhập thành công ta sẽ được chuyển đến ``page home``, trong ``page home`` sẽ show ra toàn bộ các ``user`` hiện có 
trong ``database``.

### #Api

Đầu tiên ta cần đăng ký một ``user``.

Sau khi đã có ``email`` và ``password`` của ``user`` ta tiến hành lấy ``access_token`` cho ``user`` đó.

> Ta có thể dùng ``Postman`` hay bất cứ phần mềm nào khác tương tự để tiến thao tác với ``api``.

##### #Get access_token

Sử dụng ``method`` là ``POST`` gửi request đến ``http://localhost/api.php``

Với các params
```
type = getAccessToken
email = example@gmail.com
password = 123456
```
trong đó ``type`` có giá trị mặc định.

Sau khi ``send request`` ta sẽ nhận được một ``json`` có dạng như sau:

```
{
    "access_token": "5af730bba6d6c8d2a10a4682fbd18840f910fb1ef89d614b2b2926c0a480fb930779a24c497dbff4a98ff41952c56894cab4cc9cd848ab6d1cc9e6b9d06dc17d"
}
```

#### #Get user information

Lấy thông tin người dùng bằng cách sau:

Sử dụng ``method`` là ``GET`` và ``access_token`` đã lấy được ở bước #Get access_token. Gửi request đến ``http://localhost/api.php``

Với các params

```
type = userAction
access_token = 5af730bba6d6c8d2a10a4682fbd18840f910fb1ef89d614b2b2926c0a480fb930779a24c497dbff4a98ff41952c56894cab4cc9cd848ab6d1cc9e6b9d06dc17d
```
trong đó ``type`` có giá trị mặc định.

 
Sau khi ``send request`` ta sẽ nhận được một ``json`` có dạng như sau:
 
```
{
    "email": "lethanhphat0208@gmail.com",
    "name": "Le Phat",
    "tel": "01678392929",
    "address": "416/16 Duong Quang Ham - Govap",
    "create_at": "2018-10-12 02:06:07",
    "update_at": "2018-10-12 02:06:07"
}
```

#### #Update user information

Cập nhật thông tin người dùng bằng cách sau:

Host: ``http://localhost/api.php``

Sử dụng ``method`` là ``POST`` và ``access_token`` đã lấy được ở bước #Get access_token. Gửi request đến ``http://localhost/api.php``

Với các params

```
type = userAction
access_token = 5af730bba6d6c8d2a10a4682fbd18840f910fb1ef89d614b2b2926c0a480fb930779a24c497dbff4a98ff41952c56894cab4cc9cd848ab6d1cc9e6b9d06dc17d
name = Le Thanh Phat
tel = 0123456789
address = 122/6e Truong Sa - Binh Thanh
password = password
```
trong đó ``type`` có giá trị mặc định.

Bạn có thể cập nhật chỉ một trường ``name`` như sau:
```
type = userAction
access_token = 5af730bba6d6c8d2a10a4682fbd18840f910fb1ef89d614b2b2926c0a480fb930779a24c497dbff4a98ff41952c56894cab4cc9cd848ab6d1cc9e6b9d06dc17d
name = Le Thanh Phat 123
```

Nếu tiến trình thành công bạn sẽ nhận được kết quả ``"Update Success"``
