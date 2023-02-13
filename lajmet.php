<?php
	session_start();

	include 'connect.php';

	$sql = "SELECT * FROM lajmet ORDER by datakrijimit DESC";
				 
	$stmt = $DB_con->query($sql);
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	$files = array();
	while($rows = $stmt->fetch()){
		$files [] = $rows;
	}
	$numOfCols = 3;
	$rowCount = 0;
	$bootstrapColWidth = 12 / $numOfCols;
?>

<!DOCTYPE html>
<html>
<?php  foreach($files as $file): 

	

?>
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
	<!--- Body --->
	<div class="container">
		<div class="row">
				
				<div class=" col-lg-4 col-md-<?php echo $bootstrapColWidth; ?>  col-sm-4 col-xs-4 gallery_product">
	                <a href="lajmetPost.php?id=<?php echo $file['lajmet_id'];?> " >
	                	<img src="postimet/<?php echo $file['foto'];?>"  class="img-responsive">
	                
	                	
	                	<h3> <b> <?php echo  $file['titulli']; ?> </b></h3>

	               </a> 
	               <p>
	                	<?php 
	                		$mb = $file['permbajtja'];
	                		$des = substr($mb, 0,155);
	                		echo $des;
	                	?>
	                </p>
	                		
            	</div>
            	<?php 
            		$rowCount++;
    				if($rowCount % $numOfCols == 0) echo '</div><div class="row">';
            	endforeach;?>
		</div>
		<!--- row --->
	</div>
	<!--- Container --->

	<?php
		include 'footerSticky.php';
	?>
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


 	

</body>
</html>