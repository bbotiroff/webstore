<?php 

//	Total items on cart.
	$totalQTY="";
	$getTotalQty = 0;

//	Check if items in the cart
	if(isset($_SESSION['items'])){
	//	get total items in the cart
		for($i=0; $i<count($_SESSION['items']); $i++){
			$itemQty = $_SESSION['items'][$i]->qty;

			$getTotalQty += $itemQty;
		}
		
		$totalQTY="($getTotalQty)";

	}

 ?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


	<link rel="shortcut icon" type="image/png" href=<?php echo '"' . BASE_PATH . '/views/images/Cart.png"';?>/>

    <!-- Bootstrap CSS --> 
	<link rel="stylesheet" href=<?php echo '"' . BASE_PATH . '/views/css/bootstrap.css"';?>>

	<link rel="stylesheet" href=<?php echo '"' . BASE_PATH . '/views/css/carousel.css"';?>>
	
	<link rel="stylesheet" href=<?php echo '"' . BASE_PATH . '/views/css/main.css"';?>>
	
	<link rel="stylesheet" href=<?php echo '"' . BASE_PATH . '/views/css/styles.css"';?>>


	<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">



    <title><?php echo $title; ?> | WEB STORE BY BAKHROM BOTIROV</title>
  </head>
  <body>
  	<div>

			<div class="navbar navbar-expand-lg navbar-light bg-light">
				<a href=<?php echo BASE_PATH; ?> class="navbar-brand">
					<img src=<?php echo '"' . BASE_PATH . '/views/images/Cart.png"';?> height="50" class="d-inline-block align-top" alt="">
					<span style="font-size:28pt;">WEB-STORE</span>
				</a>

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="row collapse navbar-collapse ml-3" id="navbarTogglerDemo02">
					<form class="col-lg-8 input-group form-inline my-2 my-lg-0" action=<?php print BASE_PATH . '/Search/index/' ?> method="GET">
						<?php include "categories.php"; ?>
						<input type="text" class="form-control"  placeholder="search" name="searchString">
						<div class="input-group-append">
						<button type="submit"  class="btn btn-info"  value="search">
							<i class="fas fa-search"></i>
						</button>
						</div>
					</form>
					<div class="col-lg-4 navbar-nav mr-auto mt-2 mt-lg-0 px-2">
							<div class="col-lg-6 text-lg-right "><a href=<?php print BASE_PATH . '/myAccount/index' ?>>MY ACCOUNT</a> </div>
							<div class="d-none d-md-none d-lg-block col-lg-0 px-0 text-lg-center">|</div>
							<div class="col-lg-6 text-lg-left"> <a href=<?php print BASE_PATH . '/Cart/index' ?>>CART <?php echo $totalQTY; ?><!-- <i class="fas fa-shopping-cart fa-lg"></i> --></a> </div>
					</div>
				</div>
			</div>
			
	</div>





