<?php
session_start();
error_reporting(0);
include("includes/config.php");
if(isset($_POST['submit']))
{
    $regno=$_POST['regno'];
    $password=md5($_POST['password']);
$query=mysqli_query($con,"SELECT * FROM students WHERE StudentRegno='$regno' and password='$password'");
$num=mysqli_fetch_array($query);
if($num>0)
{
$_SESSION['login']=$_POST['regno'];
$_SESSION['id']=$num['studentRegno'];
$_SESSION['sname']=$num['studentName'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
$log=mysqli_query($con,"insert into userlog(studentRegno,userip,status) values('".$_SESSION['login']."','$uip','$status')");
header("location:http:change-password.php");
}else{
$_SESSION['errmsg']="Invalid Reg no or Password";
header("location:http:index.php");
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

    <title>Student Login</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <style>
    .hero {
        position: relative;
        height: 100vh;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .hero::before {
          content: "";
background-image: url('assets/img/ind.jpg');
          background-size: cover;
          position: absolute;
          top: 0px;
          right: 0px;
          bottom: 0px;
          left: 0px;
          opacity: 0.3;
    }

    body{
      position: relative;

        background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    }
     .center {
  margin: auto;
  width: 60%;
  border: 3px ;
  padding: 10px;
  }
        </style>
</head>
<body >
    <?php include('includes/header.php');?>

<section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                             <li><a href="index1.php">Home </a></li>
                             <li><a href="admin/">Admin Login </a></li>
                              <li><a href="index.php">Student Login</a></li>


                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <div class="hero">
        <div class="content-wrapper ">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">welcome to online course regestration</h4>

                </div>

            </div>
             <div class="center">
                <div class="col-md-12">
                                <div class="alert alert-info">
                       
                      

                         <strong> Latest News / Updates</strong>
                         <marquee direction='up'  scrollamount="2" onmouseover="this.stop();" onmouseout="this.start();">
                        <ul>
                            <?php
$sql=mysqli_query($con,"select * from news");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>
                            <li>
                              <a href="news-details.php?nid=<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['newstitle']);?>-<?php echo htmlentities($row['postingDate']);?></a>
                            </li>
                           <?php } ?>

                        </ul>
                    </marquee>

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
    <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
</body>
</html>
