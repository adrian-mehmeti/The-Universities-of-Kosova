<header>
	<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container ">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target ="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">UniversitetetEKosoves</a>
      </div>
      <div id="navbar" class="collapse navbar-collapse">
      
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="lajmet.php">Lajme</a></li>
            <li><a href="universiteti.php">Universiteti</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>

            <?php 
                    
              
                  if(isset($_SESSION['name'])){


                  echo '<li><a href="logout.php">Log out  <i class="fa fa-sign-out"></i></a></li>';
                  echo '<li><a href="dashboard.php"> Dashboard </a> </li>';
                }
                else{
                  echo '<li><a href="login.php">Login  <i class="fa fa-user"></i></a></li>';
                  echo '<li><a href="register.php">Signup  <i class="fa fa-user-plus"></i></a></li>';

                }
            ?>



          </ul>
        </div>
    </div>
  </nav>
</header>