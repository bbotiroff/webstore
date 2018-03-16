<?php 

class Home extends Controller{
	
//	Default action with defaulted method for home page
	public function index($parameters = []){
		
		$db = new SelectionDB;
		
		$products = $db->selectAll();

		$this->contentPath  = '/contents/home';

		$this->viewConfig['title'] = 'HOME';

		$this->viewConfig['products'] = $products; 

		return $this->get();
	}
}

