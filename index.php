<?php 
{
	session_start();
	require 'auth.php';

	include 'rooturl.php';
	$rooturl = getRootURL();

	include 'topRated.php';
	$topratedarray = getTopRatedMarketPlace();
	// print_r($topratedarray);

	$appendstring ="";

	function getappendstring($inputarray)
	{
		$appendstring ="";
		foreach($inputarray as $product)
		{
			$appendstring .= "id[]=";
			$appendstring .= $product['productId']."&";
		}
		return $appendstring;
	}

	$idarray1 = getappendstring($topratedarray['akshay']);

	$idarray2 = getappendstring($topratedarray['nirbhay']);

	$idarray3 = getappendstring($topratedarray['tapan']);

	$idarray4 = getappendstring($topratedarray['yash']);

	function getProductsFromAkshay($idarray1) 
	{
		if($idarray1 != '')
		{
			// echo 'http://akshayjaiswal.me/getproductbyid.php?'.$idarray1;
			$curl = curl_init();
			curl_setopt_array($curl, array(
				CURLOPT_RETURNTRANSFER => 1,
				CURLOPT_URL => 'http://akshayjaiswal.me/getproductbyid.php?'.$idarray1,
				CURLOPT_USERAGENT => 'Codular Sample cURL Request'
			));
			$resp = curl_exec($curl);

			$product = json_decode($resp, true);
			// print_r($product);
			return $product;
		}
		else
		{
			echo "return empty";
			return [];
		}
	}

	function getProductsFromNirbhay($idarray2) {
		if($idarray2 != '')
		{
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL => 'http://nirbhaykekre.com/book.php?'.$idarray2,
			CURLOPT_USERAGENT => 'Codular Sample cURL Request'
		));
		$resp = curl_exec($curl);
		// echo $resp;
		$product = json_decode($resp, true);
		return $product;
		}
		else
		{
			return [];
		}
	}

	
	function getProductsFromTapan($idarray3) {
		if($idarray3 != '')
		{
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL => 'http://www.tapanhere.com/wp-json/products/productsinfo?'.$idarray3,
			CURLOPT_USERAGENT => 'Codular Sample cURL Request'
		));
		$resp = curl_exec($curl);
		$product = json_decode($resp, true);
		return $product;
		}
		else
		{
			return [];
		}
	}

	function getProductsFromYash($idarray4) {
		if($idarray4 != '')
		{
			$curl = curl_init();
			curl_setopt_array($curl, array(
				CURLOPT_RETURNTRANSFER => 1,
				CURLOPT_URL => 'http://yashmahajan.com/getProductsById.php?'.$idarray4,
				CURLOPT_USERAGENT => 'Codular Sample cURL Request'
			));
			$resp = curl_exec($curl);
			$product = json_decode($resp, true);
			return $product;
		}
		else
		{
			return [];
		}
	}

	// $products = getProductsFromAkshay($idarray1);

	$products = array_merge(getProductsFromAkshay($idarray1), getProductsFromNirbhay($idarray2), getProductsFromYash($idarray4));
	// echo print_r($products);
    $cookieString = substr($_COOKIE["product"],1);
        $cookieArray = explode(";", $cookieString);

        $cookieSize = sizeof($cookieArray);
        $limit = max($cookieSize-5, 0);
}
?>

<!DOCTYPE HTML>
<html>
	<head>
	<meta name="google-signin-client_id" content="853555902851-6pavsf9g93rgo2fgm4gesprkhsf2p0bn.apps.googleusercontent.com">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Sinnonyms Inc.</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />

  <!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	
	<!-- Date Picker -->
	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<!-- Flaticons  -->
	<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	<!--script src="facebook.js"></script-->
  	<script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>

	</head>
	<body>
	<div class="colorlib-loader"></div>

	<div id="page">
		<?php include 'header.php';?>
		<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url(http://akshayjaiswal.me/images/corsair2banner.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-md-pull-2 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner">
				   					<div class="desc">
					   					<h1 class="head-1">Mechanical</h1>
					   					<h2 class="head-2">Keyboards</h2>
					   					<h2 class="head-3">Collection</h2>
					   					<p class="category"><span>New stylish keyboards &amp; Accessories</span></p>
					   					<p><a href=<?php echo '"'.$rooturl.'/shop.php?from=akshay"'; ?> class="btn btn-primary">Shop Keyboards</a></p>
				   					</div>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
				<li style="background-image: url(http://nirbhaykekre.com/img/product/harryPotter1.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-md-pull-2 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner">
				   					<div class="desc">
					   					<h1 class="head-1">Amazing</h1>
					   					<h2 class="head-2">Books</h2>
					   					<h2 class="head-3">Collection</h2>
					   					<p class="category"><span>New entries in GOT series &amp; More</span></p>
					   					<p><a href="#" class="btn btn-primary">Shop Collection</a></p>
				   					</div>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			   	<li style="background-image: url(http://www.tapanhere.com/wp-content/uploads/2017/04/home-2.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-md-pull-2 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner">
				   					<div class="desc">
					   					<h1 class="head-1">Huge</h1>
					   					<h2 class="head-2">Sale</h2>
					   					<h2 class="head-3">45% off</h2>
					   					<p class="category"><span>New stylish shirts, pants &amp; Accessories</span></p>
					   					<p><a href="#" class="btn btn-primary">Shop Collection</a></p>
				   					</div>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			   	<li style="background-image: url(http://yashmahajan.com/img/bg-img/bg-1.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-md-push-3 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner">
				   					<div class="desc">
					   					<h1 class="head-1">New</h1>
					   					<h2 class="head-2">Arrival</h2>
					   					<h2 class="head-3">up to 30% off</h2>
					   					<p class="category"><span>New stylish shirts, pants &amp; Accessories</span></p>
					   					<p><a href="#" class="btn btn-primary">Shop Collection</a></p>
				   					</div>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>

		<div class="colorlib-shop">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
						<h2><span>Top rated</span></h2>
						<p>We love to tell our successful far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
					</div>
				</div>
				<div class="row">
            <?php
                foreach($products as $product)
                {
            ?>
					<div class="col-md-3 text-center">
						<div class="product-entry">
							<div class="product-img" style="background-image: url(<?php echo "{$product['URL']}"; ?>);">
								<p class="tag"><span class="new">New</span></p>
								<div class="cart">
									<p>
										<span class="addtocart"><a href=<?php echo 'cart.php?from='."{$product['from']}".'&id='."{$product['id']}".'&url='."{$product['URL']}".'&name='."{$product['name']}".'&price='."{$product['price']}"?>><i class="icon-shopping-cart"></i></a></span> 
										<span><a href="product-detail.php"><i class="icon-eye"></i></a></span> 
										<span><a href="#"><i class="icon-heart3"></i></a></span>
										<span><a href="add-to-wishlist.php"><i class="icon-bar-chart"></i></a></span>
									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href=<?php echo 'product-detail.php?id='."{$product['id']}".'&from='."{$product['from']}"?>><?php echo "{$product['name']}"; ?></a></h3>
								<p class="price"><span>$<?php echo "{$product['price']}"; ?></span></p>
							</div>
						</div>
                    </div>
            <?php
                }
            ?>
				</div>
			</div>
		</div>


		<div id="colorlib-intro" class="colorlib-intro" style="background-image: url(images/cover-img-1.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="intro-desc">
							<div class="text-salebox">
								<div class="text-lefts">
									<div class="sale-box">
										<div class="sale-box-top">
											<h2 class="number">45</h2>
											<span class="sup-1">%</span>
											<span class="sup-2">Off</span>
										</div>
										<h2 class="text-sale">Sale</h2>
									</div>
								</div>
								<div class="text-rights">
									<h3 class="title">Just hurry up limited offer!</h3>
									<p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
									<p><a href="shop.php" class="btn btn-primary">Shop Now</a> <a href="#" class="btn btn-primary btn-outline">Read more</a></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div id="colorlib-testimony" class="colorlib-light-grey">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
						<h2><span>Our Satisfied Customer says</span></h2>
					</div>
				</div>
				<div class="row">
					<div class="col-md-8 col-md-offset-2">						
						<div class="owl-carousel2">
							<div class="item">
								<div class="testimony text-center">
									<span class="img-user" style="background-image: url(images/person1.jpg);"></span>
									<span class="user">Alysha Myers</span>
									<small>Miami Florida, USA</small>
									<blockquote>
										<p>" A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
									</blockquote>
								</div>
							</div>
							<div class="item">
								<div class="testimony text-center">
									<span class="img-user" style="background-image: url(images/person2.jpg);"></span>
									<span class="user">James Fisher</span>
									<small>New York, USA</small>
									<blockquote>
										<p>One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
									</blockquote>
								</div>
							</div>
							<div class="item">
								<div class="testimony text-center">
									<span class="img-user" style="background-image: url(images/person3.jpg);"></span>
									<span class="user">Jacob Webb</span>
									<small>Athens, Greece</small>
									<blockquote>
										<p>Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</p>
									</blockquote>
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>

		<div class="colorlib-blog">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center colorlib-heading">
						<h2>Recent Blog</h2>
						<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<article class="article-entry">
							<a href="blog.php" class="blog-img" style="background-image: url(images/blog-1.jpg);"></a>
							<div class="desc">
								<p class="meta"><span class="day">02</span><span class="month">Mar</span></p>
								<p class="admin"><span>Posted by:</span> <span>Noah Henderson</span></p>
								<h2><a href="blog.php">Openning Branches</a></h2>
								<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life</p>
							</div>
						</article>
					</div>
					<div class="col-md-4">
						<article class="article-entry">
							<a href="blog.php" class="blog-img" style="background-image: url(images/blog-2.jpg);"></a>
							<div class="desc">
								<p class="meta"><span class="day">02</span><span class="month">Mar</span></p>
								<p class="admin"><span>Posted by:</span> <span>Noah Henderson</span></p>
								<h2><a href="blog.php">Openning Branches</a></h2>
								<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life</p>
							</div>
						</article>
					</div>
					<div class="col-md-4">
						<article class="article-entry">
							<a href="blog.php" class="blog-img" style="background-image: url(images/blog-3.jpg);"></a>
							<div class="desc">
								<p class="meta"><span class="day">02</span><span class="month">Mar</span></p>
								<p class="admin"><span>Posted by:</span> <span>Noah Henderson</span></p>
								<h2><a href="blog.php">Openning Branches</a></h2>
								<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life</p>
							</div>
						</article>
					</div>
				</div>
			</div>
		</div>
		
		<div id="colorlib-subscribe">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<div class="col-md-6 text-center">
							<h2><i class="icon-paperplane"></i>Sign Up for a Newsletter</h2>
						</div>
						<div class="col-md-6">
							<form class="form-inline qbstp-header-subscribe">
								<div class="row">
									<div class="col-md-12 col-md-offset-0">
										<div class="form-group">
											<input type="text" class="form-control" id="email" placeholder="Enter your email">
											<button type="submit" class="btn btn-primary">Subscribe</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

		<footer id="colorlib-footer" role="contentinfo">
			<div class="container">
				<div class="row row-pb-md">
					<div class="col-md-3 colorlib-widget">
						<h4>About Store</h4>
						<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.</p>
						<p>
							<ul class="colorlib-social-icons">
								<li><a href="#"><i class="icon-twitter"></i></a></li>
								<li><a href="#"><i class="icon-facebook"></i></a></li>
								<li><a href="#"><i class="icon-linkedin"></i></a></li>
								<li><a href="#"><i class="icon-dribbble"></i></a></li>
							</ul>
						</p>
					</div>
					<div class="col-md-2 colorlib-widget">
						<h4>Customer Care</h4>
						<p>
							<ul class="colorlib-footer-links">
								<li><a href="#">Contact</a></li>
								<li><a href="#">Returns/Exchange</a></li>
								<li><a href="#">Gift Voucher</a></li>
								<li><a href="#">Wishlist</a></li>
								<li><a href="#">Special</a></li>
								<li><a href="#">Customer Services</a></li>
								<li><a href="#">Site maps</a></li>
							</ul>
						</p>
					</div>
					<div class="col-md-2 colorlib-widget">
						<h4>Information</h4>
						<p>
							<ul class="colorlib-footer-links">
								<li><a href="#">About us</a></li>
								<li><a href="#">Delivery Information</a></li>
								<li><a href="#">Privacy Policy</a></li>
								<li><a href="#">Support</a></li>
								<li><a href="#">Order Tracking</a></li>
							</ul>
						</p>
					</div>

					<div class="col-md-2">
						<h4>News</h4>
						<ul class="colorlib-footer-links">
							<li><a href="blog.php">Blog</a></li>
							<li><a href="#">Press</a></li>
							<li><a href="#">Exhibitions</a></li>
						</ul>
					</div>

					<div class="col-md-3">
						<h4>Contact Information</h4>
						<ul class="colorlib-footer-links">
							<li>291 South 21th Street, <br> Suite 721 New York NY 10016</li>
							<li><a href="tel://1234567920">+ 1235 2355 98</a></li>
							<li><a href="mailto:info@yoursite.com">info@yoursite.com</a></li>
							<li><a href="#">yoursite.com</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="copy">
				<div class="row">
					<div class="col-md-12 text-center">
						<p>
							
							<span class="block"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart2" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span> 
							<span class="block">Demo Images: <a href="http://unsplash.co/" target="_blank">Unsplash</a> , <a href="http://pexels.com/" target="_blank">Pexels.com</a></span>
						</p>
					</div>
				</div>
			</div>
		</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- Owl carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<!-- Date Picker -->
	<script src="js/bootstrap-datepicker.js"></script>
	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>

