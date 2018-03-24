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
		
		if(isset($_SESSION['items'])){

			$products = $this->calculateCartGetProducts();

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
	

		if(isset($_SESSION['userID'])) {


			$products = $this->calculateCartGetProducts();
		
			$this->contentPath = '/contents/checkoutPage';
			
			$this->viewConfig = [
									'title' => 'Checkout',
									'products' => $products

								];


		}else{


			// Set error 
			$errors['AuthError'] = 'In order to checkout, you have to LogIn';

		//	If There is an error from Model, Send the error message and have client try again.
			$this->contentPath = '/contents/login';
			
			$this->viewConfig = ['title' => 'Auth Error',  'errors'=>$errors];

		}

		return $this->get();
	}



	public function paymentProcess(){

		$cardNumber = htmlentities($_POST['cardNumber']);
		$expirationDate = htmlentities($_POST['expirationDate']);

		// require credit company file
		require_once(APP_PATH . "/helpers/curl.php");

		// process payment 
		$result = proccesPayment($cardNumber, $expirationDate);

		//get all products
		$products = $this->calculateCartGetProducts();

		if($result == "APPROVED"){
			$this->contentPath = '/contents/invoicePage';
			$this->viewConfig = [
									'title' => 'Receipt',
									'products' => $products
								];
		}else{
		
			$this->contentPath = '/contents/checkoutPage';
			
			$this->viewConfig = [
									'title' => 'Error Data',
									'products' => $products,
									'Error' => 'Something went wrong check your payment information.'
								];
		}

		return $this->get();

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




	/*
		Calculate cart and return $product array with item data in it
	*/
		public function calculateCartGetProducts(){

			$productsID = [];


			 foreach ($_SESSION['items'] as $item) {
				# Push all cart item id's into productsID array
				array_push($productsID, $item->id);
			}


			$db = new SelectionDB;

			$products = $db->selectProduct($productsID);

			for($i=0; $i<count($products); $i++) {
					
					foreach ($_SESSION['items'] as $item) {
						if($products[$i]['uid'] == $item->id){
							$itemQty = $item->qty;
						}
					}

				$totalCost = $products[$i]['price'] * $itemQty;
				$products[$i]['qty'] = $itemQty;
				$products[$i]['totalCost'] = $totalCost;
			}

			return $products;
		}
}



