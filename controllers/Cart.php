<?php 

	/*
	Cart class will be:
		PROPERTIES: 
			- ITEMS = []
		METHODS: 
			- index().  ------->>>>> It is going to be preview of the cart by default
 			- addToCart() ---->>> it will create a SESSION['item']
			- removeFromCart()  -----> It will unset session by session key that requested sessionKey will be comming from View
			- updateQty()	

		

	*/

class Cart extends Controller{
	private $items = [];

	public function index(){
		
		$productsID = [];

		
		if(isset($_SESSION['items'])){

			 foreach ($_SESSION['items'] as $item) {
				# Push all cart item id's into productsID array
				array_push($productsID, $item->id);
			}


			$db = new SelectionDB;

			$products = $db->selectProduct($productsID);

			for($i=0; $i<count($products); $i++) {
				// if($products[$i]['uid'] == $_SESSION['items'][$i]->id){
				// 	$itemQty = $_SESSION['items'][$i]->qty;
				// }else{
					foreach ($_SESSION['items'] as $item) {
						if($products[$i]['uid'] == $item->id){
							$itemQty = $item->qty;
						}
					}
				// }
				$totalCost = $products[$i]['price'] * $itemQty;
				$products[$i]['qty'] = $itemQty;
				$products[$i]['totalCost'] = $totalCost;
			}
		}else{
			$products = "Cart is empty";
		}




		$this->contentPath = '/contents/Cart';
		$this->viewConfig = [	'title' => "Cart preview", 
								'products' => $products 
							];

		return $this->get();



	}


	public function addToCart($params){

		$backToURL = $_SERVER['HTTP_REFERER'];

		$productID = htmlspecialchars($params['id']);
		$productQTY = htmlspecialchars($params['qty']);

		// Check if the $productID exists in database, 

		$item = new Item($productID, $productQTY); //Instanciate the item object 
		if(!isset($_SESSION['items'])){
			$_SESSION['items'] = [];
		}
		

		//Check if the product with passed id already exists in Cart
		$key = $this->isInItemCart($productID, "id", $_SESSION['items']);

		if(is_numeric($key)){
			$_SESSION['items'][$key]->qty += $productQTY; 
		}else{
			array_push($_SESSION['items'], $item);
		}

		header("Location: " . $backToURL);

	}

	public function removeFromCart($key){
		// session_start();

		$backToURL = $_SERVER['HTTP_REFERER'];

		$key = $key['key'];

		 unset($_SESSION['items'][$key]);


		 if(count($_SESSION['items']) === 0){
			// If array does not have any items in it remove items array from sessions 
		 	 unset($_SESSION['items']);
		 }else{
		 	// if there is an item reset indexes of an array
		 	$_SESSION['items'] = array_values($_SESSION['items']);
		 }


		header("Location: " . $backToURL);
	}



	public function changeQty($productKey, $newQty){

		$_SESSION[$productKey]['qty'] = $newQty;

	}


	public function gotoCheckout(){
		//This will be implemented soon.. 
	}


	//Check if the passed id exists in the session
	public function isInItemCart($productId, $id, $cartArray){
		for($i=0; $i<count($cartArray); $i++) {
			if($cartArray[$i]->$id == $productId){
				return $i;
			}
		}

		return false;
	}




}



