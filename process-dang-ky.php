
<?
session_start();
$error = '';
$cccd = '';
$fullname = '';
$dob = '';
$phonenumber = '';
$email = '';

if (isset($_POST['submit'])){
    echo "<pre>";
    // print_r($_POST);
    // print_r($_COOKIE);
    // print_r($_FILES);
    echo "</pre>";
    // print_r($_SERVER);
 //   echo "</pre>";
//    $username = $_POST['username'] ;
//    echo "Tên vừa nhập = $username</br>";
    //
    //THÔNG BÁO LỖI VALIDATE
    $cccd = $_POST['cccd'];
    $fullname = $_POST['fullname'];
    $dob = $_POST['dob'];
    $phonenumber = $_POST['phonenumber'];
    $email = $_POST['email'];
    $province = $_POST['province'];
    $district = $_POST['district'];
    $village = $_POST['village'];
    $street = $_POST['street'];
    
    

    if (empty($cccd)){
        $error .= '<div class="alert alert-danger" role="alert">
            CCCD/ CMND không được để trống.
        </div>';
    } elseif (!is_numeric($cccd) || strlen($cccd)!=9 || strlen($cccd) != 12){
        $error .= '<div class="alert alert-danger" role="alert">
            CCCD/ CMND phải có 9 hoặc 12 chữ số.
        </div>';
    }

    if (empty($fullname)){
        $error .= '<div class="alert alert-danger" role="alert">
             Tên không được để trống.
        </div>';
    } elseif (strlen($fullname) < 8){
        $error .= '<div class="alert alert-danger" role="alert">
            Tên quá ngắn.
        </div>';
    }
    if (empty($dob)){
        $error .= '<div class="alert alert-danger" role="alert">
            Ngày sinh không được để trống.
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

    if (empty($email)){
        $error .= '<div class="alert alert-danger" role="alert">
            Email không được để trống
        </div>';
    } elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $error .= '<div class="alert alert-danger" role="alert">
            Email không hợp lệ;
        </div>';
    }

    if (empty($province) || empty($district) || empty($village) || empty($street)){
        $error .= '<div class="alert alert-danger" role="alert">
            Địa chỉ không được để trống;
        </div>';
    }
    
} else {
    $error .= '<div class="alert alert-danger" role="alert">
    Chưa thực hiện đăng ký. 
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
    <title>Đăng ký tài khoản</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/style-responsive.css">
</head>
<body>
    <div class="container">
        <?if ($error != '' ): ?>
            <h1 class="display-6">Đăng ký không thành công do các lỗi sau: </h1>
            <?echo $error; ?>
            <a href="dang-ky.php" class="btn btn-outline-danger">Quay lại trang đăng ký</a>
        <? else: ?>
            <?echo '<div class="alert alert-success" role="alert">
            Đăng ký thành công. Tự động chuyển tiếp đến <a class="btn btn-outline-success" href="index.php">Trang chủ</a> sau 3 giây.
        </div>';?>
        <?header('refresh:5;url = index.php');
        exit();
        ?>
        
        <?endif?>
    </div>
    

</body>
</html>