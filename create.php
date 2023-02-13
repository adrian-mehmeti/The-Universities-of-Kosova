<?php 
  session_start();
  include_once 'connect.php'
 ?>


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
		include 'header.php';
	?>

	<!--- Create contains ---->
	<div class="container-fluid">
  		<div class="row">
  			<nav class="col-md-2 d-none d-md-block bg-light sidebar">
  				<div class="sidebar-sticky">
  					<ul class="nav flex-column sideBarr">
            <?php
      error_reporting( ~E_NOTICE ); // avoid notice
     require_once 'connect.php';
     
    if(isset($_POST['submit']))
    {
      $titulli = $_POST['titulli'];// user name
      $permbajtja = $_POST['permbajtja'];// user email
      $date = date("Y-m-d");
      $imgFile = $_FILES['image']['name'];
      $tmp_dir = $_FILES['image']['tmp_name'];
      $imgSize = $_FILES['image']['size'];
      
      
      if(empty($titulli)){
       $errMSG = "Please Enter titulli.";
      }
      else if(empty($permbajtja)){
       $errMSG = "Please Enter Your permbajtja.";
      }
      else if(empty($imgFile)){
       $errMSG = "Please Select Image File.";
      }
      else
      {
       $upload_dir = 'postimet/'; // upload directory
     
       $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
      
       // valid image extensions
       $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
      
       // rename uploading image
       $userpic = rand(1000,1000000).".".$imgExt;
        
       // allow valid image file formats
       if(in_array($imgExt, $valid_extensions)){   
        // Check file size '5MB'
        if($imgSize < 5000000)    {
         move_uploaded_file($tmp_dir,$upload_dir.$userpic);
        }
        else{
         $errMSG = "Sorry, your file is too large.";
        }
       }
       else{
        $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";  
       }
      } 
      // if no error occured, continue ....
      if(!isset($errMSG))
      {
       $stmt = $DB_con->prepare('INSERT INTO lajmet(titulli,permbajtja,foto,dataKrijimit) VALUES(:uname, :ujob, :upic,:date)');
       $stmt->bindParam(':uname',$titulli);
       $stmt->bindParam(':ujob',$permbajtja);
       $stmt->bindParam(':upic',$userpic);
       $stmt->bindParam(':date',$date);
       
        if($stmt->execute()){
                ?>
                        <script>
                alert('Successfully Create ...');
                window.location.href='dashboard.php';
                </script>
                        <?php
              }
              else{
                $errMSG = "Sorry Data Could Not Create !";
              }
         }
    }
?>
  						<li class="nav-item">
  							<a id ="a1" class="nav-link active" href="dashboard.php" >
  								Dashboard
  								<span class="sr-only">(current)</span>
  							</a>
  						</li>
  						<li class="nav-item">
  							<a id="a1" class="nav-link" href="create.php">
  								Posto
  							</a>
  						</li>
  						<li class="nav-item">
  							<a id="a1" class="nav-link" href="logout.php">
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
              <form  method="post"  enctype="multipart/form-data">
                <h2 class="text-center">Postimi</h2>
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
                      <input type="file" name="image"  accept="image/*" class="custom-file-input" id="inputGroupFile01">
                      <label class="custom-file-label" for="inputGroupFile01"></label>
                    </div>
                </div>
                <div class="form-group">
                  <button type="submit" name="submit"  class="btn btn-primary btn-block">Save</button>
                </div>
              </form>
            </div>
          </div>
  			</main>
  		</div>
  	</div>

  	<!---- ContainerFluid --->
	<?php
		include 'footerFixed.php'
	?>

	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>