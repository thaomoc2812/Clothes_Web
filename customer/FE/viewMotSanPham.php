<?php 
$check = -1;
if(isset($_GET['check']))
{
    $check = $_GET['check'];

}
if(isset($_GET['size']) && isset($_GET['color']) && isset($_GET['gia'])  && isset($_GET['soluong']) ) {
    $size = $_GET['size'];
    $color = $_GET['color'];
    $gia = $_GET['gia'];
    $soluong = $_GET['soluong'];
}
$urlphu1="";
$urlphu2="";
$urlphu3="";

$idsanpham = $_GET['sid'];
$sdt = $_GET['user'];
$user = $sdt;
include 'header.php';
?>
<!DOCTYPE html>
<html lang="vi" class="h-100">

</ul>
</div>
<?php 
if($check == 1)
{
?>
 <script>
        // Đợi cho trang web tải hoàn tất trước khi thực hiện mã JavaScript
        document.addEventListener("DOMContentLoaded", function() {
            openPopup();
        });
    </script>
<?php }?>
<body>
  
    <main role="main">
      
        <div class="container mt-4">
            <div id="thongbao" class="alert alert-danger d-none face" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <?php 

                        $show = "SELECT * FROM sanpham WHERE id = $idsanpham";
                        $show_result1 = mysqli_query($conn, $show);
                        $show_r1 = mysqli_fetch_assoc($show_result1);

                        $idsanpham1 = $show_r1['id'];
                        $masanpham = $show_r1['masanpham'];
                       
                        
                        $search_img = "SELECT * FROM hinhanhsanpham WHERE idsanpham = $idsanpham1";
                        $result_img = mysqli_query($conn, $search_img);
                        $fetch_img = mysqli_fetch_assoc($result_img);

                        $search_gia = "SELECT * FROM soluong WHERE idsanpham = $idsanpham1";
                        $result_gia = mysqli_query($conn, $search_gia);
                        $fetch_gia = mysqli_fetch_assoc($result_gia);
                        $idsoluong = $fetch_gia['id'];

                        $search_mota = "SELECT * FROM thongtinsanpham WHERE masanpham = '$masanpham'";
                        $result_mota = mysqli_query($conn, $search_mota);
                        $fetch_mota = mysqli_fetch_assoc($result_mota);
                        $iddanhmuc = $fetch_mota['iddanhmuc'];

                        $search_mota = "SELECT * FROM thongtinsanpham WHERE masanpham = '$masanpham'";
                        $result_mota = mysqli_query($conn, $search_mota);

                        $search_kichthuoc = "SELECT DISTINCT kichthuoc FROM soluong WHERE idsanpham = $idsanpham1 ";
                        $result_kichthuoc = mysqli_query($conn, $search_kichthuoc);


                        $search_mausac = "SELECT DISTINCT mausac FROM soluong WHERE idsanpham = $idsanpham1 ";
                        $result_mausac = mysqli_query($conn, $search_mausac);


                        

                        ?>
            <div class="card">
                <div class="container-fliud">
                    <form name="frmsanphamchitiet" id="frmsanphamchitiet" method="post" action="../BE/addSanPhamVaoGioHang.php">
                        <input type="hidden" name="idsanpham" id="idsanpham" value="<?php echo $idsanpham ?>">
                        <input type="hidden" name="masanpham" id="masanpham" value="<?php echo $masanpham ?>">
                        <input type="hidden" name="user" id="user" value="<?php echo $user ?>">
                        <div class="wrapper row">
                            <div class="preview col-md-6">
                                <div class="preview-pic tab-content">
                                    <?php if($fetch_img['hinhanhchinh'] != null){ ?>
                                    <div class="tab-pane active"  id="pic-1">
                                        <img src="../../php/uploads/<?php
                                        $urlchinh=$fetch_img['hinhanhchinh'];
                                        echo $fetch_img['hinhanhchinh']?>">
                                    </div>
                                    <?php } ?>
                                    <?php if($fetch_img['hinhanhphu1'] != null){ ?>
                                    <div class="tab-pane" id="pic-2">
                                        <img src="../../php/uploads/<?php
                                        $urlphu1=$fetch_img['hinhanhphu1'];
                                        echo $fetch_img['hinhanhphu1']?>">
                                    </div>
                                    <?php } ?>
                                    <?php if($fetch_img['hinhanhphu2'] != null){ ?>
                                    <div class="tab-pane" id="pic-3">
                                        <img src="../../php/uploads/<?php
                                        $urlphu2=$fetch_img['hinhanhphu2'];
                                        echo $fetch_img['hinhanhphu2']?>">
                                    </div>
                                    <?php }?>
                                    <?php if($fetch_img['hinhanhphu3'] != null){ ?>
                                    <div class="tab-pane" id="pic-4">
                                        <img src="../../php/uploads/<?php 
                                        $urlphu3=$fetch_img['hinhanhphu3'];
                                        echo $fetch_img['hinhanhphu3']?>">
                                    </div>
                                    <?php }?>
                                </div>
                                <ul class="preview-thumbnail nav nav-tabs">
                                    <li class="active">
                                        <a data-target="#pic-1" data-toggle="tab" class="">
                                            <img src="../../php/uploads/<?php echo $fetch_img['hinhanhchinh']?>">
                                        </a>
                                    </li>
                                    <?php if($fetch_img['hinhanhphu1'] != null){ ?>
                                    <li class="">
                                        <a data-target="#pic-2" data-toggle="tab" class="">
                                            <img src="../../php/uploads/<?php echo $fetch_img['hinhanhphu1']?>">
                                        </a>
                                    </li><?php }?>

                                    <?php if($fetch_img['hinhanhphu2'] != null){ ?>
                                    <li class="">
                                        <a data-target="#pic-3" data-toggle="tab" class="active">
                                            <img src="../../php/uploads/<?php echo $fetch_img['hinhanhphu2']?>">
                                        </a>
                                    </li>
                                    <?php }?>
                                    <?php if($fetch_img['hinhanhphu3'] != null){ ?>
                                    <li class="">
                                        <a data-target="#pic-3" data-toggle="tab" class="active">
                                            <img src="../../php/uploads/<?php echo $fetch_img['hinhanhphu3']?>">
                                        </a>
                                    </li>
                                    <?php }?>
                                </ul>
                            </div>
                            <div class="details col-md-6">
                                <h3 class="product-title"><?php 
                                $tensp = $show_r1['tensanpham'];
                                echo $show_r1['tensanpham']?></h3>
                                <div class="rating">
                                    <div class="stars">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                    <!-- <span class="review-no">999 reviews</span> -->
                                </div>
                                <p class="product-description"><?php echo nl2br($fetch_mota['mota']); ?></p>
                                <?php 
                                 $now = date('Y-m-d');
                                 $search_ttkm = "SELECT * FROM thongtinkhuyenmai WHERE ngaybatdau <= '$now' AND ngayketthuc >= '$now'";
                                 $check_km = 0;
                                 if($result_ttkm = mysqli_query($conn, $search_ttkm))
                                 {
                                    
                                    while($fetch_ttkm = mysqli_fetch_assoc($result_ttkm))
                                    {
                                        $makhuyenmai = $fetch_ttkm['makhuyenmai'];
                                        $search_km = "SELECT * FROM khuyenmai WHERE idsoluong = $idsoluong AND makhuyenmai = '$makhuyenmai'";
                                        if($result_km = mysqli_query($conn, $search_km))
                                        {
                                      
                                       if($fetch_km = mysqli_fetch_assoc($result_km))
                                       {
                                        $check_km = 1;
                                        $giathat = $fetch_gia['giabanra'] *(100-$fetch_ttkm['giam'])/100;
                                        ?>
                                        
                                        <small class="text-muted">Giá cũ: <s><span><?php echo number_format( $fetch_gia['giabanra'], 0, '.', '.')?></span></s></small>
                                        <h4 class="price">Giá: <span><?php echo number_format( $giathat, 0, '.', '.')?></span></h4>
                                        <?php
                                       }
                                       
                                       
                                        
                                        }
                                    }
                                  }
                                if($check_km == 0){?>

                                <h4 class="price">Giá: <span><?php echo number_format( $fetch_gia['giabanra'], 0, '.', '.')?></span></h4>
                            <?php
                                 }
                                 ?>
                                <p class="vote"><strong>100%</strong> hàng <strong>Chất lượng</strong>, đảm bảo
                                    <strong>Uy
                                        tín</strong>!</p>
                                        
                                        <?php 
                                        if ($check == 0) {
                                        ?>
                                        <p style="text-align: center;color:red">Sản phẩm không còn đủ số lượng để đáp ứng!</p>
                                        <?php }?>
                                        

                                        <?php 
                                        if ($check == 2) {
                                        ?>
                                        <p style="text-align: center;color:red">Hãy cho chúng tôi biết màu sắc, kích thước và số lượng!</p>
                                        <?php }?>
                                        <?php 
                                        if ($check == 3) {
                                        ?>
                                        <p style="text-align: center;color:red">Bạn cần đăng nhập trước khi thêm vào giỏ hàng!</p>
                                        <?php }?>

                                        <div>
                                            <h5 class="sizes">sizes:
                                                <?php while ($fetch_kichthuoc = mysqli_fetch_assoc($result_kichthuoc)) {?>
                                                <div class="check-size" style="position: relative;display: inline-block;margin-left: 10px;">
                                                    <input type="radio" style="opacity: 0;" name="size" class="size" id="radio<?php echo $fetch_kichthuoc['kichthuoc']?>" data-toggle="tooltip" value = "<?php echo $fetch_kichthuoc['kichthuoc']?>" >
                                                    <label for="radio<?php echo $fetch_kichthuoc['kichthuoc']?>" class="checkbox-label"> 
                                                        <div id="size" <?php  if($fetch_kichthuoc['kichthuoc'] == "Freesize"){?> style ="width: 50px;height: 30px;font-size: 10px;"<?php } ?> ><?php echo $fetch_kichthuoc['kichthuoc']?> </div> <!-- Thẻ div bên trong label -->
                                                    </label>
                                                    
                                                </div>
                                                <?php }?>
                                                <style>

                                                    .check-size input[type="radio"]:checked + .checkbox-label #size {
                                                   
                                                    background-color: lightpink;
                                                    
                                                    
                                                    }
                                                    #size {
                                            
                                                        width: 30px;
                                                        height: 30px;
                                                        background-color: lightgrey;
                                                        text-align: center;
                                                        line-height: 30px;
                                                        font-size: 20px;
                                                        border: 1px solid #ccc;
                                                        cursor: pointer;
                                                        }

                                                        .sizes {
                                                        display: flex;
                                                        align-items: center; 
                                                        }

                                                </style>
                                                
                                                
                                                
                                            </h5>
                                        </div>
                                        
                                        
                                        <div>
                                            <h5 class="sizes">colors:
                                                <?php while ($fetch_mausac = mysqli_fetch_assoc($result_mausac)) {?>
                                                <div class="check-color" style="position: relative;display: inline-block;margin-left: 10px;">
                                                    <input type="radio" style="opacity: 0;" name="color" class="color" id="radio<?php echo $fetch_mausac['mausac']?>" data-toggle="tooltip" value="<?php echo $fetch_mausac['mausac']?>">
                                                    <label for="radio<?php echo $fetch_mausac['mausac']?>" class="checkbox-label"> 
                                                        <div id="color"   ><?php echo $fetch_mausac['mausac']?> </div> 
                                                    </label>
                                                   
                                                </div>
                                                <?php
                                                
                                                ?>
                                                <style>

                                                    .check-color input[type="radio"]:checked + .checkbox-label #color {
                                                   
                                                    background-color: lightpink;
                                                    }
                                                    #color {
                                            
                                                        width: 50px;
                                                        height: 50px;
                                                        background-color: lightgrey;
                                                        text-align: center;
                                                        display: flex;
                                                        align-items: center; 
                                                        justify-content: center;
                                                        
                                                        font-size: 15px;
                                                        border: 1px solid #ccc;
                                                        cursor: pointer;
                                                        }

                                                </style>
                                                <?php }?>
                                            </h5>
                                        </div>
                                    


                                <div class="form-group">
                                    <label for="soluong">Số lượng đặt mua:</label>
                                    <input type="number" class="form-control" id="soluong" name="soluong">
                                </div>
                                <button type="submit" class="btn btn-primary">Thêm vào giỏ hàng</button>
                                
                            </div>

                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="container-fluid">
                    <h3>Thông tin chi tiết về Sản phẩm</h3>
                    <div class="row">
                        <div class="col">
                        <?php echo nl2br($fetch_mota['mota']); ?>
                        <br></br>
                        <img src="../../php/uploads/<?php echo $fetch_img['hinhanhchinh']?>">
                        <?php if($fetch_img['hinhanhphu1'] != null){ ?>
                        <img src="../../php/uploads/<?php echo $fetch_img['hinhanhphu1']?>"><?php } ?>
                        <?php if($fetch_img['hinhanhphu2'] != null){ ?>
                        <img src="../../php/uploads/<?php echo $fetch_img['hinhanhphu2']?>"> <?php }?>
                        </div>
                        <?php if($fetch_img['hinhanhphu3'] != null){ ?>
                        <img src="../../php/uploads/<?php echo $fetch_img['hinhanhphu3']?>"> <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End block content -->
    </main>



    <section class="awe-section-3">	
	<div class="container ant-block-product" data-aos="flip-down">
	
	<div class="ant-title-des" style = "font-size: 30px;">
		Một số sản phẩm khác
	</div>
	
	<div class="ant-swiper-product swiper-container">
		<div class="swiper-wrapper">
		<?php 
           
			$view_danhmuc = "SELECT * FROM danhmucsanpham WHERE id = $iddanhmuc";
			$result_danhmuc = mysqli_query($conn, $view_danhmuc);
            $r_danhmuc = mysqli_fetch_assoc($result_danhmuc);
			$iddanhmuc = $r_danhmuc['id'] ;
            $resul_ttsp= "SELECT * FROM thongtinsanpham WHERE iddanhmuc = $iddanhmuc";
			$result_ttsp = mysqli_query($conn, $resul_ttsp);
            while($r_ttsp = mysqli_fetch_assoc($result_ttsp))
			{?>
			<div class="swiper-slide">
			<?php
			$masanpham = $r_ttsp['masanpham'];
            $show = "SELECT * FROM sanpham WHERE masanpham = '$masanpham'";
            if($show_result1 = mysqli_query($conn, $show))
            {
            if($show_r1 = mysqli_fetch_assoc($show_result1))
            {
			$idsanpham1 = $show_r1['id'];
			
			
			$search_img = "SELECT * FROM hinhanhsanpham WHERE idsanpham = $idsanpham1";
			$result_img = mysqli_query($conn, $search_img);
			$fetch_img = mysqli_fetch_assoc($result_img);
			$search_gia = "SELECT * FROM soluong WHERE idsanpham = $idsanpham1";
			$result_gia = mysqli_query($conn, $search_gia);
			$fetch_gia = mysqli_fetch_assoc($result_gia);
            if($fetch_gia['giabanra'] != 0) {
		?>
<div class="evo-product-block-item">
	<a href="viewMotSanPham.php?user=<?php echo $sdt ?>&sid=<?php echo $show_r1['id'] ?>"class="product-transition">
		
		
		
		<div class="product-image">
			<img class="lazy" style = "opacity: 1" src="../../php/uploads/<?php echo $fetch_img['hinhanhchinh']?>" data-src="../php/uploads/<?php echo $fetch_img['hinhanhchinh']?>" />
		</div>
		
		<div class="product-image second-image">
			<img class="lazy" style = "opacity: 1" src="../../php/uploads/<?php echo $fetch_img['hinhanhphu1']?>" data-src="../php/uploads/<?php echo $fetch_img['hinhanhphu1']?>" />
		</div>
		
	</a>
	<a href="viewMotSanPham.php?user=<?php echo $sdt ?>&sid=<?php echo $show_r1['id'] ?>" class="ant-item-product-name"><?php echo $show_r1['tensanpham']?></a>
	<div class="product-bottom">
		<span class="price-group">

			<span class="price"><?php echo number_format( $fetch_gia['giabanra'], 0, '.', '.')?></span>
		</span>
		
	</div>
</div>	
			</div>
            <?php }?>
			<?php }}}?>


			
			
		</div>
		<div class="swiper-button-next"></div>
		<div class="swiper-button-prev"></div>
	</div>
	<div class="ant-view-more text-center">
		<a href="viewTatCaSanPham.php?user=<?php echo $sdt?>" title="Xem tất cả">Xem tất cả</a>
	</div>
	
</div>
<script>
	var mySwiper = new Swiper('.ant-swiper-product', {
		slidesPerView: 4,
		spaceBetween: 15,
		slidesPerGroup: 5,
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
		breakpoints: {
			300: {
				slidesPerView: 2,
				spaceBetween: 7
			},
			500: {
				slidesPerView: 2,
				spaceBetween: 7
			},
			640: {
				slidesPerView: 3,
				spaceBetween: 10
			},
			768: {
				slidesPerView: 3,
				spaceBetween: 15
			},
			1024: {
				slidesPerView: 4,
				spaceBetween: 15
			}
		}
	});
</script>
</section>


<div id="popup" class="popup">
    <div class="popup-content">
        <span class="close" onclick="closePopup()">&times;</span>
        <div style="text-align: center;">
        <h2 >Thông tin sản phẩm</h2>
        
        &nbsp;&nbsp;&nbsp;
        
        <img src="../../php/uploads/<?php echo $urlchinh?>" width="100">
        <?php if ($urlphu1 !=null){?><img src="../../php/uploads/<?php echo $urlphu1?>" width="100"> <?php }?>
        <?php if ($urlphu2 !=null){?><img src="../../php/uploads/<?php echo $urlphu2?>" width="100"> <?php }?>
        <?php if ($urlphu3 !=null){?><img src="../../php/uploads/<?php echo $urlphu3?>" width="100"> <?php }?>


        </div>
        &nbsp;&nbsp;&nbsp;
        <p><strong>Tên sản phẩm:</strong> <?php echo $tensp?></p>
        <p><strong>Kích thước:</strong> <?php echo $size?> </p>
        <p><strong>Màu sắc:</strong> <?php echo $color?> </p>
        <p><strong>Số lượng:</strong> <?php echo $soluong?> </p>
        <p><strong>Giá:</strong> <?php echo number_format( $gia, 0, '.', '.')?> </p>
        <div style="text-align: center;">
        <a href="../BE/addSanPhamVaoGioHangThanhCong.php?user=<?php echo $sdt ?>&sid=<?php echo $idsanpham ?>&size=<?php echo $size ?>&color=<?php echo $color ?>&soluong=<?php echo $soluong ?>" class="btn btn-info">Thêm vào giỏ hàng</a>
        <a onclick="closePopup()"  class="btn btn-danger" style="color: white;">Hủy</a>
        </div>
        
                    
    </div>
</div>

<style>
 .popup {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.5);
    z-index: 999;
}

.popup-content {
    background-color: #fff;
    padding: 50px;
    border-radius: 50px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    box-shadow: 0 0 20px rgba(0,0,0,0.2); /* Đổ bóng */
}

.close {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 24px;
    color: #555;
    cursor: pointer;
    transition: color 0.3s;
}

.close:hover {
    color: #000;
}

button {
    padding: 10px 20px;
    margin-top: 20px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    
}

button:hover {
    background-color: #0056b3;
}

</style>
<script>
function openPopup() {
  document.getElementById("popup").style.display = "block";
}

function closePopup() {
  document.getElementById("popup").style.display = "none";
}


</script>

</body>

</html>
<?php include 'footer.html';?>
