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
    $cpassword=$_POST['currentpassword'];
    $newpassword=$_POST['newpassword'];
    $query=mysqli_query($con,"SELECT ID FROM admin WHERE ID='$adminid' AND	Password='$cpassword'");
    $row=mysqli_fetch_array($query);
    if($row>0) {
      $ret=mysqli_query($con,"UPDATE admin SET Password='$newpassword' WHERE ID='$adminid'");
      $msg= "Your Password Successully Changed";
    }
    else {
      $msg="Your Current Password is Wrong";
    }
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Change Password</title>

  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

  <script type="text/javascript">
    function checkpass() {
      if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value)
      {
        alert('New Password and Confirm Password Field Does Not Match');
        document.changepassword.confirmpassword();
        return false;
      }
      return true;
    }
  </script>
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
          <h1 class="h3 mb-4 text-gray-800">Change Password</h1>
          
          <p style="font-size:16px; color:red" align="center">
            <?php
              if($msg){
                echo $msg;
              }
            ?>
          </p>

          <form name="changepassword" class="user" method="post" onsubmit="return checkpass();">
            <?php
              $adminid=$_SESSION['aid'];
              $ret=mysqli_query($con,"SELECT * FROM admin WHERE ID='$adminid'");
              while ($row=mysqli_fetch_array($ret)) {
            ?>

            <div class="row">
              <div class="col-4 mb-3">Current Password</div>
              <div class="col-8 mb-3">
                <input type="Password" class="form-control form-control-user" id="Password" name="currentpassword"  value="" required="true">
              </div>
            </div>  
              
            <div class="row">
              <div class="col-4 mb-3">New Password </div>
              <div class="col-8 mb-3">
                <input type="Password" class="form-control form-control-user" id="newpassword" name="newpassword"  value="" required="true">
              </div>
            </div>

            <div class="row">
              <div class="col-4 mb-3">Confirm Password </div>
              <div class="col-8 mb-3">
                <input type="Password" class="form-control form-control-user" id="confirmpassword" name="confirmpassword"  value="" required="true">
              </div>
            </div>
            
            <?php } ?>

            <div class="row" style="margin-top:4%">
              <div class="col-4"></div>
              <div class="col-4">
                <input type="submit" name="submit"  value="Change" class="btn btn-primary btn-user btn-block">
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
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>

<?php } ?>
