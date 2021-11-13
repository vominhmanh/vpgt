
<?
session_start();

$error = '';
$cccd = '';
$fullname = '';
$dob = '';
$phonenumber = '';
$email = '';

if ( $_SESSION['loginstatus'] != 'logged-in'){
    $error .= '<div class="alert alert-danger" role="alert">
    Chưa thực hiện đăng nhập. 
    </div>';
}

// session dùng để đăng nhập, giỏ hàng
// là biến kiểu mảng, biến session có thể dc truy cập từ
//bất cứ file nào trong hệ thống mà không cần nhúng file
// sử dụng require_once
// hoặc khai báo biến dạng session $_SESSION lưu tất cả các session trên hệ thống
//
// echo "<pre>";
// // bắt buộc khởi tạo $_SESSION trước khi sử dụng
// // khởi tạo phải ở vị trí đầu tiên của file php;
// print_r($_SESSION);
// // thêm vào session như thêm vào mảng
// $_SESSION['name'] = "Võ Minh Mạnh";
// $_SESSION['address'] = [
//         'City' => 'Hà Nội',
//         'District' => 'Hà Đông',
//         'Village' => 'Mộ Lao',
// ];

// print_r($_SESSION);
// echo "</pre>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>đăng xuất tài khoản</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/style-responsive.css">
</head>
<body>
    <div class="container">
        <?if ($error != '' ): ?>
            <h1 class="display-6">Đăng xuất không thành công do các lỗi sau: </h1>
            <?echo $error; ?>
            <a href="index.php" class="btn btn-outline-danger">Quay lại trang chủ</a>
        <? else: ?>
            <?echo '<div class="alert alert-success" role="alert">
            Đăng xuất thành công. Tự động chuyển tiếp đến <a class="btn btn-outline-success" href="index.php">Trang chủ</a> sau 3 giây.
        </div>';?>
            <?
                $_SESSION['loginstatus'] = 'not-logged-in';
            ?>
        <?header('refresh:2;url = index.php');
        exit();
        ?>

        <?endif?>
    </div>
    

</body>
</html>