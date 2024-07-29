<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['alogin'])==0)
{   
header('location:index.php');
}else{

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Enroll History</title>
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <link href="../assets/css/style.css" rel="stylesheet" />
    
   
  
</head>

<body>
<?php include('includes/header.php');?>
    <!-- LOGO HEADER END-->
<?php if($_SESSION['alogin']!="")
{
 include('includes/menubar.php');
}
 ?>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">INSTITUTIONAL Enroll History  </h1>
                    </div>
                </div>
                <div class="row" >
            
                <div class="col-md-12">
                    <!--    Bordered Table  -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Enroll History
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive table-bordered">
                                <table class="table">
                                    <thead>
                                        <tr>
                                        <th>#</th>
                                        <th>REGISTERNO</th>
                                        <th>STUDENTNAME</th>
                                            <th>INSTITUTION</th>
                                            <th>mode </th>
                                            <th>SESSION </th>
                                            <th>MOBILE</th>
                                            <th>EMAILID </th>
                                             <th>LECTURER </th>
                                             <th>COURSE</th>
                                             <th>SEATS</th>
                                             <th>LOCATION</th>
                                             <th>CREATION DATE</th>
                                             <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$sql=mysqli_query($con,"select icourseenroll.id as id,icourseenroll.studentRegno as studentRegno,icourseenroll.institution as institution,icourseenroll.mode as mode,icourseenroll.session as session,icourseenroll.mobile as mobile,icourseenroll.email as email,icourseenroll.lecture as lecture,icourseenroll.course as course,icourseenroll.seats as seats,icourseenroll.location as location,icourseenroll.creationDate as creationDate,students.studentName as studentName from icourseenroll join students on students.StudentRegno=icourseenroll.StudentRegno ");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>


                                        <tr>
                                        <td><?php echo $cnt;?></td>
                                        <td><?php echo htmlentities($row['studentRegno']);?></td>
                                        <td><?php echo htmlentities($row['studentName']);?></td>
                                            <td><?php echo htmlentities($row['institution']);?></td>
                                            <td><?php echo htmlentities($row['mode']);?></td>
                                            <td><?php echo htmlentities($row['session']);?></td>
                                            <td><?php echo htmlentities($row['mobile']);?></td>
                                             <td><?php echo htmlentities($row['email']);?></td>
                                            <td><?php echo htmlentities($row['lecture']);?></td>
                                            <td><?php echo htmlentities($row['course']);?></td>
                                            <td><?php echo htmlentities($row['seats']);?></td>
                                            <td><?php echo htmlentities($row['location']);?></td>
                                            <td><?php echo htmlentities($row['creationDate']);?></td>
                                            <td>
                                            <a href="p.php?id=<?php echo $row['id']?>" target="_blank">
<button class="btn btn-primary"><i class="fa fa-print "></i> Print</button> </a>                                        


                                            </td>
                                        </tr>
<?php 
$cnt++;
} ?>

                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                     <!--  End  Bordered Table  -->
                </div>
            </div>


        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
  <?php include('includes/footer.php');?>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="../assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="../assets/js/bootstrap.js"></script>
</body>
</html>
<?php } ?>
