

<?php 
	if(isset($dbMessage)){
		print $dbMessage;
	}

 ?>
 
<div class="col-12 ">
<div class="w-25 mx-auto jumbotron my-5">

	<form action=<?php print BASE_PATH . '/myAccount/signup/' ?> method="POST"  enctype="multipart/form-data"  class="form-signin">
	<h1 class="h3 mb-3 font-weight-normal text-center"><i class="fa fa-user-plus" aria-hidden="true"></i> &nbsp;SIGN UP</h1>
		<input type="text"  name="firstname" class="form-control" placeholder="First Name">  
			<span class="text-danger"><?php print (isset($errors['firstname']))?$errors['firstname']:NULL; ?></span>
		<input type="text" name="lastname"  class="form-control" placeholder="Last Name">  
			<span class="text-danger"><?php print (isset($errors['lastname']))?$errors['lastname']:NULL; ?></span>
		<input type="text" class="form-control" placeholder="E-mail Address"  name="email">  
			<span class="text-danger"><?php print (isset($errors['email']))?$errors['email']:NULL; ?></span>
		<input type="password" class="form-control" placeholder="Password"  name="password" id="passcode1">
			<span class="text-danger"><?php print (isset($errors['password']))?$errors['password']:NULL; ?></span>
		<input type="password" class="form-control" placeholder="Confirm Password"  id="passcode2" onkeyup="checkPass(); return false;"> 
			<span class="text-danger" id="passcodeError"></span>
	
		<input type="button" value='Sign Up' id="signButton" class="mt-4 btn btn-m btn-primary btn-block disabled">
		
		<div class="text-center" >
			<a href=<?php print BASE_PATH . '/myAccount/index/view/login' ?> >Already have an account?</a>
		</div>
	</form>


</div>
</div>