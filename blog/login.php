<?php
$servername="localhost";
$username="root";
$password="";
$database="weblog";
$con=mysqli_connect($servername,$username,$password,$database);
if(!$con){
  die("connection failed".$con->connect_error);
}
else
{
  
  $email=$_POST['email'];
  $password=$_POST['password'];
  $query="select * from bloggers where email='$email' and password='$password'";
  $result=mysqli_query($con,$query);
  if(mysqli_num_rows($result)>0)
  {
    session_start();
    $row=mysqli_fetch_assoc($result);
    $_SESSION['id']=$row['id'];
    header('location:main_user.php');
  }
  else
  {
    echo "<script>
    alert('Wrong Email or Password!!Retry');
    </script>";
    header('location:main.php');
  }
  
}
?>