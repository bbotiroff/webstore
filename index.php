<?php 

/********************************************************

	# Current file routes everythin

*********************************************************/ 

/*
	# initilize all the includes 
*/ 



require_once('__init.php');

session_start();

/*
	# Instanciating router, and parsing URL in router file
*/ 

	$Router = new Router();



	/*
		 This will call controller and return an array of data for building view template send: 
		 [
		 	"contentPath" => "URL for the Contens part of the page",
		 	"viewConfig" => ['key' = 'data'] --------> Always returns Associative array 
			"params" => []  -------------------> This stores all data comming from database 
		 ]

	*/
	$pageContents = $Router->getData();


// instanciate default page builder class for building popular items, categories and left-ad
	$ViewContents =  new ViewBuilder(); 




	
	// assign all product data into viewConfig['popularProducts'] 
	$pageContents['viewConfig']['popularProducts'] = $ViewContents->getPopularProducts();

	// Create categories 
	$pageContents['viewConfig']['Categories'] = $ViewContents->getCategories();




// Create view object
$View = new View;

// Build a view and render page contents
		$View->render('/template/header', $pageContents['viewConfig']);

		$View->render($pageContents['contentPath'], $pageContents['viewConfig']);

		$View->render('/template/footer', $pageContents['viewConfig']);



/*********************************************************
	
						OLD PROCESS 					

*************************************************************/


// // Build a view and render page contents
// if (
// 	$pageContents['contentPath'] === '/contents/Productpage' || 
// 	$pageContents['contentPath'] === '/contents/Cart' 		 ||
// 	$pageContents['contentPath'] === '/contents/signup'	 	 ||
// 	$pageContents['contentPath'] === '/contents/login'		 	

// 	 ) {

// 		$View->render('/template/header', $pageContents['viewConfig']);

// 		$View->render($pageContents['contentPath'], $pageContents['viewConfig']);

// 		$View->render('/template/footer', $pageContents['viewConfig']);
	
// }else{

// 		$View->render('/template/header', $pageContents['viewConfig']);
		
// 		$View->render($pageContents['contentPath'], $pageContents['viewConfig']);

// 		//$View->render('/template/left-ad', $pageContents['viewConfig']);

// 		$View->render('/template/footer', $pageContents['viewConfig']);
// }
