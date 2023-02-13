<?php 
  session_start();
  include_once 'connect.php'
 ?>

<?php



if(isset($_POST['submit'])):
    $email = $_POST['email'];
    $password = $_POST['password'];
    $message = '';
	$user1='Admin';
	$user2 = 'User';

    $query = $DB_con->prepare('SELECT * FROM users WHERE email = :email');
    $query->bindParam(':email', $email);
    $query->execute();

    $user = $query->fetch();

    if(count($user) > 0 && password_verify($password, $user['password'])   ){
		if($user['roli']=='Admin'){
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
    		$_SESSION[$user['roli']] = $user['Admin'];

             header("Location: dashboard.php");
		
		}
        else if($user['roli']=='User'){
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION[$user['roli']] = $user['User'];

        header("Location: indexLogOut.php");
    } 
	}else {
        $message = 'Sorry, those credentials do not match';
    }

endif;

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
	<!--- Login body -->
	<div class="container ">
		<div class="row univers-pLogin">
			<div class="col-md-4 col-md-offset-4">
			  <div class="login-form">
			  	<form action="login.php" method="POST" name="myForm" onsubmit="return validateForm()">
			  		<h2 class="text-center">Log in</h2>
			  		<div class="form-group">
			  			<input type="text" id="loginform" name="email" class="form-control" placeholder="Email" required="required">
			  		</div>
			  		<div class="form-group">
			  			<input type="password" id="loginform1" name="password" class="form-control" placeholder="Password" required="required">
			  		</div>
			  		<div class="form-group">
			  			<button type="submit" name="submit" class="btn btn-primary btn-block">Log In</button>
			  		</div>
			  		<div class="clearfix">
			  			<label class="pull-left checkbox-inline">
			  				<input type="checkbox">
			  				Remember Me
			  			</label>
			  			<a href="#" class="pull-right">Forgot password?</a>
			  		</div>
			  	</form>
			  	<p class="text-center"><a href="#">Create an Account</a></p>
			  </div>
			</div>
		</div>
		<!-- row --->
	</div>
	<!--- Container -->
	<script>
                function validateForm() {
                    // validimi i emrit nese eshte i zbraste
                    var fname = document.forms["myForm"]["loginform"].value;
                    if (fname == "") {
                        alert("Ju lutem shkruani emailin");
                        return false;
                    }
                    // validimi i mbiemrit nese eshte i zbraste
                    var lname = document.forms["myForm"]["loginform1"].value;
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