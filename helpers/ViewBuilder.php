<?php
/********************************************************************

		HELPS TO BUILD PAGE DEFAULTED VIEWS SUCH AS 
		Categories, Popular products, and Homepage carousel data

********************************************************************/


class ViewBuilder{

	private $items = [];
	private $file = APP_PATH . "/views/files/popularItems.csv";
	public $categories = [];

	public function __construct(){

		// if it is "Sunday 3 o'clock" OR "Thursday 3 o'clock" 
		if(date("l G") == "Sunday 3" || date("l G") == "Thursday 3"){
			// set 5 random chosen item id's into popularItems.csv 
			$this->sortPopularProduct();
		}

	}

	// Function for writing to the text file all five popular items
	private function sortPopularProduct(){
		#	- require_once Data selection file from model
		require_once(APP_PATH . "/models/Selections.php");
		
		#	- instanciate Selecttion class
		$db = new SelectionDB;
		//  get all the unique number off db 
		$items = $db->selectProductsId();
		

		for($i=0; $i<5; $i++){		
			//  get random numbers
			$randomItem = rand(0,(count($items) - 1));
			
			// Convert item into string
			$item =  implode($items[$randomItem]);

			// push it into $this->itmes property 
			array_push($this->items, $item);
			
			//remove item from an array
			array_splice($items, $randomItem, 1);
		}

		// convert items array to string
		$string = implode(",", $this->items);
		
		// open text file in views folder
		$file = fopen($this->file, "w");

		
		// write all the items into text file separating by comma 
		fwrite($file, $string);

		// Close the file
		fclose($file);


	}
	

	// function for retriving popular items from database  and send to index page
	public function getPopularProducts(){
		//open popular items file
		$file = fopen($this->file, "r");
		
		// assign it into $items variable
		$string = fgets($file);

		// item id's into items property
		$this->items = explode(",", $string);

		// Close the file
		fclose($file);


		// Instanciate model selection class
		$select = new SelectionDB;

		// Query 5 products from database
		return $select->selectProduct($this->items);


	}

	// gets all the categories data from database and removes duplicates and sends to router
	public function getCategories() {
		$db = new SelectionDB;

		$categories = $db->getCategories();

		# Get each value, convert to string and push it into categories property
		for($i=0; $i<count($categories); $i++) {
			// convert to string
			$category = implode($categories[$i]);
			
			// push into categories property
			array_push($this->categories, $category);
		}

		// Removing duplicate values from an array
		$result = array_unique($this->categories);

		return $result;
	}


}





























