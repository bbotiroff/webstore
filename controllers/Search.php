<?php 

class Search extends Controller{

	public function index(){

		if(isset($_GET['searchString'])){
			$searchString = htmlspecialchars(trim($_GET['searchString']));

			$db = new SelectionDB;
			
			$products = $db->search($searchString);

			$this->contentPath = '/contents/Search';
			$this->viewConfig['title'] = "Search results";
			$this->viewConfig['products'] = $products;

			return $this->get();

		}

	}


	/*
		# Sort by category: takes one parameter from Router. Parameter name is "categoryName"
	*/
	public function category($params = []) {
		$category = $params['categoryName'];

		$db = new SelectionDB;

		$sortResult = $db->search($category);

		$this->contentPath = '/contents/Search';
		$this->viewConfig = [
			'title' => $category,
			'products' => $sortResult
		];

		return $this->get();
	}





}


