<div class="col-lg-10 mx-auto my-5">
	<div class="card">
		<div class="card-heading bg-light p-3">  <h4 >My Profile</h4></div>
		
		<div class="card-body">
			<div class="row">

				<div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
					<img alt="User Pic" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" id="profile-image1" class="rounded-circle img-fluid"> 

					<a href=<?php echo BASE_PATH . "/myAccount/logout"?>>logout</a>
				</div>

				<div class="col-md-8 col-xs-12 col-sm-6 col-lg-8" >
					<div class="container" >
						<h2><?php echo $userMainInfo['firstname'] . " " . $userMainInfo['lastname']; ?></h2>
					</div>
						<ul class="container details" >
							<li><p></p></li>
							<li><p><span class="glyphicon glyphicon-envelope one" style="width:50px;"></span>somerandom@email.com</p></li>
						</ul>
					<div class="col-sm-5 col-xs-6 tital " >Date Of Joining: 15 Jun 2016</div>
				</div>

			</div>
			
		</div>
	</div>

</div>