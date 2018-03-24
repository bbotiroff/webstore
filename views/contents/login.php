<?php 
	$AuthError = "";
	if(!empty($errors)){
		$AuthError = $errors['AuthError'];
	}

 ?>

<div class="col-lg-12 text-center">
	<div class="row">
		<div class="col-md-5 mx-auto jumbotron my-5">
			<form action=<?php print BASE_PATH . '/myAccount/login/' ?> method="POST"  enctype="multipart/form-data" class="form-signin">
			<h1 class="h3 mb-3 font-weight-normal"><i class="fa fa-lock" aria-hidden="true"></i> &nbsp;LOG IN</h1>
			<h6 class="text-danger"><?php print $AuthError;?></h4>
				<label for="inputEmail" class="sr-only">E-mail address: </label>
				<input type="text" name="email" class="form-control" placeholder="Email address">  
				<label for="inputPassword" class="sr-only">Password: </label>
				<input type="password" name="password" class="form-control" placeholder="Password">  
				<div class="checkbox mb-3">
					<label>
					  <input type="checkbox" value="remember-me"> Remember me
					</label>
				</div>
				<input type="submit" value='Log In' class="btn btn-m btn-primary btn-block">
				
				<a href=<?php print BASE_PATH . '/myAccount/index/view/signup' ?>>Don't have an account yet?</a>
			</form>
		</div>
	</div>
</div>

