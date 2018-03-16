<?php 

//Merchant Total
$merchantTotal = NULL;

//create shipping variable
$shipping = NULL;

//create tax variable
$tax = NULL;


//Create grand total variable
$grandTotal = NULL;


//Button disabled class
$btnClass = "btn btn-secondary btn-lg btn-block disabled";

//Button link to checkout page
$btnLink = '"#"';

//if user has chosen data needed.
if(is_array($products)){

$shipping = "FREE!";
$tax = "%10";

//	Calculate grand total of the cart
	foreach ($products as $product) {
		$merchantTotal += $product['totalCost'];		
	}

	$grandTotal = $merchantTotal + ($merchantTotal*0.1);


	$merchantTotal = "$" . $merchantTotal;
	$grandTotal = "$". $grandTotal;
	$btnClass = "btn btn-secondary btn-lg btn-block";
}


 ?>

<div class="col-12 p-6">


	<!-- ROW WITH GENERATED INFORMATION  -->
	<div class="row my-4 justify-content-end">
		<!-- MIDDLE SECTION  -->
		<div class="col-9">


			<!-- HEADER OF THE CART ITEM INFORMATION  -->
			<div class="row">
				<div class="col-12">
					<div class="border rounded border-muted ">
						<p class="h6 text-muted p-3 border border-bottom border-muted  bg-light ">Shopping Cart</p>


						<div class="p-4">
						<?php if(is_array($products)){
								foreach ($products as $key => $product ) {
						?>

								<div class="row p-3">

									<div class="col-2">
										<img src=<?php echo  '"data:image/jpeg;base64,' . $product['image'] . '"'; ?> width="100%"/>
									</div>

									<div class="col-4">
											<a href= <?php echo BASE_PATH . '/Productpage/index/id/' . $product['uid']; ?> >
												<?php echo $product['title']; ?>
											</a>
											<p style="font-size:0.8em; margin:0; padding:0;">Author: 
												<span class="text-muted">
													<?php echo $product['author']; ?> 
												</span>
											</p>
											<p style="font-size:0.8em; margin:0; padding:0;">Publisher: 
												<span class="text-muted">
													<?php echo $product['publisher']; ?> 
												</span>
											</p>
								
											<div class="mt-3 h6">
												<small>
													<a href=<?php echo BASE_PATH . "/Cart/addToCart/id/" . $product['uid'] . "/qty/1";  ?>> Add One More</a>
													<span>&nbsp;|&nbsp;</span>
													<a href=<?php echo BASE_PATH . "/Cart/removeFromCart/key/" . $key ;  ?>>Remove</a>
												</small>
											</div>
									</div>
									<div class="col-5">
										<p  class="text-muted" style="font-size:0.8em; margin:0; padding:0;">Item Price: 
											<span>
												$<?php echo $product['price'] . " x " . $product['qty']; ?>  
											</span>
										</p>
										<div class="border-bottom my-2" style="width: 98%;"></div>
										<h5 class="text-dark">
											<small>Total:</small>&nbsp;
											$<?php echo $product['totalCost'] ?>
										</h5>
									</div>
								</div>

								<div class="border-bottom mx-auto" style="width: 98%;"></div>

							<?php } 
							}else{

								echo $products;

							}
							?>



						</div>


					</div>
				</div>
			</div>
		</div>

		<!-- CHRCKOUT COLUMN WITH TOTAL COST INFORMATION  -->
		<div class="col-3">
			<div class="row">
				<div class="col-10">
					<div class="border rounded border-muted">
						<p class="h6 text-muted p-3 border border-bottom border-muted text-center  bg-light ">Shopping Cart Total</p>
						<div class="p-3 row">
							<div class="col-7">
								<p  class="text-muted" style="font-size:1em;">Merchandise Total:</p>
								<p  class="text-muted" style="font-size:1em;">Shipping:</p>
								<p  class="text-muted" style="font-size:1em;">†Sales Tax:</p>
								<h4>TOTAL: </h4>
							</div>
							
							<div class="col-5 text-right">
								<p  class="text-muted" style="font-size:1em;"><?php echo $merchantTotal;?></p>
								<p  class="text-muted" style="font-size:1em;"><?php echo $shipping;?></p>
								<p  class="text-muted" style="font-size:1em;"><?php echo $tax;?></p>
								<h4><?php echo $grandTotal;?></h4>
							</div>

						</div>

					</div>
				</div>
			</div>

			<div class="row my-4">
				<span class="col-10">
					<?php 
						echo '<a href="' . $btnLink . '" class="' . $btnClass . '" >Continue Checkout</a>'; 
					?>
				</span>
			</div>
		</div>

	</div>

</div>