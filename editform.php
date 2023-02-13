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
  <link rel="stylesheet" type="text/css" href="css/styleothers.css">
</head>
<body>
  <?php
 error_reporting( ~E_NOTICE ); // avoid notice
 require_once 'connect.php';
 
if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
 {
  $id = $_GET['edit_id'];
  $stmt_edit = $DB_con->prepare('SELECT titulli, permbajtja, foto FROM lajmet WHERE lajmet_id =:uid');
  $stmt_edit->execute(array(':uid'=>$id));
  $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
  extract($edit_row);
 }
 else
 {
  header("Location: index.php");
 }

 if(isset($_POST['btn_save_updates']))
 {
  $titulli = $_POST['titulli'];// user name
  $permbajtja = $_POST['permbajtja'];// user email
  
  $imgFile = $_FILES['image']['name'];
  $tmp_dir = $_FILES['image']['tmp_name'];
  $imgSize = $_FILES['image']['size'];
  
if($imgFile)
    {
      $upload_dir = 'postimet/'; // upload directory 
      $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
      $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
      $userpic = rand(1000,1000000).".".$imgExt;
      if(in_array($imgExt, $valid_extensions))
      {     
        if($imgSize < 5000000)
        {
          unlink($upload_dir.$edit_row['image']);
          move_uploaded_file($tmp_dir,$upload_dir.$userpic);
        }
        else
        {
          $errMSG = "Sorry, your file is too large it should be less then 5MB";
        }
      }
      else
      {
        $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";    
      } 
    }
    else
    {
      // if no image selected the old image remain as it is.
      $userpic = $edit_row['image']; // old image from database
    } 
  // if no error occured, continue ....
  if(!isset($errMSG))
  {
   $stmt = $DB_con->prepare('UPDATE lajmet SET titulli=:uname,
                                                permbajtja=:ujob,
                                                foto=:upic
                                                where lajmet_id=:uid');
   $stmt->bindParam(':uname',$titulli);
   $stmt->bindParam(':ujob',$permbajtja);
   $stmt->bindParam(':upic',$userpic);
   $stmt->bindParam(':uid',$id);
   
    if($stmt->execute()){
            ?>
                    <script>
            alert('Successfully Updated ...');
            window.location.href='dashboard.php';
            </script>
                    <?php
          }
          else{
            $errMSG = "Sorry Data Could Not Updated !";
          }
     }
 }
?>







	<?php
		include 'header.php';
	?>
	<!---- EditForm Body --->
	<div class="container-fluid">
  		<div class="row">
  			<nav class="col-md-2 d-none d-md-block bg-light sidebar">
  				<div class="sidebar-sticky">
  					<ul class="nav flex-column sideBarr">
  						<li class="nav-item">
  							<a class="nav-link active" href="dashboard.php" >
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
  					<h2 class="text-left">Postimet</h2>
  				<div class="col-md-4 col-md-offset-4">
            <div class="create-form">
              <form method="post"  enctype="multipart/form-data">
                <h2 class="text-center">Edito</h2>
                <div class="form-group">
                  <input type="text" class="form-control" name="titulli" value="<?php echo $titulli; ?>" placeholder="Shtyp Titullin" required="required">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="permbajtja" value="<?php echo $permbajtja; ?>" placeholder="shtyp permbajtja" required="required">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Upload</span>
                    </div>
                    <div class="custom-file">
                      <input type="file" name="image" accept="image/*" class="custom-file-input" id="inputGroupFile01">
                      <label class="custom-file-label" for="inputGroupFile01"></label>
                    </div>
                </div>
                <div class="form-group">
                  <button type="submit" name="btn_save_updates" class="btn btn-primary btn-block">Save</button>
                </div>
              </form>
            </div>
          </div>
  			</main>
  		</div>
  	</div>
	<!--- COntainerFluid -->
	<?php
		include 'footerFixed.php'
	?>

	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>