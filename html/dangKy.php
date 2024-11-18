<?php
$sid = 0;
if(isset($_GET['sid'])) {
    $sid = $_GET['sid'];
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width= device-width,initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />

    <!-- call for bootstrap css and js-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
    <script
      src="https://kit.fontawesome.com/a076d05399.js"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
      integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
      crossorigin="anonymous"
    ></script>

    <!-- call for data table css  and js-->
    <script
      src="http://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous"
    ></script>
    <link
      rel="stylesheet"
      href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"
    />
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.3/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/style.css" />
  </head>
  <body>
    <div class="register">
      <div class="container">
        <div class="login-content">
          <div class="login-box">
            <div class="title">
              <i class="fas fa-user-plus"></i>&nbsp; Đăng ký
            </div>
            <div class="body">
              <form action="../../../php/dangKy.php" method="post">
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
                />
                <br /><br />
                <p class="form-text">Confirm Password :</p>
                <input
                  type="password"
                  name="confirm"
                  class="form-input"
                  id="confirm"
                  placeholder="Enter Confirm Password"
                />
                <br /><br />
                <input
                  type="reset"
                  value="Clear"
                  class="clear-btn"
                />&nbsp;&nbsp;<input
                  type="submit"
                  value="Register"
                  name="register"
                  class="register-btn"
                />
              </form>
              <?php if ($sid == 1) {?>
              <p style="text-align: center;color:red">Vui lòng điền đầy đủ thông tin!</p>
                <?php }?>

                <?php if ($sid == 2) {?>
              <p style="text-align: center;color:red">Số điện thoại không hợp lệ!</p>
                <?php }?>

                <?php if ($sid == 3) {?>
              <p style="text-align: center;color:red">Xác nhận mật khẩu chưa khớp!</p>
                <?php }?>

                <?php if ($sid == 4) {?>
              <p style="text-align: center;color:red">Số điện thoại đã được đăng ký!</p>
                <?php }?>

              <hr />
              
              <p class="bottom-by">
                <a href="dangNhap.php?sid=<?php echo 0 ?>" style="color: #bd2fe0">Đăng nhập</a>
              </p>
              <p class="bottom-by"><i class="far fa-copyright"></i>By KPT</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
