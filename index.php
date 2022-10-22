<!doctype html>
<html>
<?php
session_start();

error_reporting(0);
ini_set('display_errors', 0);
include 'core.php';
$homepage = mysqli_query($con, 'SELECT * FROM homepage');
$cabang = mysqli_query($con, "SELECT * FROM cabang");
$latessparepart = mysqli_query($con, "SELECT * FROM catalogs ORDER BY id DESC LIMIT 2");
?>

<head>
	<meta charset="UTF-8">
	<title>Sparepart Motor </title>
	<meta name="description" content="Scarica gratis il nostro Template HTML/CSS GARAGE. Se avete bisogno di un design per il vostro sito web GARAGE può fare per voi. Web Domus Italia">
	<meta name="author" content="Web Domus Italia">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="source/bootstrap-3.3.6-dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="source/font-awesome-4.5.0/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="style/slider.css">
	<link rel="stylesheet" type="text/css" href="style/mystyle.css">
</head>

<body>
	<!-- Header -->
	<div class="allcontain">

		<nav class="topnavbar navbar-default topnav">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed toggle-costume" data-toggle="collapse" data-target="#upmenu" aria-expanded="false">
						<span class="sr-only"> Toggle navigaion</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand logo" href="#"><img src="img/logo1.png" alt="logo"></a>
				</div>
			</div>
			<div class="collapse navbar-collapse" id="upmenu">
				<ul class="nav navbar-nav" id="navbarontop">
					<li class="active"><a href="#">HOME</a> </li>
					<li class="dropdown">
						<a href="catalog.php" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">CATALOGS</a>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cabang Kami <span class="caret"></span></a>
						<ul class="dropdown-menu dropdowncostume">
							<?php foreach ($cabang as $z) : ?>
								<li><a href="cabang.php?cabang=<?= $z['cabang'] ?>"><?= $z['cabang'] ?></a></li>
							<?php endforeach; ?>

						</ul>
					</li>
					<li>
						<a href="contact.htmlz">CONTACT</a>

					</li>
					<li>
						<a href="keranjang.php">Keranjang</a>
					</li>
					<li>
						<?php
						if ($_SESSION['uname'] == '') { ?>
							<a href="login.php"><span class="postnewcar">Login</span></a>
					</li>
				<?php } else { ?>
					<li class="dropdown">

						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $_SESSION['uname']; ?><span class="caret"></span></a>
						<ul class="dropdown-menu dropdowncostume">
							<li><a href="logout.php">Log Out</a></li>
						</ul>
					</li>

				<?php } ?>
				</ul>
			</div>
		</nav>
	</div>

	<div class="allcontain">

		<div id="carousel-up" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner " role="listbox">
				<?php foreach ($homepage as $index => $i) : ?>
					<div class="item<?= !$index ? ' active' : '' ?>">
						<img class="imgcrsl" src="img/<?= $i['pics'] ?>" alt="oldcar">
						<div class="carousel-caption">
							<h1><?= $i['title'] ?></h1>
							<h3><?= $i['text'] ?></h3>
						</div>
					</div>
				<?php endforeach; ?>
				<style>
					.imgcrsl {
						width: auto;
						height: 200px;
					}
				</style>
			</div>


			<nav class="navbar navbar-default midle-nav">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed textcostume" data-toggle="collapse" data-target="#navbarmidle" aria-expanded="false">
						<h1>SEARCH TEXT</h1>
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<div class="collapse navbar-collapse" id="navbarmidle">
					<div class="searchtxt">
						<h1>S E A R C H &nbsp;&nbsp;&nbsp; S P A R E P A R T</h1>
					</div>
					<form class="navbar-form navbar-left searchformmargin" method="post">
						<div class="form-group">
							<input name="name" type="text" class="form-control searchform" placeholder="Cari Sparepart">
							<input type="text" name="price" class="form-control searchform" placeholder="Cari Harga Relevan">
						</div>
						<button type="submit" name="search" class="searchbutton glyphicon glyphicon-search"></button>
					</form>
					<?php
					if(isset($_POST['search'])){
						if($_POST['name']==''){
							header('Location:catalog.php?page=sort&&price=$_POST[price]');
						}else{
							header('Location:catalog.php?page=sort&&name=$_POST[name]');

						}
					}
					?>

				</div>
			</nav>
		</div>
	</div>
	<!-- ____________________Featured Section ______________________________-->
	<div class="allcontain">
		<div class="feturedsection">
			<h1 class="text-center"><span class="bdots">&bullet;</span>L A T E S T<span class="carstxt">S P A R E P A R T</span>&bullet;</h1>
		</div>
		<div class="feturedimage">
			<div class="row firstrow">
				<?php foreach ($latessparepart as $ls) : ?>
					<div class="col-lg-6 costumcol colborder1">
						<div class="row costumrow">
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 img1colon">
								<img src="img/<?= $ls['pics'] ?>" alt="porsche">
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 txt1colon ">
								<div class="featurecontant">
									<h1><?= $ls['name'] ?></h1>
									<p>"<?= $ls['description'] ?> "</p>
									<h2>Rp. <?= $ls['price'] ?></h2>
									
										<center><button class="detail">
											<a style="text-decoration:none;color:white" href="catalog.php?page=detail&&id=<?=$ls['id']?>" name="detailz" type="submit" >SEE DETAIL</a>
										
											</button></center>
								
								 <!-- <?php
											if (isset($_POST['detailz'])) {
												header('Location:youtube.com');
											}
											?>  -->
									<style>
										.detail {
											border-radius: 5%;
											font-family: OpenSans-Light;
											font-size: 20px;
											background-color: #000359;
											color: white;
											width: 150px;
											height: 50px;
										}
										
									</style>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>


			</div>
		</div>
		<!-- ________________________LATEST CARS SECTION _______________________-->
		<div class="latestcars">
			<h1 class="text-center">&bullet; LATEST CARS &bullet;</h1>
			<ul class="nav nav-tabs navbar-left latest-navleft">
				<li role="presentation" class="li-sortby"><span class="sortby">SORT BY: </span></li>
				<li data-filter=".RECENT" role="presentation"><a href="#mostrecent" class="prcBtnR">MOST RECENT </a></li>
				<li data-filter=".POPULAR" role="presentation"><a href="#mostpopular" class="prcBtnR">MOST POPULAR </a></li>
				<li role="presentation"><a href="#" class="alphSort">ALPHABETICAL </a></li>
				<li data-filter=".HPRICE" role="presentation"><a href="#" class="prcBtnH">HIGHEST PRICE </a></li>
				<li data-filter=".LPRICE" role="presentation"><a href="#" class="prcBtnL">LOWEST PRICE </a></li>
				<li id="hideonmobile">
			</ul>
		</div>
		<br>
		<br>
		<!-- ________________________Latest Cars Image Thumbnail________________-->
		<div class="grid">
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
					<div class="txthover">
						<img src="img/car1.jpg" alt="car1">
						<div class="txtcontent">
							<div class="stars">
								<div class="glyphicon glyphicon-star"></div>
								<div class="glyphicon glyphicon-star"></div>
								<div class="glyphicon glyphicon-star"></div>
							</div>
							<div class="simpletxt">
								<h3 class="name">Rolls Royce</h3>
								<p>"Lorem ipsum dolor sit amet, consectetur,<br>
									sed do eiusmod tempor incididunt" </p>
								<h4 class="price"> 1000&euro;</h4>
								<button>READ MORE</button><br>
								<div class="wishtxt">
									<p class="paragraph1"> Add to Wishlist <span class="glyphicon glyphicon-heart"></span> </p>
									<p class="paragraph2">Compare <span class="icon"><img src="img/compicon.png" alt="compicon"></span></p>
								</div>
							</div>
							<div class="stars2">
								<div class="glyphicon glyphicon-star"></div>
								<div class="glyphicon glyphicon-star"></div>
								<div class="glyphicon glyphicon-star"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 ">
					<div class="txthover">
						<img src="img/car2.jpg" alt="car2">
						<div class="txtcontent">
							<div class="stars">
								<div class="glyphicon glyphicon-star"></div>
								<div class="glyphicon glyphicon-star"></div>
								<div class="glyphicon glyphicon-star"></div>
							</div>
							<div class="simpletxt">
								<h3 class="name">Renault</h3>
								<p>"Lorem ipsum dolor sit amet, consectetur,<br>
									sed do eiusmod tempor incididunt" </p>
								<h4 class="price">900 &euro;</h4>
								<button>READ MORE</button><br>
								<div class="wishtxt">
									<p class="paragraph1"> Add to Wishlist <span class="glyphicon glyphicon-heart"></span> </p>
									<p class="paragraph2">Compare <span class="icon"><img src="img/compicon.png" alt="compicon"></span></p>
								</div>
							</div>
							<div class="stars2">
								<div class="glyphicon glyphicon-star"></div>
								<div class="glyphicon glyphicon-star"></div>
								<div class="glyphicon glyphicon-star"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
					<div class="txthover">
						<img src="img/car3.jpg" alt="car3">
						<div class="txtcontent">
							<div class="stars">
								<div class="glyphicon glyphicon-star"></div>
								<div class="glyphicon glyphicon-star"></div>
								<div class="glyphicon glyphicon-star"></div>
							</div>
							<div class="simpletxt">
								<h3 class="name">Ford Mustang</h3>
								<p>"Lorem ipsum dolor sit amet, consectetur,<br>
									sed do eiusmod tempor incididunt" </p>
								<h4 class="price">3000 &euro;</h4>
								<button>READ MORE</button><br>
								<div class="wishtxt">
									<p class="paragraph1"> Add to Wishlist <span class="glyphicon glyphicon-heart"></span> </p>
									<p class="paragraph2">Compare <span class="icon"><img src="img/compicon.png" alt="compicon"></span></p>
								</div>
							</div>
							<div class="stars2">
								<div class="glyphicon glyphicon-star"></div>
								<div class="glyphicon glyphicon-star"></div>
								<div class="glyphicon glyphicon-star"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
					<div class="txthover">
						<img src="img/car4.jpg" alt="car4">
						<div class="txtcontent">
							<div class="stars">
								<div class="glyphicon glyphicon-star"></div>
								<div class="glyphicon glyphicon-star"></div>
								<div class="glyphicon glyphicon-star"></div>
							</div>
							<div class="simpletxt">
								<h3 class="name">Rover</h3>
								<p>"Lorem ipsum dolor sit amet, consectetur,<br>
									sed do eiusmod tempor incididunt" </p>
								<h4 class="price">1000 &euro;</h4>
								<button>READ MORE</button><br>
								<div class="wishtxt">
									<p class="paragraph1"> Add to Wishlist <span class="glyphicon glyphicon-heart"></span> </p>
									<p class="paragraph2">Compare <span class="icon"><img src="img/compicon.png" alt="compicon"></span></p>
								</div>
							</div>
							<div class="stars2">
								<div class="glyphicon glyphicon-star"></div>
								<div class="glyphicon glyphicon-star"></div>
								<div class="glyphicon glyphicon-star"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
					<div class="txthover">
						<img src="img/car5.jpg" alt="car5">
						<div class="txtcontent">
							<div class="stars">
								<div class="glyphicon glyphicon-star"></div>
								<div class="glyphicon glyphicon-star"></div>
								<div class="glyphicon glyphicon-star"></div>
							</div>
							<div class="simpletxt">
								<h3 class="name">Porche</h3>
								<p>"Lorem ipsum dolor sit amet, consectetur,<br>
									sed do eiusmod tempor incididunt" </p>
								<h4 class="price">1200 &euro;</h4>
								<button>READ MORE</button><br>
								<div class="wishtxt">
									<p class="paragraph1"> Add to Wishlist <span class="glyphicon glyphicon-heart"></span> </p>
									<p class="paragraph2">Compare <span class="icon"><img src="img/compicon.png" alt="compicon"></span></p>
								</div>
							</div>
							<div class="stars2">
								<div class="glyphicon glyphicon-star"></div>
								<div class="glyphicon glyphicon-star"></div>
								<div class="glyphicon glyphicon-star"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
					<div class="txthover">
						<img src="img/car6.jpg" alt="car6">
						<div class="txtcontent">
							<div class="stars">
								<div class="glyphicon glyphicon-star"></div>
								<div class="glyphicon glyphicon-star"></div>
								<div class="glyphicon glyphicon-star"></div>
							</div>
							<div class="simpletxt">
								<h3 class="name">Porche 911</h3>
								<p>"Lorem ipsum dolor sit amet, consectetur,<br>
									sed do eiusmod tempor incididunt" </p>
								<h4 class="price">4000 &euro;</h4>
								<button>READ MORE</button><br>
								<div class="wishtxt">
									<p class="paragraph1"> Add to Wishlist <span class="glyphicon glyphicon-heart"></span> </p>
									<p class="paragraph2">Compare <span class="icon"><img src="img/compicon.png" alt="compicon"></span></p>
								</div>
							</div>
							<div class="stars2">
								<div class="glyphicon glyphicon-star"></div>
								<div class="glyphicon glyphicon-star"></div>
								<div class="glyphicon glyphicon-star"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
					<div class="txthover">
						<img src="img/car7.jpg" alt="car7">
						<div class="txtcontent">
							<div class="stars">
								<div class="glyphicon glyphicon-star"></div>
								<div class="glyphicon glyphicon-star"></div>
								<div class="glyphicon glyphicon-star"></div>
							</div>
							<div class="simpletxt">
								<h3 class="name">Chevrolet SS</h3>
								<p>"Lorem ipsum dolor sit amet, consectetur,<br>
									sed do eiusmod tempor incididunt" </p>
								<h4 class="price">3000 &euro;</h4>
								<button>READ MORE</button><br>
								<div class="wishtxt">
									<p class="paragraph1"> Add to Wishlist <span class="glyphicon glyphicon-heart"></span> </p>
									<p class="paragraph2">Compare <span class="icon"><img src="img/compicon.png" alt="compicon"></span></p>
								</div>
							</div>
							<div class="stars2">
								<div class="glyphicon glyphicon-star"></div>
								<div class="glyphicon glyphicon-star"></div>
								<div class="glyphicon glyphicon-star"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
					<div class="txthover">
						<img src="img/car8.jpg" alt="car8">
						<div class="txtcontent">
							<div class="stars">
								<div class="glyphicon glyphicon-star"></div>
								<div class="glyphicon glyphicon-star"></div>
								<div class="glyphicon glyphicon-star"></div>
							</div>
							<div class="simpletxt">
								<h3 class="name">Meclaren</h3>
								<p>"Lorem ipsum dolor sit amet, consectetur,<br>
									sed do eiusmod tempor incididunt" </p>
								<h4 class="price">2500 &euro;</h4>
								<button>READ MORE</button><br>
								<div class="wishtxt">
									<p class="paragraph1"> Add to Wishlist <span class="glyphicon glyphicon-heart"></span> </p>
									<p class="paragraph2">Compare <span class="icon"><img src="img/compicon.png" alt="compicon"></span></p>
								</div>
							</div>
							<div class="stars2">
								<div class="glyphicon glyphicon-star"></div>
								<div class="glyphicon glyphicon-star"></div>
								<div class="glyphicon glyphicon-star"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- _______________________________News Letter ____________________-->
		<div class="newslettercontent">
			<div class="leftside">
				<img src="img/border.png" alt="border">
				<h1>NEWSLETTER</h1>
				<p>Subscribe to the COLLECTIONCARS mailing list to <br>
					receive updates on new arrivals, special offers <br>
					and other discount information.</p>
			</div>
			<div class="rightside">
				<img class="newsimage" src="img/newsletter.jpg" alt="newsletter">
				<input type="text" class="form-control" id="subemail" placeholder="EMAIL">
				<button>SUBSCRIBE</button>
			</div>
		</div>
		<!-- ______________________________________________________Bottom Menu ______________________________-->
		<div class="bottommenu">
			<div class="bottomlogo">
				<span class="dotlogo">&bullet;</span><img src="img/collectionlogo1.png" alt="logo1"><span class="dotlogo">&bullet;;</span>
			</div>
			<ul class="nav nav-tabs bottomlinks">
				<li role="presentation"><a href="#/" role="button">ABOUT US</a></li>
				<li role="presentation"><a href="#/">CATEGORIES</a></li>
				<li role="presentation"><a href="#/">PREORDERS</a></li>
				<li role="presentation"><a href="#/">CONTACT US</a></li>
				<li role="presentation"><a href="#/">RECEIVE OUR NEWSLETTER</a></li>
			</ul>
			<p>"Designed by Semiati" </p>
			<img src="img/line.png" alt="line"> <br>
			<div class="bottomsocial">
				<a href="#"><i class="fa fa-facebook"></i></a>
				<a href="#"><i class="fa fa-twitter"></i></a>
				<a href="#"><i class="fa fa-google-plus"></i></a>
				<a href="#"><i class="fa fa-pinterest"></i></a>
			</div>
			<div class="footer">
				<div class="copyright">
					&copy; Copy right 2022 | <a href="#">Privacy </a>| <a href="#">Policy</a>
				</div>
				<div class="atisda">
					Instagram <a href="https://www.instagram.com/emiii13._/">emiii13</a>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="source/bootstrap-3.3.6-dist/js/jquery.js"></script>
	<script type="text/javascript" src="source/js/isotope.js"></script>
	<script type="text/javascript" src="source/js/myscript.js"></script>
	<script type="text/javascript" src="source/bootstrap-3.3.6-dist/js/jquery.1.11.js"></script>
	<script type="text/javascript" src="source/bootstrap-3.3.6-dist/js/bootstrap.js"></script>
</body>

</html>