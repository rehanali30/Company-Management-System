<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
}
else {

  if(isset($_POST['submit']))
  {
    $adminid=$_SESSION['aid'];
    $AName=$_POST['AdminName'];

    $query=mysqli_query($con, "UPDATE admin SET AdminName ='$AName' WHERE ID='$adminid'");
    if ($query) {
      $msg="Admin Profile Has Been Updated.";
    }
    else {
      $msg="Something Went Wrong. Please try again.";
    }
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Admin Profile</title>

  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">

  <div id="wrapper">

    <!-- Sidebar -->
    <?php include_once('includes/sidebar.php')?>
  
    <div id="content-wrapper" class="d-flex flex-column">

      <div id="content">

        <!-- Topbar -->
        <?php include_once('includes/header.php')?>

        <div class="container-fluid">
          <h1 class="h3 mb-4 text-gray-800">Admin Profile</h1>

          <p style="font-size:16px; color:red" align="center">
            <?php
              if($msg){
                echo $msg;
              }
            ?>
          </p>

          <form class="user" method="POST" action="">
            
            <?php
              $adminid=$_SESSION['aid'];
              $ret=mysqli_query($con,"SELECT * FROM admin WHERE ID='$adminid'");
              $cnt=1;
              while ($row=mysqli_fetch_array($ret))
              {

            ?>

            <div class="row">
              <div class="col-4 mb-3">Admin Name</div>
              <div class="col-8 mb-3">
                <input type="text" class="form-control form-control-user" id="AdminName" name="AdminName" aria-describedby="emailHelp" required="true" value="<?php  echo $row['AdminName']; ?>">
              </div>
            </div>

            <div class="row">
              <div class="col-4 mb-3">User Name </div>
              <div class="col-8 mb-3">
                <input type="text" class="form-control form-control-user" readonly="true" id="UserName" name="UserName" aria-describedby="emailHelp" value="<?php  echo $row['AdminuserName']; ?>">
              </div>  
            </div>
        
            <div class="row">
              <div class="col-4 mb-3">Admin Registration Date(yyyy-mm-dd)</div>
              <div class="col-8  mb-3">
                <input type="text" class="form-control form-control-user" readonly="true" value="<?php  echo $row['AdminRegdate'];?>" id="AdminRegdate" name="AdminRegdate" aria-describedby="emailHelp" >
              </div>
            </div>
  
            <?php } ?>

            <div class="row" style="margin-top:4%">
              <div class="col-4"></div>
              <div class="col-4">
                <input type="submit" name="submit"  value="Update" class="btn btn-primary btn-user btn-block">
              </div>
            </div>

          </form>

        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>

<?php } ?>
