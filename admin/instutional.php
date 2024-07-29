<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['alogin'])==0 )
    {  
        header('location:index.php');
    }
else{
    if(isset($_POST['submit']))
    {
    $institution=$_POST['institution'];
    $mode=$_POST['mode'];
    $session=$_POST['session'];
    $mobile=$_POST['mobile'];
    $email=$_POST['email'];
    $course=$_POST['course'];
    $lecture=$_POST['lecture'];
    $seats=$_POST['seats'];
    $location=$_POST['location'];
   $ret=mysqli_query($con,"insert into courseenroll(institution,mode,session,mobile,email,lecture,course,seats,location) values('$institution','$mode','$session','$mobile','$email','$lecture','$course','$seats','$location')");
    if($ret)
    {
    echo '<script>alert(" course created Successfully !!")</script>';
    echo '<script>window.location.href=courseenroll.php</script>';
    }
    else{
    echo '<script>alert("Error : Not created")</script>';
    echo '<script>window.location.href=courseenroll.php</script>';
    }
    }


if(isset($_GET['del']))
{
mysqli_query($con,"delete from courseenroll where id = '".$_GET['id']."'");
echo '<script>alert("Course deleted!!")</script>';
echo '<script>window.location.href=courseenroll.php</script>';
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
                        <h1 class="page-head-line">OTHER INSTITUTIONAL COURSE  </h1>
                    </div>
                </div>
                <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                          Course Enroll
                        </div>
                        <font color="green" align="center"><?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?></font>
                        <div class="panel-body">
                       <form name="email" method="post" enctype="multipart/form-data">
   <div class="form-group">
    <label for="institution">institution Name  </label>
    <input type="text" class="form-control" id="institution" name="institution"  placeholder="institution " required  />
  </div>

  <div class="form-group">
    <label for="mode">mode  </label>
    <select class="form-control" name="mode" required="required"> 
  <option value="live">live</option>
  <option value="online">online</option>
  <option value="video">video</option>
  </select>
  </div>   
  <div class="form-group">
    <label for=" session">session  </label>
    <select class="form-control" name="session" required="required"> 
  <option value="morning">morning</option>
  <option value="afternoon">afternoon</option>
  <option value="evening">evening</option>
  </select>
  </div>   

<div class="form-group">
    <label for="mobile">mobile  </label>
    <input type="mobile" class="form-control" id="mobile" name="mobile" placeholder="mobile "required />
  </div>



<div class="form-group">
    <label for="email">email
  </label>
  <input type="email" class="form-control" id="email" name="email" placeholder="email "required />

  </div> 


<div class="form-group">
    <label for="lecture">lecturer name  </label>
    <input type="lecture" class="form-control" id="lecture" name="lecture" placeholder="lecture "required />

  </div>  

<div class="form-group">
    <label for="location">location </label>
    <input type="location" class="form-control" id="location" name="location" placeholder="location "required />
   </div>


<div class="form-group">
    <label for="course">course  </label>
    <input type="course" class="form-control" id="course" name="course" placeholder="course" required />
  </div>
  
  <div class="form-group">
    <label for="seats">seats  </label>
    <input type="seats" class="form-control" id="seats" name="seats" placeholder="seats "required />

  </div>



 <button type="submit" name="submit" id="submit" class="btn btn-default">create</button>
</form>
                            </div>
                            </div>
                    </div>
                    <font color="red" align="center"><?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?></font>
                <div class="col-md-12">
                    <!--    Bordered Table  -->
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
$sql=mysqli_query($con,"select * from courseenroll");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>


                                        <tr>
                                            <td><?php echo $cnt;?></td>
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
                                            <a href="edit_icourse.php?id=<?php echo $row['id']?>">
<button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button> </a>                                        
  <a href="instutional.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')">
                                            <button class="btn btn-danger">Delete</button>
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
    <script src="../assets/js/jquery-1.11.1.js"></script>
    <script src="../assets/js/bootstrap.js"></script>

</body>
</html>
<?php } ?>