<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
}
else {
    
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Employees Registration</title>

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
          <h1 class="h3 mb-4 text-gray-800">Employees Registration</h1>

          <p style="font-size:16px; color:red" align="center">
            <?php
              if($msg) {
                echo $msg;
              }
            ?>
          </p>

          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Employee Code</th>
                <th>Registration Date</th>
              </tr>

              <?php
                $sql=mysqli_query($con,"SELECT * FROM emp_reg");
                $cnt=1;
                while ($row=mysqli_fetch_array($sql))
                {

              ?>

              <tr>
                <td> <?php echo $row['EmpID']; ?> </td>
                <td> <?php echo $row['EmpFname']; ?> </td>
                <td> <?php echo $row['EmpLname']; ?> </td>
                <td> <?php echo $row['EmpCode']; ?> </td>
                <td> <?php echo $row['Reg_Time']; ?> </td>
              </tr>

              <?php 
                  $cnt=$cnt+1;
                }
              ?>

            </table>

          </div>

        </div>

      </div>

    </div>

  </div>

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>
  
  <!-- Page level plugins -->
  <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../js/demo/datatables-demo.js"></script>

</body>

</html>

<?php }  ?>