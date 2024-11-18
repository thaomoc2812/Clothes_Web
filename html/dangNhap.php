<?php

$sid = 0;
if(isset($_GET['sid'])) {
    $sid = $_GET['sid'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warehouse</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <!-- call for bootstrap css and js-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
          crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <!-- call for data table css  and js-->
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.3/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="login">
    <div class="container">
        <div class="login-content">
            <div class="login-box">
                <div class="title">
                    <i class="fas fa-user-alt"></i>&nbsp; Login Here
                </div>
                <div class="body">
                    <form action="../php/dangNhap.php" method="post">
                        <p class="form-text">Username :</p>
                        <input
                            type="text"
                            name="sdt"
                            class="form-input"
                            id="sdt"
                            placeholder="Enter PhoneNumber"
                        />
                        <br /><br />
                        <p class="form-text">Password :</p>
                        <input
                            type="password"
                            name="matkhau"
                            class="form-input"
                            id="matkhau"
                            placeholder="Enter Password"
                            autocomplete="off"
                        />
                        <br />
                        <input
                            type="submit"
                            value="Login"
                            name="login"
                            class="login-btn"
                        />
                    </form>
                    <?php if($sid == 1) { ?>
                        <section>
                            <p style="text-align: center;color:red">Tài khoản hoặc mật khẩu không đúng!</p>
                        </section>
                    <?php } ?>
                    <?php if($sid == 2) { ?>
                        <section>
                            <p style="text-align: center;color:red">Tài khoản đã bị khóa!</p>
                        </section>
                    <?php } ?>

                    <hr />
                    <p class="bottom-by">
                        <a href="../index.php" style="text-align: center; color: #bd2fe0">Trang chủ</a>
                        hoặc
                        <a href="dangKy.php" style="color: #bd2fe0">Tạo tài khoản</a>
                    </p>
                    <p class="bottom-by"><i class="far fa-copyright"></i>By KPT</p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
