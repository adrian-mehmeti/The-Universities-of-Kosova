<?php 
  session_start();
  include_once 'connect.php'

 ?>
<?php if(isset($_SESSION['name'])): ?>
  <?php else: 
     header("Location:login.php");
  ?>
       
  <?php endif; ?> 

<!DOCTYPE html>
<html>
<head>
	<title>Universitetet E Kosoves</title>
  	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

	<link rel="stylesheet" type="text/css" href="css/styleDash.css">
</head>
  <?php
    if(isset($_GET['delete_id']))
     {
     
      // it will delete an actual record from db
      $stmt_delete = $DB_con->prepare('DELETE FROM lajmet WHERE lajmet_id =:uid');
      $stmt_delete->bindParam(':uid',$_GET['delete_id']);
      $stmt_delete->execute();

      header("Location: dashboard.php");
     }
  ?>



<body>
	<?php
		include 'header.php';
	?>
	<!---- Dashboard body --->
	<div class="container-fluid">
  		<div class="row">
  			<nav class="col-md-2 d-none d-md-block bg-light sidebar">
  				<div class="sidebar-sticky">
  					<ul class="nav flex-column sideBarr">
  						<li class="nav-item">
  							<a class="nav-link active" href="#" >
  								Dashboard
  								<span class="sr-only">(current)</span>
  							</a>
  						</li>
  						<li class="nav-item">
  							<a class="nav-link" href="create.php">
  								Posto
  							</a>
  						</li>
  						<li class="nav-item">
  							<a class="nav-link" href="logout.php">
  								LogOut
  							</a>
  						</li>
  					</ul>
  				</div>
  			</nav>
  			<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  				<div class="chartjs-size-monitor">
  				</div>
  					<h2>Postimet</h2>
  				<div class="table-responsive">
  					<table class="table table-bordered table-sm">
  						<thead>
  							<tr>
  								<th>ID</th>
  								<th>Titulli</th>
  								<th>Pershkrimi</th>
  								<th>Aksion</th>
  							</tr>
  						</thead>
  						<tbody>
                <?php
                  $stmt = $DB_con->prepare('SELECT lajmet_id, titulli, permbajtja, foto FROM lajmet');
                  $stmt->execute();
               
                  if($stmt->rowCount() > 0)
                  {
                    while($row=$stmt->fetch(PDO::FETCH_ASSOC))
                  {
                    extract($row);
                ?>
                <?php?>
  							<tr>
  								<td><?php echo $lajmet_id;?></td>
  								<td><?php echo $row['titulli'];?></td>
  								<td><?php echo $row['permbajtja']?></td>
  								<td>
  									<a  href="editform.php?edit_id=<?php echo $row['lajmet_id'];?>"onclick="return confirm('A je i sigurt ?')"><button class="btn btn-primary">Edit</button></a>
  									<a  href="?delete_id=<?php echo $row['lajmet_id']; ?>"  onclick="return confirm('sigurt ? ?')" ><button class="btn btn-primary">Delete</button></a>
  								</td>
  							</tr>
                <?php
            }
           } 
            else
           {
            ?>
                  <div class="col-xs-12">
                   <div class="alert alert-warning">
                       <span class="glyphicon glyphicon-info-sign"></span> &nbsp; No Data Found ...
                      </div>
                  </div>
                  <?php
           }
           
          ?>
  						</tbody>
  					</table>
  				</div>
  			</main>
  		</div>
  	</div>
  	<!--- ContainerFluid --->
	<?php
		include 'footerFixed.php';
	?>

	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>