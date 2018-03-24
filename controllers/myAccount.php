<?php 

class myAccount extends Controller{
	
	public function index($param=array()){

		if(isset($_SESSION['userID'])){
			
			// Get user id
			$userId = $_SESSION['userID'];


			// Instanciate selection class from model
			$select = new SelectionDB;

			// select user data from database by passing userId, address, and payment
			$userData = $select -> userData(['userId'=>$userId]);
			$mainInfo = $userData['mainInfo'];

			// if address passed through parameters
			// if($param['address']){}		
					// call $this->addresses function with the all addresses and infos 


				// if payment method passed 
					// select all credit/debit card information and insert into 


				//Select all user data and user's image
				// assign it in to $user variable
				// assign it in to viewConfig and send it to view



				$this->contentPath = "/contents/userAccount";
				$this->viewConfig = [
										'title' => $mainInfo['firstname'] . "'s Account",
										'userMainInfo' => $mainInfo

									];

		}else{

			if(!isset($param['view'])){
				$param['view'] = "";
			}

			// myAccount/view/logIn passes view="logIn" parametr give logIn view
			if($param["view"] == "signup"){
				$this->contentPath = "/contents/signup";
				$this->viewConfig = ['title' => 'Create an account'];
			}else{
				$this->contentPath = "/contents/login";
				$this->viewConfig = ['title' => 'Log In'];
			}

		}
			


		return $this->get();

	}

	// public function addAddress(address){}

	// public function addPaymentMethod(card){	}


	public function signup(){
	// validate $_POST data
	 	//	instanciate the validator class
			$validator = new Validator;

		//	validate the $_POST values
			list($errors, $inputs) = $validator->signup();

	// IF there is any errors
		if($errors){

			//	assign '/contents/insertBook' to $contentPath 
				$this->contentPath = '/contents/signup';
			
			//	Create $viewConfig array with error details
				$this->viewConfig['title'] = "Error";

				$this->viewConfig['errors'] =  $errors;	
		}else{

			// require dataInsertion.php
				require_once(APP_PATH . '/models/Insertion.php');

			// Instanciate dataInsertion class
				$insertData = new DataInsertion; 

			// Call insertData function from model with VALIDATED INPUTS  and assign it into $status variable 
				$lastUID = $insertData->signup($inputs);

				
				//	Check Last inserted product id
				if($lastUID){
						
				#	Create an URL with new user ID and riderect user to their page.
					// $url = BASE_PATH . "/userpage/index/id/" . $lastUID;


					$url = BASE_PATH . "/";


				# redirect client to specific product page
					header("Location: " . $url);
					// echo "<script>window.location = \" $url \"</script>";
			

				}else{

				//	If There is an error from Model, Send the error message and have client try again.
					$this->contentPath = '/contents/signup';
					
					$this->viewConfig = ['title' => 'ERROR',  'dbMessage'=>$lastUID];
				}

			}

			return $this->get();		
	}


	public function login(){
	// validate $_POST data
	 	//	instanciate the validator class
			$validator = new Validator;

		//	validate the $_POST values
			list($errors, $inputs) = $validator->login();

			if($errors){
				//	If There is an error from Model, Send the error message and have client try again.
					$this->contentPath = '/contents/login';
					
					$this->viewConfig = ['title' => 'Auth Error',  'errors'=>$errors];

			}else{


			// require dataInsertion.php
				require_once(APP_PATH . '/models/Selections.php');

			// Instanciate dataInsertion class
				$select = new SelectionDB; 

			// Call insertData function from model with VALIDATED INPUTS  and assign it into $status variable 
				$userId = $select->auth($inputs);
					/*
					if email and password correct: 
							I. store user id to session variable
							II. redirect user to webstore/myAccount 
					else 
							I. assign content path to login page
							II. assign viewConfig: title error, authError = "E-mail or password incorrect"
							III. call this->get();
					*/

				if($userId){

					$_SESSION['userID'] = $userId;
					$url = BASE_PATH . "/myAccount";
					header("Location: $url");
				
				}else{

					$errors['AuthError'] = "E-mail or password is incorrect";

				//	If There is an error from Model, Send the error message and have client try again.
					$this->contentPath = '/contents/login';
					
					$this->viewConfig = ['title' => 'Auth Error',  'errors'=>$errors];
				}



			}


			return $this->get();

	}



	public function logout() {
			 unset($_SESSION['userID']);
		$url = BASE_PATH . "/myAccount";
		header("Location: $url");
	}

}

