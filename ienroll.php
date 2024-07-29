<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0 )
    {  
        header('location:index.php');
    }
else{
    

            if(isset($_GET["in"]))
             { 
                 $regid=$_SESSION['login'];
                $sql = mysqli_query($con,"SELECT * FROM courseenroll where id = '".$_GET['id']."'");
                $row =mysqli_fetch_assoc($sql);
                $i=$row['institution']; 
                $c=$row['course']; 
                $t=$row ['mode'];
               $s=$row ['session'];
               $m=$row ['mobile'];
               $e=$row ['email'];
               $l=$row['lecture'];
               $o=$row['location'];
               $a=$row['seats'];                                   
                 $result =mysqli_query($con,"SELECT course FROM icourseenroll WHERE course= '$c'and institution='$i' ");
                 $count=mysqli_num_rows($result);
                    if($count>0)  
                     {    
                     echo '<script>alert("Error: course already enrolled")</script>';
                     echo '<script>window.location.href=ienroll.php</script>';
                     }
                     else{
                       
                         $ret=mysqli_query($con,"INSERT into icourseenroll(studentregno,institution,mode,session,mobile,email,course,lecture,location,seats) values('$regid','$i','$t','$s','$m','$e','$c','$l','$o','$a') ");
                         if($ret)
                          {
                            echo '<script>alert(" course enrolled Successfully !!")</script>';
                            echo '<script>window.location.href=ienroll.php</script>';
                          }
                        
                     }
                    
                  
             }
            
        }
    
 



      
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Course Enroll</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
</head>

<body>
<?php include('includes/header.php');?>
    <!-- LOGO HEADER END-->
<?php if($_SESSION['login']!="")
{
 include('includes/menubar.php');
}
 ?>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">OTHER INSTITUTIONAL COURSE  </h1>                                 
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Manage Institution Course
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive table-bordered">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>INSTITUTION</th>
                                            <th>TYPE </th>
                                            <th>session </th>
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
$sql=mysqli_query($con,"select * from courseenroll");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>


                                        <tr>
                                            <td><?php echo $cnt;?></td>
                                            <td><?php echo htmlentities($row['institution']);?></td>
                                            <td><?php echo htmlentities($row['type']);?></td>
                                            <td><?php echo htmlentities($row['session']);?></td>
                                            <td><?php echo htmlentities($row['mobile']);?></td>
                                             <td><?php echo htmlentities($row['email']);?></td>
                                            <td><?php echo htmlentities($row['lecture']);?></td>
                                            <td><?php echo htmlentities($row['course']);?> </td>
                                            <td><?php echo htmlentities($row['seats']);?></td>
                                            <td><?php echo htmlentities($row['location']);?></td>
                                            <td><?php echo htmlentities($row['creationDate']); ?></td>
                                            <td> 
                                            
                                                                     
  <a href="ienroll.php?id=<?php echo $row['id']?>&in=insert" onClick="return confirm('Are you sure you want to enroll?')">
  
                                                  <button class="btn btn-danger" onblur="" id="course-availability-status1" style="font-size:12px;">enroll</button>

</a>
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
                </div>


            </div>





        </div>
    </div>
  <?php include('includes/footer.php');?>
    <script src="assets/js/jquery-1.11.1.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script>
function courseAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "icheck_availability.php",
data:'cid='+$("#course").val(),'cm='+$("#institution").val(),
type: "POST",
success:function(data){
$("#course-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>

</body>
</html>
<?php  ?>