<?php 

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 *
 *	On this page all you need to make sure to return 2 values to the controller
 *
 *	$errors = ARRAY of errors or NULL
 *
 *	$inputs = ARRAY of inputs	
 *
 *
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */ 


class Validator extends FormHelpers{

	private $errors = [];
	private $inputs = [];

	

	public function aBook(){

		extract($_POST);

		if(!empty($isbn) && is_numeric($isbn)){
			$this->inputs['isbn'] = $this->cleanUpInteger($isbn);
		}else{
			$this->errors['isbn'] = 'Enter valid ISBN number';
		}

		if(!empty($title) && is_string($title)){
			$this->inputs['title'] = $this->cleanString($title);
		}else{
			$this->errors['title'] = 'Enter valid title';
		}

		if(!empty($author) && is_string($author)){
			$this->inputs['author'] = $this->cleanString($author);
		}else{
			$this->errors['author'] = "Enter valid author";
		}

		if(!empty($publisher) && is_string($publisher)){
			$this->inputs['publisher'] = $this->cleanString($publisher);
		}else{
			$this->errors['publisher'] = "Enter valid publisher";
		}

		if(!empty($genre) && is_string($genre)){
			$this->inputs['genre'] = $this->cleanString($genre);
		}else{
			$this->errors['genre'] = "Enter valid genre";
		}

		if(!empty($year) && is_numeric($year) && strlen($year)){
			$this->inputs['year'] = $this->cleanUpInteger($year);
		}else{
			$this->errors['year'] = "Enter valid year";
		}

		if(!empty($pages) && is_numeric($pages)){
			$this->inputs['pages'] = $this->cleanUpInteger($pages);
		}else{
			$this->errors['pages'] = "Enter valid page numbers";
		}

		if(!empty($price) && (is_float($price) || is_numeric($price))){
			$this->inputs['price'] = $this->cleanUpInteger($price);
		}else{
			$this->errors['price'] = "Enter valid price";
		}


		$this->inputs['description'] = $this->cleanString($description);

		# Get image..
		$image = $_FILES['image']['tmp_name'];

		$resizedImage = $this->resizeImg($_FILES['image'], 400);

		if($resizedImage){

			$this->inputs['image'] =base64_encode($resizedImage);
		}else{
			$this->errors['image'] = "Upload have to be one of the following format: .JPG, JPEG or .PNG ";
		}


		return [$this->errors, $this->inputs];
	}



	public 	function signup(){
		extract($_POST);

		if(!empty($firstname) && is_string($firstname)){
			$this->inputs['firstname'] = $this->cleanString($firstname);
		}else{
			$this->errors['firstname'] = 'Enter valid firstname';
		}

		if(!empty($lastname) && is_string($lastname)){
			$this->inputs['lastname'] = $this->cleanString($lastname);
		}else{
			$this->errors['lastname'] = 'Enter valid lastname';
		}

		if(!empty($email) && $this->isValidEmail($email)){
			$this->inputs['email'] = $this->cleanString($email);
		}else{
			$this->errors['email'] = 'Enter valid email address';
		}

		if(!empty($password)){
			$this->inputs['password'] = $this->cleanString($password);
		}else{
			$this->errors['password'] = 'Password can NOT be empty';
		}


		return [$this->errors, $this->inputs];
	}


	public function login(){
		extract($_POST);


		if(empty($password) || !$this->isValidEmail($email)) {
			
			$this->errors['AuthError'] = 'E-mail or password is incorrect';

		}else{
			
			$this->inputs['email'] = $this->cleanString($email);
			$this->inputs['password'] = $this->cleanString($password);
		}




		return [$this->errors, $this->inputs];
	}

}

		