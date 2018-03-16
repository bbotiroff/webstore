<?php 
class SelectionDB extends DBconnection{
	public $rows = [];

	public function selectAll(){
		# Internally join two tables and return data 
		$queryString = 	"SELECT data.*, img.image FROM books_data AS data INNER JOIN books_image AS img ON data.uid = img.uid";

		$data = $this->SELECT($queryString);
		
		return $this->rows;
	}


	public function selectProduct($productID = NULL){

	//	Check if product id is NULL
		if(is_null($productID)){
			# Query all columns with all data from book_data and book_image tables
			# execute query string
			# push it all into $product variable
			# return $product
		}else{
		//	Create SQL placeholders for prepare statement, it will return "?" marks based on passed array argument
			$sqlPlaceholder = $this->createSqlPlaceholder($productID);
			# Internally join two tables and return data 
			$queryString = 	"SELECT data.*, img.image FROM books_data AS data INNER JOIN books_image AS img ON data.uid = img.uid WHERE data.uid IN ($sqlPlaceholder)";

			$data = $this->SELECT($queryString, $productID);
			
			return $this->rows;

		}

	}


	public function selectProductsId(){
		
		$queryString = "SELECT uid FROM books_data"; 

		$this->SELECT($queryString, NULL, true);

		return $this->rows;
	}

	public function search($string){


		//$exploded = preg_split("/[\s,]+/", $string);
		$queryString = "SELECT data.*, img.image FROM books_data AS data INNER JOIN books_image AS img ON data.uid = img.uid
			 		WHERE ( data.isbn LIKE '%" .$string.  "%' OR
                            data.title LIKE '%" .$string.  "%' OR
                            data.author LIKE '%" .$string.  "%' OR
                            data.description LIKE '%" .$string.  "%' OR
                            data.publisher LIKE '%" .$string.  "%' OR
                            data.genre LIKE '%" .$string.  "%')";
	
		$this->SELECT($queryString);

		return $this->rows;
	}



	public function auth($user){
		$email = $user['email'];
		$password = $user['password'];

		$queryString = "SELECT user_id, password FROM user WHERE email = '$email'";

		$this->SELECT($queryString);
		if($password == $this->rows[0]['password']){
			return $this->rows[0]['user_id'];
		}else{
			return false;
		}
	}


	public function getCategories() {

		$queryString = "SELECT genre FROM books_data";
		$this->SELECT($queryString, NULL, true);

		return $this->rows;

	}



	# Creates prlaceholders for an prepare statement
	public function createSqlPlaceholder($arr){
		$placeholder = [];
		foreach ($arr as $key) {
			array_push($placeholder, "?");
		}

		return $sqlPlaceholder = implode(",", $placeholder);
	}



	// Connect to database and runs select statement 
	public function SELECT($queryString, $executeArray=NULL, $numericFetch=false){
		

		$db = $this->connect();

	//	check if which statement passed,
		if(!is_null($executeArray)){
			$stmt= $db->prepare($queryString);
			$stmt->execute($executeArray);
		}else{
			$stmt=$db->query($queryString);
		}

	// if numeric Fetch passed NULL
		if(!$numericFetch){
			//	Fetch all the data and push them into an array
			while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
				array_push($this->rows, $row);
			}
		}else{
			while($row = $stmt->fetch(PDO::FETCH_NUM)){
				array_push($this->rows, $row);
			}
		}


	//	If no records returned from database send the message
		if($this->rows == []){
			$this->rows = "No record in database";
		}

	}

}
