<?php $sdt = $_GET['user'];
require_once '../../php/connect.php';

if($sdt != '0')
{
	$search_khach = "SELECT * FROM khachhang WHERE  sdt = '$sdt' ";
	$result_khach = mysqli_query($conn, $search_khach);
	$fetch_khach= mysqli_fetch_assoc($result_khach);
	$idkhachhang = $fetch_khach['id'];
	$sql = "SELECT COUNT(*) AS countGioHang FROM giohang WHERE idkhachhang = $idkhachhang";
	$result = $conn->query($sql);
	$row = mysqli_fetch_assoc($result);
    $countGioHang = $row['countGioHang'];
}

?>
<!DOCTYPE html>
<html lang="vi">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<title>Warehouse Shopping</title>

		<meta name='revisit-after' content='1 days' />
		<meta name="robots" content="noodp,index,follow" />
		<meta name="theme-color" content="#c1582a" />
		<link rel="icon" href="../../images/warehouse_icon.png" type="image/x-icon" />
		<link rel="apple-touch-icon" href="../images/warehouse_icon.png">
		<meta property="og:type" content="website">
<meta property="og:title" content="Warehouse Shopping">
<meta property="og:image:alt" content="Warehouse Shopping">
<meta property="og:image" content="../images/warehouse.png">
<meta property="og:image:secure_url" content="../images/warehouse.png">

		<link rel="stylesheet" type="text/css" href="//bizweb.dktcdn.net/100/427/638/themes/821662/assets/font.scss.css?1705393535715" media="print" onload="this.media='all';">
		<link rel="preload" as="style" type="text/css" href="//bizweb.dktcdn.net/100/427/638/themes/821662/assets/bootstrap.css?1705393535715" onload="this.rel='stylesheet'" />
		<link href="//bizweb.dktcdn.net/100/427/638/themes/821662/assets/bootstrap.css?1705393535715" rel="stylesheet" type="text/css" media="all" />
		<link rel="preload" as="style" type="text/css" href="//bizweb.dktcdn.net/100/427/638/themes/821662/assets/evo-main.scss.css?1705393535715" onload="this.rel='stylesheet'" />
		<link href="//bizweb.dktcdn.net/100/427/638/themes/821662/assets/evo-main.scss.css?1705393535715" rel="stylesheet" type="text/css" media="all" />
		
		
		<link rel="preload" as="style" type="text/css" href="//bizweb.dktcdn.net/100/427/638/themes/821662/assets/evo-index.scss.css?1705393535715" onload="this.rel='stylesheet'" />
		<link href="//bizweb.dktcdn.net/100/427/638/themes/821662/assets/evo-index.scss.css?1705393535715" rel="stylesheet" type="text/css" media="all" />
		
		<link rel="preload" as="style" type="text/css" href="//bizweb.dktcdn.net/100/427/638/themes/821662/assets/swiper.scss.css?1705393535715" onload="this.rel='stylesheet'" />
		<link href="//bizweb.dktcdn.net/100/427/638/themes/821662/assets/swiper.scss.css?1705393535715" rel="stylesheet" type="text/css" media="all" />
	
		<link rel="preload" as="script" href="//bizweb.dktcdn.net/100/427/638/themes/821662/assets/jquery.js?1705393535715" />
		<script src="//bizweb.dktcdn.net/100/427/638/themes/821662/assets/jquery.js?1705393535715" type="text/javascript"></script>
		<link rel="stylesheet" href="../../css/boostrap/bootstrap.min.css" type="text/css">
    <!-- Font awesome -->
    <link rel="stylesheet" href="../../css/boostrap/font-awesome.min.css" type="text/css">
	<link rel="stylesheet" href="../../css/boostrap/bootstrap.min.css" type="text/css">

    <!-- Custom css - Các file css do chúng ta tự viết -->
    <link rel="stylesheet" href="../../css/product-detail.css" type="text/css">
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBXBzdeIkpfiSiSRLDdPS3tXAVHQ87vyXE&libraries=places&language=vi&region=VN"></script>
	</head>
	<body class="index">
		<header class="header">
	<div class="container">
		<div class="row align-items-center evo-search-desktop">
			<div class="col-lg-2 col-xl-2 ant-mobile-button">
				<a class="d-sm-inline-block d-lg-none menu-icon" href="javascript:void(0)" title="Menu" aria-label="Menu" id="trigger-mobile"><svg height="384pt" viewBox="0 -53 384 384" width="384pt" xmlns="http://www.w3.org/2000/svg"><path d="m368 154.667969h-352c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h352c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0"/><path d="m368 32h-352c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h352c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0"/><path d="m368 277.332031h-352c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h352c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0"/></svg></a>
				
					<img width="180" height="42" src="../../images/warehouse.png" data-src="../images/warehouse.png" alt="Warehouse" class="lazy img-responsive mx-auto d-block" />
				</a>
				<a 
				<?php if ($sdt != 0){?>
				href="viewGioHang.php?user=<?php echo $sdt ?>" <?php }
				?>
				<?php 
				
				?>
				class="evo-header-cart d-sm-inline-block d-lg-none" aria-label="Xem giỏ hàng" title="Giỏ hàng">
					<svg viewBox="0 0 19 23">
						<path d="M0 22.985V5.995L2 6v.03l17-.014v16.968H0zm17-15H2v13h15v-13zm-5-2.882c0-2.04-.493-3.203-2.5-3.203-2 0-2.5 1.164-2.5 3.203v.912H5V4.647C5 1.19 7.274 0 9.5 0 11.517 0 14 1.354 14 4.647v1.368h-2v-.912z" fill="#222"></path>
					</svg>
					<span class="count_item_pr">
						<?php if($sdt != '0') 
							{ 
								echo $countGioHang; 
							} else 
							{ 
								echo 0;
							}?></span>
				</a>
			</div>
			<div class="col-xl-7 col-lg-6 evo-searchs">
				<form action="../BE/searchSanPham.php" method="post" class="evo-header-search-form evo-search-form" role="search">
					<input type="text" name="user" value ="<?php echo $sdt?>" hidden>
					<input type="text" aria-label="Tìm sản phẩm" name="key" class="search-auto form-control" placeholder="Bạn cần tìm gì?" autocomplete="off" />
					<button class="btn btn-default" type="submit" aria-label="Tìm kiếm">
						<svg class="Icon Icon--search-desktop" viewBox="0 0 21 21">
							<g transform="translate(1 1)" stroke="currentColor" stroke-width="2" fill="none" fill-rule="evenodd" stroke-linecap="square">
								<path d="M18 18l-5.7096-5.7096"></path>
								<circle cx="7.2" cy="7.2" r="7.2"></circle>
							</g>
						</svg>
					</button>
				</form>
			</div>
			<div class="col-xl-3 col-lg-4 ant-account d-lg-flex d-none">
				<div class="evo-main-account">
					<a <?php if ($sdt != 0){?>
				href="taiKhoan.php?user=<?php echo $sdt ?>" <?php }
				?> class="header-account" aria-label="Tài khoản" title="Tài khoản">
						<svg viewBox="0 0 512 512"><path d="M437.02,330.98c-27.883-27.882-61.071-48.523-97.281-61.018C378.521,243.251,404,198.548,404,148    C404,66.393,337.607,0,256,0S108,66.393,108,148c0,50.548,25.479,95.251,64.262,121.962    c-36.21,12.495-69.398,33.136-97.281,61.018C26.629,379.333,0,443.62,0,512h40c0-119.103,96.897-216,216-216s216,96.897,216,216    h40C512,443.62,485.371,379.333,437.02,330.98z M256,256c-59.551,0-108-48.448-108-108S196.449,40,256,40    c59.551,0,108,48.448,108,108S315.551,256,256,256z" data-original="#222222" class="active-path" fill="#222222"/></svg>
						<span class="acc-text">Tài khoản</span>
					</a>
					<ul>
						<?php if ($sdt == 0 ) {?>
							<li class="ng-scope"><a rel="nofollow" href="../../html/dangNhap.php?sid=<?php echo 0 ?>" title="Đăng nhập">Đăng nhập</a></li>
							<li class="ng-scope"><a rel="nofollow" href="../../html/dangKy.php?sid=<?php echo 0 ?> "title="Đăng ký">Đăng ký</a></li>
						
							
						<?php }
						else {?>
							<li class="ng-scope"><a rel="nofollow" href="../../html/dangNhap.php?sid=<?php echo 0 ?>" title="Đăng xuất">Đăng xuất</a></li> <?php } ?>
						
						
						
					</ul>
				</div>
				<a <?php if ($sdt != 0){?>
				href="viewGioHang.php?user=<?php echo $sdt ?>" <?php }
				?> class="evo-header-cart" aria-label="Xem giỏ hàng" title="Giỏ hàng">
					<svg viewBox="0 0 512 512"><g><path xmlns="http://www.w3.org/2000/svg" d="m504.399 185.065c-6.761-8.482-16.904-13.348-27.83-13.348h-98.604l-53.469-122.433c-3.315-7.591-12.157-11.06-19.749-7.743-7.592 3.315-11.059 12.158-7.743 19.75l48.225 110.427h-178.458l48.225-110.427c3.315-7.592-.151-16.434-7.743-19.75-7.591-3.317-16.434.15-19.749 7.743l-53.469 122.434h-98.604c-10.926 0-21.069 4.865-27.83 13.348-6.637 8.328-9.086 19.034-6.719 29.376l52.657 230c3.677 16.06 17.884 27.276 34.549 27.276h335.824c16.665 0 30.872-11.216 34.549-27.276l52.657-230.001c2.367-10.342-.082-21.048-6.719-29.376zm-80.487 256.652h-335.824c-2.547 0-4.778-1.67-5.305-3.972l-52.657-229.998c-.413-1.805.28-3.163.936-3.984.608-.764 1.985-2.045 4.369-2.045h85.503l-3.929 8.997c-3.315 7.592.151 16.434 7.743 19.75 1.954.854 3.99 1.258 5.995 1.258 5.782 0 11.292-3.363 13.754-9l9.173-21.003h204.662l9.173 21.003c2.462 5.638 7.972 9 13.754 9 2.004 0 4.041-.404 5.995-1.258 7.592-3.315 11.059-12.158 7.743-19.75l-3.929-8.997h85.503c2.384 0 3.761 1.281 4.369 2.045.655.822 1.349 2.18.936 3.983l-52.657 230c-.528 2.301-2.76 3.971-5.307 3.971z" fill="#ffffff" data-original="#000000" style=""/><path xmlns="http://www.w3.org/2000/svg" d="m166 266.717c-8.284 0-15 6.716-15 15v110c0 8.284 6.716 15 15 15s15-6.716 15-15v-110c0-8.284-6.715-15-15-15z" fill="#ffffff" data-original="#000000" style=""/><path xmlns="http://www.w3.org/2000/svg" d="m256 266.717c-8.284 0-15 6.716-15 15v110c0 8.284 6.716 15 15 15s15-6.716 15-15v-110c0-8.284-6.716-15-15-15z" fill="#ffffff" data-original="#000000" style=""/><path xmlns="http://www.w3.org/2000/svg" d="m346 266.717c-8.284 0-15 6.716-15 15v110c0 8.284 6.716 15 15 15s15-6.716 15-15v-110c-.001-8.284-6.716-15-15-15z" fill="#ffffff" data-original="#000000" style=""/></g></svg>
					<span class="count_item_pr">
						<?php if($sdt != '0') 
							{ 
								echo $countGioHang; 
							} else 
							{ 
								echo 0;
							}?></span>
					<span class="acc-text">Giỏ hàng</span>
				</a>
			</div>
		</div>
	</div>
</header>
<div id="nav" class="d-lg-block d-none">
	<ul class="nav container">
	
	
	
	
	<li class="nav-item active ">
		<a class="nav-link" href="../home.php?user=<?php echo $sdt ?>" title="Trang chủ" >Trang chủ</a>
	</li>
	
	<li class="  nav-item has-childs   has-mega">
		<a href="viewTatCaSanPham.php?user=<?php echo $sdt ?>" class="nav-link" title="Sản phẩm">Sản phẩm <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 490.656 490.656" style="enable-background:new 0 0 490.656 490.656;" xml:space="preserve" width="25px" height="25px"><path d="M487.536,120.445c-4.16-4.16-10.923-4.16-15.083,0L245.339,347.581L18.203,120.467c-4.16-4.16-10.923-4.16-15.083,0    c-4.16,4.16-4.16,10.923,0,15.083l234.667,234.667c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.136l234.667-234.667    C491.696,131.368,491.696,124.605,487.536,120.445z" data-original="#000000" class="active-path" data-old_color="#000000" fill="#141414"/></svg></a>
		<div class="mega-content">
			<div class="container">
				<div class="row">
					<a class="col-lg-2 fix-padding-right-menu" href="viewTatCaSanPham.php" title="Sản phẩm">
						<img height="253" width="190" src="../../php/uploads/Screenshot 2024-01-30 165552.png" />
					</a>
					<div class="level0 col-lg-6">
						
						<?php //ket noi csdl
		
						
		
		
						$view_sql2 = "SELECT * FROM phanloaisanpham";
						$result2 = mysqli_query($conn, $view_sql2);
						while ($r2 = mysqli_fetch_assoc($result2)) {
							$loaisanpham = $r2['loaisanpham'];
							?>
							<div class="level1">
							<a class="hmega" href="viewTungPhanLoaiSanPham.php?user=<?php echo $sdt ?>&sid=<?php echo $r2['loaisanpham']?>"><?php echo $r2['loaisanpham']?></a>
									<?php
									
									$search_sql = "SELECT * FROM phanloaisanpham WHERE loaisanpham = '$loaisanpham'";
									$result = mysqli_query($conn, $search_sql);
									if ($r = mysqli_fetch_assoc($result))
										$idloaisanpham = $r['id'];
									$view_sql3 = "SELECT * FROM danhmucsanpham WHERE idphanloai = $idloaisanpham";
									$result3 = mysqli_query($conn, $view_sql3);
									while ($r3 = mysqli_fetch_assoc($result3)) {
									?>
										<a class="level2" href="viewTungDanhMucSanPham.php?user=<?php echo $sdt ?>&loaisanpham=<?php echo $r2['loaisanpham']?>&tendanhmuc=<?php echo $r3['tendanhmuc'] ?>"><?php echo  $r3['tendanhmuc'] ?></a>
									
									<?php
									} ?>
								
							</div>
							
							<?php
							} ?>
						
					</div>
					<div class="col-lg-4 ant-three-banner-menu fix-padding-left-menu">
						<a class="three-big" href="" title="Sản phẩm">
							<img height="260" width="195" src="../../php/uploads/1.jpg" />
						</a>
						<div class="three-small">
							<a href="" title="Sản phẩm">
								<img height="130" width="195" src="../../php/uploads/anh1.png" />
							</a>
							<a href="" title="Sản phẩm">
								<img height="130" width="195" src="../../php/uploads/aobabytee.png" />
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
			</li>
			
			
			
			<li class="nav-item  sale-menu">
				<a class="nav-link" href="viewSale.php?user=<?php echo $sdt ?>" title="" >Sale</a>
			</li>
		
