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

// session_destroy();

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

			<div class="row navbar navbar-light bg-light">
				<div  class="col-3">
					<a href=<?php echo BASE_PATH; ?> class=" navbar-brand">
	    				<img src=<?php echo '"' . BASE_PATH . '/views/images/Cart.png"';?> height="50" class="d-inline-block align-top" alt="">
						<span style="font-size:28pt;">WEB-STORE</span>
					</a>
				</div>
				<form class="col-6 input-group" action=<?php print BASE_PATH . '/Search/index/' ?> method="GET">
					<?php include "categories.php"; ?>
					<input type="text" class="form-control"  placeholder="search" name="searchString">
					<div class="input-group-append">
					<button type="submit"  class="btn btn-info"  value="search">

						<i class="fas fa-search"></i>
					</button>
					</div>
				</form>

				<div class="col-2">
					<div class="float-right">
						<span><a href=<?php print BASE_PATH . '/myAccount/index' ?>>MY ACCOUNT</a> </span>
						<span>|</span>
						<span> <a href=<?php print BASE_PATH . '/Cart/index' ?>>CART <?php echo $totalQTY; ?><!-- <i class="fas fa-shopping-cart fa-lg"></i> --></a> </span>
					</div>
				</div>
			</div>





