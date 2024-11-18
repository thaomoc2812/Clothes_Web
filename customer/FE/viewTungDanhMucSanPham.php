<?php 
$tendanhmuc = $_GET['tendanhmuc'];
$loaisanphammm = $_GET['loaisanpham'];
$sdt = $_GET['user'];
$user = $sdt;
include 'header.php';
?>

        <li class="nav-item ">
            <a class="nav-link" href="" ><?php echo $loaisanphammm ?></a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="" ><?php echo $tendanhmuc ?></a>
        </li>
		
    </ul>
</div>


<!-- body -->
<section class="awe-section-3">	
	<div class="container ant-block-product" data-aos="flip-down">
	
	
	<?php 
           
			$view_danhmuc = "SELECT * FROM danhmucsanpham WHERE tendanhmuc = '$tendanhmuc'";
			$result_danhmuc = mysqli_query($conn, $view_danhmuc);
            $r_danhmuc = mysqli_fetch_assoc($result_danhmuc);
			$iddanhmuc = $r_danhmuc['id'] ;
            $resul_ttsp= "SELECT * FROM thongtinsanpham WHERE iddanhmuc = $iddanhmuc";
			$result_ttsp = mysqli_query($conn, $resul_ttsp);
            while($r_ttsp = mysqli_fetch_assoc($result_ttsp))
			{?>

    <div class="ant-swiper-product swiper-container">
		<div class="swiper-wrapper">
			<?php 
			
            $masanpham = $r_ttsp['masanpham'];
            $show = "SELECT * FROM sanpham WHERE masanpham = '$masanpham'";
            if($show_result1 = mysqli_query($conn, $show))
			{
			?>
			<div class="swiper-slide">
			<?php
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
	<a href="" class="ant-item-product-name"><?php echo $show_r1['tensanpham']?></a>
	<div class="product-bottom">
		<span class="price-group">

			<span class="price"><?php echo number_format( $fetch_gia['giabanra'], 0, '.', '.')?></span>
		</span>
		
	</div>
</div>	
			</div>
<?php } }?>



            <?php
			if($r_ttsp = mysqli_fetch_assoc($result_ttsp)){;?>
			<div class="swiper-slide">
			<?php
            $masanpham = $r_ttsp['masanpham'];
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

			<span class="price"><?php echo number_format( $fetch_gia['giabanra'], 0, '.', '.')?></span>
		</span>
		
	</div>
</div>	
			</div>
			<?php } }?>

			
            <?php
			if($r_ttsp = mysqli_fetch_assoc($result_ttsp)){;?>
			<div class="swiper-slide">
			<?php
            $masanpham = $r_ttsp['masanpham'];
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

			<span class="price"><?php echo number_format( $fetch_gia['giabanra'], 0, '.', '.')?></span>
		</span>
	
	</div>
</div>	
			</div>
			<?php } ?>
            <?php } ?>

            <?php
			if($r_ttsp = mysqli_fetch_assoc($result_ttsp)){;?>
			<div class="swiper-slide">
			<?php
            $masanpham = $r_ttsp['masanpham'];
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

			<span class="price"><?php echo number_format( $fetch_gia['giabanra'], 0, '.', '.')?></span>
		</span>
		
	</div>
</div>	
			</div>
            <?php } ?>
			<?php } ?>
			<?php } ?>


			
		</div>
		
	
	
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

