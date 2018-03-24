<?php 
	
	/*
	#	get carousel.php path for home page
	*/
	$carouselPath = APP_PATH . "/views/template/carousel.php";

	include $carouselPath;
 ?>
<div class="w-75 m-auto">

	<!-- 
		* 
		*
		*	It is including template for products and building nice home page
		*
		*
	-->





<!--
	*
	*	This is template for listing products on required pages
	*
	*	It will take an Associative array named products from Controller
	*	and will loop through each items and build nit listing of an items, 
	*	see below an example of an array that acceptable for it: 
	*
	*	Example of an input: 
	*		$products => [
	*						[0] => [
	*							'uid' = 'uid that comming from DB',
	*							'image' = 'some image',
	*							'title' = 'title of the product',
	*							'price' = 'price of an product',
	*							'author' = 'Author of an product', 
	*							'publisher' = 'publisher of an product'
	*						],
	*						[1] => [
	*							'uid' = 'uid that comming from DB',
	*							'image' = 'some image',
	*							'title' = 'title of the product',
	*							'price' = 'price of an product',
	*							'author' = 'Author of an product', 
	*							'publisher' = 'publisher of an product'
	*						],
	*						[2] => [
	*							'uid' = 'uid that comming from DB',
	*							'image' = 'some image',
	*							'title' = 'title of the product',
	*							'price' = 'price of an product',
	*							'author' = 'Author of an product', 

	*							'publisher' = 'publisher of an product'
	*						]
	*					]	
	*
	*		So on..
	*
	*
 -->



<div class="row my-4">

<?php if(is_array($products)){

	foreach ($products as $product) {?>

        <div class="col-lg-6">
          <div class="card flex-md-row mb-4 h-md-250 boxShadow">
			
			<img class="card-img-right flex-auto d-none d-md-block" src=<?php echo '"data:image/jpeg;base64,' . $product['image'] . '"'; ?> height="300px"/>
		

		 	<div class="card-body d-flex flex-column align-items-start row ">
				<div class="col-10">
					<h5 class="mb-0">
						<a href=<?php echo BASE_PATH . '/Productpage/index/id/' . $product['uid']; ?> >
							<?php echo substr($product['title'], 0, 25); ?> 
						</a> 
					</h5>
					<p  class="mb-1 text-muted">By <?php echo $product['author']; ?></p>
					<p><span style="font-weight: 600;">Price: </span><span class="text-secondary">$ <?php echo $product['price']; ?> </span></p>
					<p><?php echo substr($product['description'], 0, 150) . ".."; ?></p>	
				</div>
				<div class="h4 col-md-2">
					<a href=<?php echo BASE_PATH . "/Cart/addToCart/id/" . $product['uid'] . "/qty/1";  ?>>	
						<i class="fas fa-cart-plus fa-s d-none d-md-block d-xl-block"></i>
						<span class="h6 d-block d-md-none d-xl-none alert alert-primary text-center" role="alert"><i class="fas fa-cart-plus fa-s mr-2"></i>ADD TO CART</span>
					</a>
				</div>
			</div>

          </div>
        </div>

<?php } ?>


	</div>


<?php
}else{

	echo $products;

}
?>

            
</div>