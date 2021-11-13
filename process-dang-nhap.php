
<?
$error = '';
$cccd = '';
$fullname = '';
$dob = '';
$phonenumber = '';
$email = '';

if (isset($_POST['submit'])){
    $cccd = $_POST['cccd'];
    $phonenumber = $_POST['phonenumber'];
 //   $email = $_POST['email'];
    
    if (empty($cccd)){
        $error .= '<div class="alert alert-danger" role="alert">
            CCCD/ CMND không được để trống.
        </div>';
    } elseif (!is_numeric($cccd) && strlen($cccd)!=9 && strlen($cccd) != 12){
        $error .= '<div class="alert alert-danger" role="alert">
            CCCD/ CMND phải có 9 hoặc 12 chữ số.
        </div>';
    }

    if (empty($phonenumber)){
        $error .= '<div class="alert alert-danger" role="alert">
            Số điện thoại không được để trống.
        </div>';
    } elseif (!is_numeric($phonenumber) || strlen($phonenumber)!=10){
        $error .= '<div class="alert alert-danger" role="alert">
            Số điện thoại phải có 10 chữ số.
        </div>';
    }

    // if (empty($email)){
    //     $error .= '<div class="alert alert-danger" role="alert">
    //         Email không được để trống
    //     </div>';
    // } elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)){
    //     $error .= '<div class="alert alert-danger" role="alert">
    //         Email không hợp lệ;
    //     </div>';
    // }
    
} else {
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
    <title>đăng nhập tài khoản</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/style-responsive.css">
</head>
<body>
    <div class="container">
        <?if ($error != '' ): ?>
            <h1 class="display-6">Đăng nhập không thành công do các lỗi sau: </h1>
            <?echo $error; ?>
            <a href="dang-nhap.php" class="btn btn-outline-danger">Quay lại trang đăng nhập</a>
        <? else: ?>
            <?echo '<div class="alert alert-success" role="alert">
            Đăng nhập thành công. Tự động chuyển tiếp đến <a class="btn btn-outline-success" href="index.php">Trang chủ</a> sau 3 giây.
        </div>';?>
            <?
                session_start();
                $_SESSION['loginstatus'] = 'logged-in';
            ?>
        <?header('refresh:2;url = index.php');
        exit();
        ?>

        <?endif?>
    </div>
    

</body>
</html>