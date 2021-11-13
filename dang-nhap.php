
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/style-responsive.css">
    <title>Đăng ký tài khoản - Cổng dịch vụ công</title>
</head>
<body>

<?
    session_start();
    if ($_SESSION['loginstatus']=='logged-in'){
        echo '<a href="index.php" class="btn btn-outline-danger">Đang trong phiên đăng nhập - Quay lại trang chủ</a>';
        header('refresh:2; url: index.php');
        die();
    }
?>


<div class="header p-3">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <div class="banner">
                        <h4 class="display-6">Cổng dịch vụ công Quốc gia</h4>
                        <small>Dịch vụ công trực tuyến, thuận tiện, nhanh chóng, hiện đại.</small>
                    </div>
                </div>
                <div class="col-4 d-inline-block text-center">
                    <div class="register-login ">
                        <span>Chưa có tài khoản?</span>
                        <a href='dang-ky.php' class="btn btn-outline-primary">Đăng ký ngay</a>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    <div class="header-nav">
        <div class="container">
            <nav class="navbar p-0">
                <a href="index.php"><i class="fas fa-home"></i></a>
                <a href="gioi-thieu.html">Giới thiệu</a>
                <a href="thong-tin-dich-vu.html">Thông tin và dịch vụ</a>
                <a href="thanh-toan-truc-tuyen.html">Thanh toán trực tuyến</a>
                <a href="phan-anh-kien-nghi.html">Phản ánh kiến nghị</a>
                <a href="thu-tuc-hanh-chinh.html">Thủ tục hành chính</a>
                <a href="ho-tro.html">Hỗ trợ</a>
            </nav>
        </div>
    </div>
    <div class="container p-4" style="max-width: 500px">
        <h4 class="display-6 text-center">Đăng nhập</h4>
        <p class="text-center">Cổng dịch vụ công Quốc gia</p>
        <form class="form-dang-nhap" action="" method="post"  enctype="multipart/form-data">
            <div class="form-group">
                <label for="cccd">CCCD/ CMND</label>
                <input type="number" name="cccd" id="cccd"
                       class="form-control" value="" required>
            
            <div class="form-group">
                <label for="phonenumber">Số điện thoại</label>
                <input type="number" name="phonenumber" id="phonenumber"
                       class="form-control" value="" required>
            </div>

            <div class="input-group mb-3">
                <button class="btn btn-success" type="button" id="button-get-otp" >Lấy mã OTP</button>
                <input type="text" class="form-control" name="OTP" placeholder="Nhập mã OTP tại đây" required>
            </div>            

            <div class="form-group">
                <input type="submit" class="form-control btn btn-primary" name="submit" value="Đăng nhập">
            </div>
            <p><a href="khoi-phuc-tai-khoan.php">Quên thông tin đăng nhập?<a> </p>

        </form>
    </div>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script src="./js/jquery-3.5.1.min.js"></script>
    <script>
        var errors = [];
        $('input[name="cccd"]').blur(function(){
            if ($(this).val().length != 9 && $(this).val().length != 12){
                $(this).removeClass('is-valid');
                $(this).addClass('is-invalid');
                $('label[for="cccd"]').text('CCCD/ CMND phải có 9 hoặc 12 số');
                $('label[for="cccd"]').attr('style','color: red');
                if(errors.indexOf('cccd') == -1 ) errors.push('cccd');

            } else {
                $(this).removeClass('is-invalid')
                $(this).addClass('is-valid');
                $('label[for="cccd"]').text('CCCD/ CMND');
                $('label[for="cccd"]').attr('style','color: green');
                errors.splice(errors.indexOf('cccd'),1);
            }
            
        })
       
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1; //January is 0!
        var yyyy = today.getFullYear();
        if(dd<10){
                dd='0'+dd
            } 
            if(mm<10){
                mm='0'+mm
            } 

        today = yyyy+'-'+mm+'-'+dd;
        $('input[name="dob"]').attr('max',today);
        
        $('input[name="phonenumber"]').blur(function(){
           
           if ($(this).val().length != 10){
               $(this).removeClass('is-valid');
               $(this).addClass('is-invalid');
               $('label[for="phonenumber"]').text('Số điện thoại không hợp lệ');
               $('label[for="phonenumber"]').attr('style','color: red');
               if(errors.indexOf('phonenumber') == -1 ) errors.push('phonenumber');
           } else {
               $(this).removeClass('is-invalid')
               $(this).addClass('is-valid');
               $('label[for="phonenumber"]').text('Số điện thoại');
               $('label[for="phonenumber"]').attr('style','color: green');
               errors.splice(errors.indexOf('phonenumber'),1);
           }
           console.log(errors);
       })

        $('input[name="email"]').blur(function(){
            var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
            if (!mailformat.test($(this).val())){
                $(this).removeClass('is-valid');
               $(this).addClass('is-invalid');
               $('label[for="email"]').text('Email không hợp lệ');
               $('label[for="email"]').attr('style','color: red');
               if(errors.indexOf('email') == -1 ) errors.push('email');

           } else {
               $(this).removeClass('is-invalid');
               $(this).addClass('is-valid');
               $('label[for="email"]').text('Email');
               $('label[for="email"]').attr('style','color: green');              
               errors.splice(errors.indexOf('email'),1);

            }
        })

        $('#button-get-otp').click(function(){
            console.log($('input[name="phonenumber"]').val().length);
            if (errors.indexOf('phonenumber') == -1 && $('input[name="phonenumber"]').val().length != 0){
                alert('Chức năng đang phát triển. Vui lòng nhập OTP 1234 để tiếp tục.'); 
                $('#button-get-otp').html(`Gửi lại OTP sau <b id="counter">30</b> giây`);
                $('#button-get-otp').attr('disabled',true);
                var timer = 30;

                var x = setInterval(function(){
                    timer--;
                    $('#counter').text(timer);
                    if (timer <= 0){
                        clearInterval(x);
                        $('#button-get-otp').text('Gửi lại OTP');
                        $('#button-get-otp').attr('disabled',false);
                    } 
                },1000);
                
            } else {
                $('input[name="phonenumber"]').removeClass('is-valid');
               $('input[name="phonenumber"]').addClass('is-invalid');
               $('label[for="phonenumber"]').text('Số điện thoại không hợp lệ');
               $('label[for="phonenumber"]').attr('style','color: red');
               if(errors.indexOf('phonenumber') == -1 ) errors.push('phonenumber');
            }
            
        })

        $('.form-dang-nhap').submit(function(){
            
            if (errors.length == 0){ 
                $(this).attr('action','process-dang-nhap.php');
            } else {
                $(`input[name=${errors[0]}]`).focus();
                event.preventDefault();
            }
            
        });
        
    </script>
</body>
</html>

