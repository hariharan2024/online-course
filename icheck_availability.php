<?php session_start();
require_once("includes/config.php");
if(!empty($_POST["cid"])) {
$cid= $_POST["cid"];
$cm= $_POST["cm"];
$regid=$_SESSION['login'];
		$result =mysqli_query($con,"SELECT course FROM 	icourseenroll WHERE course='$cid' and institution=' $cm'");
	$count=mysqli_num_rows($result);
if($count>0)
{
	$message[] = 'already added to cart!';
 echo "<script>$('#enroll').prop('disabled',true);</script>";
} 
else{
	$message[] = 'already added to cart!';
}
}
if(!empty($_POST["cid"])) {
	$cid= $_POST["cid"];
	
		$result =mysqli_query($con,"SELECT * FROM icourseenroll WHERE course='$cid'");
		$count=mysqli_num_rows($result);
		$result1 =mysqli_query($con,"SELECT Seats FROM icourseenroll WHERE id='$cid'");
		$row=mysqli_fetch_array($result1);
		$seat=$row['Seats'];
if($count>=$seats)
{
	echo '<script>alert(" nlvbblv !!")</script>';
	 echo "<script>$('#submit').prop('disabled',true);</script>";
} 
}

?>
