$servername="localhost:8000";
$username="root";
$password="";
$con=new mysqli($servername,$username,$password);
if($con->connect_error){
	die("connection failed".$con->connect_error);
}
alert("Connected!!");






