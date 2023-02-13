<?php
require 'connect.php';


    

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $message = '';
        if(empty($name)){
            $errMSG = "Please Enter name.";
        }
        else if(empty($email)){
            $errMSG = "Please Enter Your email.";
        }
        if(!isset($errMSG))
        {
            $sql = 'INSERT INTO users (name, email, password,roli) VALUES (:name, :email, :password,"Admin")';
            $query = $DB_con->prepare($sql);
            $query->bindParam('name', $name);
            $query->bindParam('email', $email);
            $query->bindParam('password', $password);
            
            if($query->execute()) {
                $message = "Successfully created your account";
            } else {
                $message = "A problem occurred creating your account";
            }
        }
    }
?>

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
	<!--- Register body --->
	<div class="container">
	  	<div class="row univers-pSignUp">
	  		<div class="col-md-4 col-md-offset-4">
	  			<div class="signup-form">
	  				<form action="register.php" method="POST"  name="myForm" onsubmit="return validateForm()">
	  					<h2 class="text-center">
	  						Register
	  					</h2>
	  					<div class="form-group">
	  						
	  							<input type="text" class="form-control" name="name" placeholder="Username" id="registerform" >
	  							
	  					</div>
	  						<div class="form-group">
	  							<input type="email" class="form-control" name="email" placeholder="Email" id="registerform2">
	  						</div>
	  						<div class="form-group">
	  							<input type="password" class="form-control" name="password" placeholder="Password" id="registerform3" >
	  						</div>
	  						
	  						<div class="form-group">
	  							<button type="submit" name="submit"  class="btn btn-primary btn-block">Register Now</button>
	  						</div> 					
	  				</form>
	  			</div>
	  		</div>
	  	</div>
	  	<!--- Row --->
  	</div>
  	<!--- Container --->
  	<script>
                function validateForm() {
                    // validimi i emrit nese eshte i zbraste
                    var fname = document.forms["myForm"]["registerform"].value;
                    if (fname == "") {
                        alert("Ju lutem shkruani emailin");
                        return false;
                    }
                    // validimi i mbiemrit nese eshte i zbraste
                    var lname = document.forms["myForm"]["registerform2"].value;
                    if (lname == "") {
                        alert("Ju lutem shkruani email");
                        return false;
                    }
                    var lname = document.forms["myForm"]["registerform3"].value;
                    if (lname == "") {
                        alert("Ju lutem shkruani passwordin");
                        return false;
                    }
                    
                }
    </script>




	<?php
		include 'footerFixed.php';
	?>

	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>