<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
}
else {
    $query=mysqli_query($con,
    "CREATE VIEW experience AS
    SELECT d.ID,
        d.EmpFname,
        d.EmpLname,
        d.EmpDesignation,
        d.EmpJoingdate,
        e.Employer1Name,
        e.Employer1Designation,
        e.Employer1WorkDuration,
        e.Employer2Name,
        e.Employer2Designation,
        e.Employer2WorkDuration,
        e.Employer3Name,
        e.Employer3Designation,
        e.Employer3WorkDuration
    FROM emp_detail d INNER JOIN emp_exp e
    ON d.ID = e.EmpID");


?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Employees Experience</title>

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
          <h1 class="h3 mb-4 text-gray-800">Employees Experience</h1>

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
                <th>Joining Date</th>
                <th>Company</th>
                <th>Designation</th>
                <th>Work Duration</th>
              </tr>

              <?php
                $sql=mysqli_query($con,"SELECT * FROM experience");
                $cnt=1;
                while ($row=mysqli_fetch_array($sql))
                {

              ?>

              <tr>
                <td> <?php echo $row['ID']; ?> </td>
                <td> <?php echo $row['EmpFname']; ?> </td>
                <td> <?php echo $row['EmpLname']; ?> </td>
                <td> <?php echo $row['EmpJoingdate']; ?> </td>
                <td>
                    <?php echo $row['Employer1Name']; ?> <br>
                    <?php echo $row['Employer2Name']; ?> <br>
                    <?php echo $row['Employer3Name']; ?> 
                </td>
                <td>
                    <?php echo $row['Employer1Designation']; ?> <br>
                    <?php echo $row['Employer2Designation']; ?> <br>
                    <?php echo $row['Employer3Designation']; ?> 
                </td>
                <td>
                    <?php echo $row['Employer1WorkDuration']; ?> <br>
                    <?php echo $row['Employer2WorkDuration']; ?> <br>
                    <?php echo $row['Employer3WorkDuration']; ?> 
                </td>
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