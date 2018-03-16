<?php 
class InsertBook extends Controller{


	public function index($parameters = []){

		$this->contentPath = '/contents/insertBook';

		$this->viewConfig['title'] = 'INSERT NEW BOOK';

		return $this->get();
	}


	public function ADD(){

	// validate $_POST data
	 	//	instanciate the validator class
			$validator = new Validator;

		//	validate the $_POST values
			list($errors, $inputs) = $validator->aBook();

	// IF there is any errors
		if($errors){

			//	assign '/contents/insertBook' to $contentPath 
				$this->contentPath = '/contents/insertBook';
			
			//	Create $viewConfig array with error details
				$this->viewConfig['title'] = "Error";

				$this->viewConfig['errors'] =  $errors;	
		}else{

			// Instanciate dataInsertion class
				$insertData = new DataInsertion; 

			// Call insertData function from model with VALIDATED INPUTS  and assign it into $status variable 
				$lastUID = $insertData->insertBook($inputs);

				
				//	Check Last inserted product id
				if($lastUID){
						
				#	Create an URL with product ID
					$url = BASE_PATH . "/Productpage/index/id/" . $lastUID;



				# redirect client to specific product page
					header("Location: " . $url);
					// echo "<script>window.location = \" $url \"</script>";

			

				}else{

				//	If There is an error from Model, Send the error message and have client try again.
					$this->contentPath = '/contents/insertBook';
					
					$this->viewConfig = ['title' => 'ERROR',  'dbMessage'=>$lastUID];
				}

			}

			return $this->get();		

	}


}

