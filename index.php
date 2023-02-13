<?php 
	include "connect.php"; 
?>


<!DOCTYPE html>
<html>
<head>
	<title>Universitetet E Kosoves</title>
	
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">


  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/searchcss.css">
			
</head>
<body>
	<?php
		session_start();
		include 'header.php';
	?>
		
						
	<div class="container">
		<div class="row">
		    <div class="col-lg-12">
		      <div class="content">
		        <h1>UniversitetetEKosoves</h1>
		        <h3>The Only Helping People App</h3>
		        <hr>
		      
		        <form class="form-inline" action="listaDrejtimev.php" method="POST" name="form1">
		          
		          <input class="form-control form-control-sm mr-3 w-75" name="searchDrejtimet" type="search" placeholder="Kerko Drejtimin" aria-label ="Kerko Drejtimin ose Fakultetin" aria-label ="Search" id="search" autocomplete="off"  >
		          
		           <i class="fas fa-search" aria-hidden="true"></i>
		        </form>

		      </div>
		    </div>
		</div>
 	</div>

 
 	<script type="text/javascript" src="js/showsearch.js"></script>
 	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</body>
</html>