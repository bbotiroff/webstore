<div class="col-2 mt-3">

	<div class="card border mb-3" style="max-width: 18rem;">
  		<div class="card-header text-center text-secondary">POPULAR PRODUCTS</div>

	<!--
		*
		*	This is template for listing products on required pages
		*
		*	It will take an Associative array named popularProducts from Controller
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


	<?php if(is_array($popularProducts)){

		foreach ($popularProducts as $product) {?>
			<div class="text-center border mb-4" style="width: 100%;">
			  <img class="card-img-top"  src=<?php echo  '"data:image/jpeg;base64,' . $product['image'] . '" alt=" ' . $product['title'] .  ' "'; ?> style="max-height: 30%;" >
			  <div class="card-body">
			    <p class="card-text text-left">
			    	<?php echo substr($product['description'], 0, 40) . ".."; ?>
			    </p>
			    <a href= <?php echo BASE_PATH . '/Productpage/index/id/' . $product['uid']; ?> class="btn btn-primary">
			    	Read more..
			    </a>
			  </div>
			</div>

<?php 
			} //Closing of foreach

		} // Closing IF statement


?>



	</div>
</div>

















