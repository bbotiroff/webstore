
<?php 
	if(isset($dbMessage)){
		print $dbMessage;
	}

 ?>

<div class="col-9">

	<h1>Enter new book details</h1>

	<form action=<?php print BASE_PATH . '/insertBook/ADD/' ?> method="POST"  enctype="multipart/form-data">
		<h4 class="text-danger">* required</h4>
		ISBN: <input type="text"  name="isbn">  <span class="text-danger">*<?php print (isset($errors['isbn']))?$errors['isbn']:NULL; ?></span> <br>
		Book title: <input type="text" name="title">  <span class="text-danger">*<?php print (isset($errors['title']))?$errors['title']:NULL; ?></span> <br>
		Author: <input type="text" name="author">  <span class="text-danger">*<?php print (isset($errors['author']))?$errors['author']:NULL; ?></span> <br>
		Publisher: <input type="text" name="publisher">  <span class="text-danger">*<?php print (isset($errors['publisher']))?$errors['publisher']:NULL; ?></span> <br>
		Genre: <input type="text" name="genre"> <span class="text-danger">*<?php print (isset($errors['genre']))?$errors['genre']:NULL; ?></span> <br>
		Relized year: <input type="text" name="year"> <span class="text-danger">*<?php print (isset($errors['year']))?$errors['year']:NULL; ?></span> <br>
		Total Pages: <input type="text" name="pages"> <span class="text-danger">*<?php print (isset($errors['pages']))?$errors['pages']:NULL; ?></span> <br>
		Price: <input type="text" name="price"> <span class="text-danger">*<?php print (isset($errors['price']))?$errors['price']:NULL; ?></span> <br>
		Description: <br>
		<textarea rows="4" cols="50" name="description"></textarea><br>

		Upload an image:  <span class="text-danger">*<?php print (isset($errors['image']))?$errors['image']:NULL; ?></span> <input type="file" name="image"><br>
		

		<input type="submit" value='ADD'>
		
	</form>


</div>