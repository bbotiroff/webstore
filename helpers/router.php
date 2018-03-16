<?php 
	
class Router{

	protected $CONTROLLER = 'Home';
	protected $ACTION = "index";
	protected $PARAMETERS = [];

	public function __construct(){
	// Trim the first slash
		// $request_URL = ltrim($_SERVER['REQUEST_URI'], "/");
	//	Check if the url entered	
		if(isset($_GET['url'])){
		//  Parse the url

			$url = htmlspecialchars($_GET['url']);
			$parsedURL = explode('/', rtrim($url));
			$controller = $parsedURL[0];
			$method = (isset($parsedURL[1]))?$parsedURL[1]:NULL;

		 // Check if controller exists and assign into variable
			if(file_exists(APP_PATH . '/controllers/' . $controller . ".php")){
				$this->CONTROLLER = $controller;
			}else{
				$this->CONTROLLER = 'ErrorPage';
			}	

		// Check if method exists and assign into property
			$this->checkMethod($method);

		//	Check if parameters exists	
			if(isset($parsedURL[2])){
			//	Loop through each one and push into PARAMETERS array
				for($i=2; $i<count($parsedURL); $i=$i+2){
					$this->PARAMETERS[$parsedURL[$i]] = (isset($parsedURL[$i+1]))?$parsedURL[$i+1]:NULL;
				}

			}

		}
	}



//	Get array of data from controller and send it to view
	public function getData(){
		
		require_once(APP_PATH . '/controllers/' . $this->CONTROLLER . '.php' );

		$ControllerObj = new $this->CONTROLLER;

		$method = $this->ACTION;

		return $ControllerObj->$method($this->PARAMETERS);
	}




//	Check if parsed method exists and set it to the property 
	protected function checkMethod($method = NULL){

		require_once(APP_PATH . '/controllers/' . $this->CONTROLLER . '.php' );

		$object = new $this->CONTROLLER;

		if(method_exists($object, $method) || !is_null($method)){
			$this->ACTION = $method;
		}


	}
}
