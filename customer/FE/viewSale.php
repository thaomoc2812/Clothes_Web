<?php
if(isset($_GET['user'])){
$sdt = $_GET['user'];
$user = $sdt;
}
include 'header.php';
?>
     
    </ul>
</div>


<!-- body -->
<section class="awe-section-3">	
	<div class="container ant-block-product" data-aos="flip-down">
	
	
	<?php 
	 $now = date('Y-m-d');
	 $search_ttkm = "SELECT * FROM thongtinkhuyenmai WHERE ngaybatdau <= '$now' AND ngayketthuc >= '$now'";
	 $check_km = 0;
	 if($result_ttkm = mysqli_query($conn, $search_ttkm))
	 {
		
		while($fetch_ttkm = mysqli_fetch_assoc($result_ttkm))
		{
			$makhuyenmai = $fetch_ttkm['makhuyenmai'];
			$search_km = "SELECT DISTINCT masanpham FROM khuyenmai WHERE  makhuyenmai = '$makhuyenmai'";
			$result_km = mysqli_query($conn, $search_km);
		   $check_km = 1;
		   while($fetch_km = mysqli_fetch_assoc($result_km))
		   {
		   
                       
                        ?>

                    
				
			
			

    <div class="ant-swiper-product swiper-container">
		<div class="swiper-wrapper">
	
			<div class="swiper-slide">
			<?php
            $masanpham = $fetch_km['masanpham'];
            $show = "SELECT * FROM sanpham WHERE masanpham = '$masanpham'";
            $show_result1 = mysqli_query($conn, $show);
            $show_r1 = mysqli_fetch_assoc($show_result1);
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
	<a href="" class="ant-item-product-name"><?php echo $show_r1['tensanpham']?></a>
	<div class="product-bottom">
		<span class="price-group">

			<span class="price"><?php 
			$giathat = $fetch_gia['giabanra']*(100 - $fetch_ttkm['giam'])/100;
			echo number_format( $giathat, 0, '.', '.')?></span>
		</span>
		
	</div>
</div>	
			</div>
			<?php } ?>




            <?php
			if($fetch_km = mysqli_fetch_assoc($result_km)){;?>
			<div class="swiper-slide">
			<?php
            $masanpham = $fetch_km['masanpham'];
            $show = "SELECT * FROM sanpham WHERE masanpham = '$masanpham'";
            $show_result1 = mysqli_query($conn, $show);
            $show_r1 = mysqli_fetch_assoc($show_result1);
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
	<a href="" class="ant-item-product-name"><?php echo $show_r1['tensanpham']?></a>
	<div class="product-bottom">
		<span class="price-group">

			<span class="price"><?php 
			$giathat = $fetch_gia['giabanra']*(100 - $fetch_ttkm['giam'])/100;
			echo number_format( $giathat, 0, '.', '.')?></span>
		</span>
	
	</div>
</div>	
			</div>
			<?php } ?>
            <?php } ?>

			
			<?php
			if($fetch_km = mysqli_fetch_assoc($result_km)){;?>
			<div class="swiper-slide">
			<?php
            $masanpham = $fetch_km['masanpham'];
            $show = "SELECT * FROM sanpham WHERE masanpham = '$masanpham'";
            $show_result1 = mysqli_query($conn, $show);
            $show_r1 = mysqli_fetch_assoc($show_result1);
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
	<a href="" class="ant-item-product-name"><?php echo $show_r1['tensanpham']?></a>
	<div class="product-bottom">
		<span class="price-group">

			<span class="price"><?php 
			$giathat = $fetch_gia['giabanra']*(100 - $fetch_ttkm['giam'])/100;
			echo number_format( $giathat, 0, '.', '.')?></span>
		</span>
		
	</div>
</div>	
			</div>
			
			<?php } ?>
            <?php } ?>

			<?php
			if($fetch_km = mysqli_fetch_assoc($result_km)){;?>
			<div class="swiper-slide">
			<?php
            $masanpham = $fetch_km['masanpham'];
            $show = "SELECT * FROM sanpham WHERE masanpham = '$masanpham'";
            $show_result1 = mysqli_query($conn, $show);
            $show_r1 = mysqli_fetch_assoc($show_result1);
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
	<a href="" class="ant-item-product-name"><?php echo $show_r1['tensanpham']?></a>
	<div class="product-bottom">
		<span class="price-group">

			<span class="price"><?php 
			$giathat = $fetch_gia['giabanra']*(100 - $fetch_ttkm['giam'])/100;
			echo number_format( $giathat, 0, '.', '.')?></span>
		</span>
		
	</div>
</div>	
			</div>
			<?php } ?>
            <?php } ?>


			
		</div>
		
	</div>
	
		<?php }?>
        <?php }?>
		<?php }?>


			
			
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

<?php include 'footer.html';?>

