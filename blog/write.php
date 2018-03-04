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
  
  $select=$_POST['select'];
  $head=$_POST['blog-head'];
  $content=$_POST['blog-content'];
  $file_name=time()+$_FILES['blog-img']['name'];
  //echo $select." ".$head." ".$content." ".$_FILES['blog-img']['tmp_name']." "."img/".$select."/".$file_name;
  session_start();
  if(move_uploaded_file($_FILES['blog-img']['tmp_name'],"img/".$select."/".$file_name))
  {
    $query="insert into `$select` (heading,content,image) values('$head','$content','$file_name')";
    if(mysqli_query($con,$query))
    {
    //  echo "Up;oaded";
      $_SESSION['status_upload']=1;
      header('location:main_user.php');
    }
    else
    {
      //echo "2";
      $_SESSION['status_upload']=0;
      header('location:main_user.php');
    }
  }
  else
  {
    echo "error";
  }

}
  
?>