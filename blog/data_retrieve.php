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
  $id=$_POST['id']; 
  $table=$_POST['table'];
  $query="select * from `$table` where `id`='$id'";
  $result=mysqli_query($con,$query);
  if(mysqli_num_rows($result)>0) 
  {
    $row=mysqli_fetch_assoc($result);
    $heading=$row['heading'];
    $content=$row['content'];
    $img=$row['image'];
    echo json_encode(
    array("head"=>$heading,"content"=>$content,"image"=>$img)
  );
  }
  else
  {
    echo json_encode(
    array("head"=>"DATA-MISSING","content"=>"DATA-MISSING","image"=>"missing.jpg")
    );
  }
}

?>