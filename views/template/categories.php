<div class="input-group-append dropdown show">
  <a class="btn btn-light dropdown-toggle text-dark" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Category
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
  	
	<!--  Build category list based on genre column in database -->
  	<?php 
  		foreach ($Categories as $category) {
  			$categoryLink = BASE_PATH . "/Search/category/categoryName/" . $category;
  			print "<a class=\"dropdown-item\" href=\"{$categoryLink}\">{$category}</a>";
  		}
	?>
  
  </div>
</div>