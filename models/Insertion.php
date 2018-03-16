<?php 

class DataInsertion extends DBconnection{

	private $db;


	public function insertBook($book){

		$db = $this->connect();

		extract($book);


		try{
			$book_data = $db -> prepare('INSERT INTO books_data (isbn, title, author, description, publisher, genre, pages, year, price) VALUES (?,?,?,?,?,?,?,?,?)');
			$book_data->execute(array($isbn, $title, $author, $description, $publisher, $genre, $pages, $year, $price));
			
			$lastID = $db->lastInsertId();

			$book_image = $db -> prepare('INSERT INTO books_image (uid, image) VALUES (?,?)');
			$book_image->execute(array($lastID, $image));	
			

			return $lastID; 

		}catch(PDOException $e){
			$msg = "Something went wrong: " . $e->getMessage();
		
			return $msg;
		}	


	}

	public function signup($user){

		$db = $this->connect();

		extract($user);


		try{

			$stmt = $db -> prepare('INSERT INTO user (firstname, lastname, email, password) VALUES (?,?,?,?)');
			$stmt->execute(array($firstname, $lastname, $email, $password));
			
			$lastID = $db->lastInsertId();

			return $lastID; 

		}catch(PDOException $e){
			$msg = "Something went wrong: " . $e->getMessage();
		
			return $msg;
		}	


	}
}


