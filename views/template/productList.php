

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


<?php if(is_array($products)){

	foreach ($products as $product) {?>

	<div class="row border my-2 p-3">

		<div class="col-lg-2">
			<img src=<?php echo  '"data:image/jpeg;base64,' . $product['image'] . '"'; ?> width="100%"/>
		</div>

		<div class="col-lg-10">
				<h3 class="border-bottom row">
					<a class="col-lg-10" href= <?php echo BASE_PATH . '/Productpage/index/id/' . $product['uid']; ?> >
						<?php echo $product['title']; ?> 
					</a> 
					<a href=<?php echo BASE_PATH . "/Cart/addToCart/id/" . $product['uid'] . "/qty/1";  ?> class="col-lg-2">	<i class="fas fa-cart-plus fa-m float-right"></i></a>
				</h3>
				<p><span style="font-weight: 600;">Price: </span><span class="text-secondary">$ <?php echo $product['price']; ?> </span></p>
				<p><span style="font-weight: 600;">Author: </span><span class="text-secondary"><?php echo $product['author']; ?> </span></p>
				<p><span style="font-weight: 600;">Publisher: </span><span class="text-secondary"><?php echo $product['publisher']; ?> </span></p>
		</div>

	</div>

<?php } 
}else{

	echo $products;

}
?>