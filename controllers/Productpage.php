<?php 
class Productpage extends Controller{

	public function Index($parameters = []){

	#	If parameter is NOT passed - Send user to home page
		if(empty($parameters) || !is_numeric($parameters['id']))
		{

			$url = BASE_PATH . "/";

				# redirect client to specific product page
					header("Location: $url");
		
		}
		else
		{


		#	- Assign parameters into variable
				$productID = $parameters['id'];
		
		#	- instanciate Selecttion class
				$db = new SelectionDB;
		
		#	- Call SELECT product with the parameter ID and list it in $product variable
		#	- you will receive fetched ASSOC ARRAY of data about product
				list($product) = $db->selectProduct([$productID]);
	
		#	- Assign content path to content/Productpage.php
				$this->contentPath = '/contents/Productpage';
		
		#	- Set View parameters such as title and all the array of data as arguments['product'] = [Array of data about product]
				$this->viewConfig = [	'title' => "Product page",
										'product' => $product
									];

				return $this->get();


		}


	}



}

