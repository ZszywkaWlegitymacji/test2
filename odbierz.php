<?php
session_start();
include_once 'dbconnect.php';

if (!isset($_SESSION['userSession'])) {
 header("Location: index.php");
}

$query = $DBcon->query("SELECT * FROM z7_users WHERE user_id=".$_SESSION['userSession']);
$userRow=$query->fetch_array();

//odbieranie wys³anego pliku

 if (is_uploaded_file($_FILES['plik']['tmp_name']))
 { 
	echo 'File recieved successfully: '.$_FILES['plik']['name'].'<br/>';
	move_uploaded_file($_FILES['plik']['tmp_name'], 
	$_SERVER['DOCUMENT_ROOT'].$_FILES['plik']['name']); 
 } else {
  $msg = "<div class='alert alert-danger'>
     <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Unknown Error!
    </div>";

} 



$DBcon->close();

?>



<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>

<div class="signin-form">

 <div class="container">
     
        
        <?php
  if(isset($msg)){
   echo $msg;
  }
  ?>
       <form class="form-signin" method="post" id="select-form">

      <hr />
<br>
<a href="home.php">BACK</a><br><br>
<br>
<a href="logout.php?logout">Logout</a><br><br>
      </form>

    </div>
    
</div>

</body>
</html>