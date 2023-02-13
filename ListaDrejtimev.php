<?php 
	include "connect.php";
	$searchBox = "";
	if(isset($_POST)){
		$searchBox = $_POST['searchDrejtimet'];
		
	}
	
	$count =  str_word_count($searchBox,0);
	$datos =trim($searchBox," ");
	if($count > 1){
		list($search1,$search2)= explode(" ",$datos);
		$sql = "SELECT fkmain.semestri,fkmain.pagesa,fakultet.emri, drejtimet.emri_drejtimit,/*adress.vendi*/ GROUP_CONCAT(adress.vendi) as adressat
				FROM (((fkmain
				INNER JOIN fakultet ON fkmain.fakultet_id = fakultet.fakultet_id)
				INNER JOIN drejtimet ON fkmain.drejtimet_id = drejtimet.drejtimet_id ) 
				INNER JOIN adress ON fkmain.adress_id = adress.adress_id) 
				WHERE emri_drejtimit REGEXP '$search1' OR fakultet.emri REGEXP '$search1' 
				AND 
				emri_drejtimit REGEXP '$search2' OR  fakultet.emri REGEXP '$search2' 
				GROUP BY fakultet.emri, drejtimet.emri_drejtimit
				";
	}else{
		$sql = "SELECT fkmain.semestri,fkmain.pagesa,fakultet.emri, drejtimet.emri_drejtimit, /*adress.vendi*/ GROUP_CONCAT(adress.vendi) as adressat
				FROM (((fkmain
				INNER JOIN fakultet ON fkmain.fakultet_id = fakultet.fakultet_id)
				INNER JOIN drejtimet ON fkmain.drejtimet_id = drejtimet.drejtimet_id ) 
				INNER JOIN adress ON fkmain.adress_id = adress.adress_id) 
				WHERE drejtimet.emri_drejtimit REGEXP '$datos' OR  fakultet.emri REGEXP '$datos'
				GROUP BY drejtimet.emri_drejtimit , fakultet.emri";
	}
	
	$stmt = $DB_con->query($sql);
	
	$row_count = $stmt->rowCount();
	//*****************************
	
	$stmt->setFetchMode(PDO::FETCH_ASSOC);

	
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Universitetet E Kosoves</title>
  	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  	<link rel="stylesheet" type="text/css" href="css/styleothers.css">
  	<style type="text/css">
  		h3{
  			text-align: center;
  		}
  	</style>
</head>
<body>
	<?php
		include 'header.php';
	?>
	<!--- Lista body -->
	<div class="container">
		<?php 
		if(preg_match("/[a-z]/i", $searchBox)){
		if($row_count > 0){ 
			//*******************************

			?>
  		<div class="row univers-p">
  			<div class="col-lg-12">
  				<div class="uniHeader">
  					<h1>UniversitetetEKosoves</h1>
  				</div>
  			</div>
  			<div class="col-lg-12">
  				<div class="uniLista-txt">
  					<h3>Fakultetet & Lista E Drejtimev </h3>
  				</div>
  				<table class="table table-bordered">
					<thead>
						<tr>
							<th scope="col">Fakulteti</th>
							<th scope="col">Drejtimi</th>
							<th scope="col">Semestri</th>
							<th scope="col">Pagesa</th>
							<th scope="col">Adresa</th>
						</tr>
					</thead>
					<tbody>
						<?php  while ($row = $stmt->fetch()):

						 ?>

						<tr>
								<td><?php echo $row['emri']?></td>
							    <td><?php echo $row['emri_drejtimit']?></td>
							    <td><?php echo $row['semestri']?></td>
							    <td><?php echo $row['pagesa']?></td>
							    <td><?php echo $row['adressat']?></td>
						</tr>

						<?php endwhile;?>
					
					
					</tbody>
				</table>
  			</div>
  		</div>
  		<?php 
  		}else{
  			echo " <h3> <b>NOT RECORD FOUND</b> </h3>";
  		}
  	}
  	else{
  		echo " <h3> <b>Shtypni vetem shkronja</b> </h3>";
  	}
  		?>
  		<!--- row --->
  	</div>
  	<!-- Container-->
	<?php
		include 'footerSticky.php';
	?>
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>