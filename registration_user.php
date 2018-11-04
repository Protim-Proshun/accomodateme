<?php include("header.php") ?>

  <div class="container">

    <div class="row">
		<div class="col-lg-6 col-lg-offset-3">
			<?php validate_user_registration(); ?>


		</div>

    <div class="row">
  			<div class="col-md-6 col-md-offset-3">
  				<div class="panel panel-login">
  					<div class="panel-heading">
  						<div class="row">
                <div class="col-xs-6">
  								<a href="registration_user.php" class="active" id="">User Registration</a>
  							</div>
  							<div class="col-xs-6">
  								<a href="registration.php" id="">Owner Register</a>
  							</div>
  						</div>
  						<hr>
  					</div>
  					<div class="panel-body">
  						<div class="row">
  							<div class="col-lg-12">
  								<form id="register-form" method="post" role="form" >

                    <!-- <div class="form-group">
  										<input type="number" name="id" id="id" class="form-control" placeholder="id" value="" required >
  									</div> -->

                    <div class="form-group">
  										<input type="text" name="name" id="name" tabindex="1" class="form-control" placeholder="Name" value="" required >
  									</div>

                    <div class="form-group">
  										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" required>
  									</div>

                    <div class="form-group">
  										<input type="email" name="email" id="register_email" tabindex="3" class="form-control" placeholder="Email Address" value="" required >
  									</div>

  									<div class="form-group">
  										<div class="row">
  											<div class="col-sm-6 col-sm-offset-3">
  												<input type="submit" name="register-submit" id="register-submit" class="form-control btn btn-register" value="Register Now">
  											</div>
  										</div>
  									</div>
  								</form>
  							</div>
  						</div>
  					</div>
  				</div>
  			</div>
  		</div>
  </div>

<?php include("footer.php") ?>
