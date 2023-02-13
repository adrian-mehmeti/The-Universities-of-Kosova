<!DOCTYPE html>
<html>
<head>
	<title>Universitetet E Kosoves</title>
  	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  	<link rel="stylesheet" type="text/css" href="css/styleothers.css">
</head>
<body>
	<?php
		include 'header.php';
	?>
	<div class="container">
  		<div class="row univers-pContact">
  			<div class="col-md-4 col-md-offset-4">
  				<div class="contact-form">
  					<form action="">
	  					<h2 class="text-center">
	  						Contact Us
	  					</h2>
	  					<p class="text-center">
	  						We'd love to hear from you, please drop us a line if you've any query.
	  					</p>
  						<div class="form-group">
	  						<div class="row">
	  							<div class="col-xs-6">
	  								<input type="text" class="form-control" name="first_name" placeholder="First Name" required="required">
	  							</div>
	  							<div class="col-xs-6">
	  								<input type="text" class="form-control" name="last_name" placeholder="Last Name" required="required">
	  							</div>
	  							
	  						</div>
	  					</div>
  						<div class="form-group">
  							<input type="email" class="form-control" name="email" placeholder="Email" required="required">
  						</div>
  						<div class="class-form-group">
  							<textarea class="form-control" placeholder="Message" rows="5" required=""></textarea>
  						</div>
  						<div class="form-group">
  							<button type="submit" class="btn btn-primary btn-block">Register Now</button>
  						</div>
  					</form>

  					
  				</div>
  			</div>
  		</div>
  	</div>

	
	<?php
		include 'footerFixed.php';
	?>
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>