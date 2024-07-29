<?php
session_start();
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{
$id=intval($_GET['id']);
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );
if(isset($_POST['submit']))
{
$institution=$_POST['institution'];
$mode=$_POST['mode'];
$session=$_POST['session'];
$mobile=$_POST['mobile'];
$email=$_POST['email'];
$lecture=$_POST['lecture'];
$course=$_POST['course'];
$seats=$_POST['seats'];
$location=$_POST['location'];
$ret=mysqli_query($con,"update courseenroll set institution='$institution',mode='$mode',session='$session',email='$email',lecture='$lecture',mobile='$mobile',course='$course',seats='$seats',location='$location',updationDate='$currentTime' where id='$id'");
if($ret)
{
echo '<script>alert("Course Updated Successfully !!")</script>';
echo '<script>window.location.href=course.php</script>';
}else{
  echo '<script>alert("Error : Course not Updated!!")</script>';
echo '<script>window.location.href=course.php</script>';
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
    <title>Admin | Course</title>
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
                        <h1 class="page-head-line">Course  </h1>
                    </div>
                </div>
                <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                           Course 
                        </div>
<font color="green" align="center"><?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?></font>


                        <div class="panel-body">
                       <form name="dept" method="post">
<?php
$sql=mysqli_query($con,"select * from courseenroll where id='$id'");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>
<p><b>Last Updated at</b> :<?php echo htmlentities($row['updationDate']);?></p>
   <div class="form-group">
    <label for="institution">institution  </label>
    <input type="text" class="form-control" id="institution" name="institution" placeholder="" value="<?php echo htmlentities($row['institution']);?>" required />
  </div>

 <div class="form-group">
    <label for="mode">mode  </label>
    <input type="text" class="form-control" id="mode" name="mode" placeholder=" " value="<?php echo htmlentities($row['mode']);?>" required />
  </div>

<div class="form-group">
    <label for="session">session</label>
    <input type="text" class="form-control" id="session" name="session" placeholder=" " value="<?php echo htmlentities($row['session']);?>" required />
  </div>  

<div class="form-group">
    <label for="email">email  </label>
    <input type="text" class="form-control" id="email" name="email" placeholder=" " value="<?php echo htmlentities($row['noofSeats']);?>" required />
  </div> 

  <div class="form-group">
    <label for="lecture">lecture </label>
    <input type="text" class="form-control" id="lecture" name="lecture" placeholder=" " value="<?php echo htmlentities($row['noofSeats']);?>" required />
  </div>  

  <div class="form-group">
    <label for="mobile">mobile  </label>
    <input type="text" class="form-control" id="mobile" name="mobile" placeholder=" " value="<?php echo htmlentities($row['noofSeats']);?>" required />
  </div>  
  <div class="form-group">
    <label for="seats">Seats  </label>
    <input type="text" class="form-control" id="seats" name="seats" placeholder=" " value="<?php echo htmlentities($row['noofSeats']);?>" required />
  </div>  

  <div class="form-group">
    <label for="course">course </label>
    <input type="text" class="form-control" id="course" name="course" placeholder=" " value="<?php echo htmlentities($row['noofSeats']);?>" required />
  </div>  

  <div class="form-group">
    <label for="location">location  </label>
    <input type="text" class="form-control" id="location" name="location" placeholder=" " value="<?php echo htmlentities($row['noofSeats']);?>" required />
  </div>  

<?php } ?>
 <button type="submit" name="submit" class="btn btn-default"><i class=" fa fa-refresh "></i> Update</button>
</form>
                            </div>
                            </div>
                    </div>
                  
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
