 <?php


$userName= $_POST['userName'];
$password=$_POST['password'];


 $conn= new mysqli("localhost","root","", "login");

 $query= mysqli_query($conn,"select * from user where userName= '$userName' and password = '$password'");

$rows = mysqli_num_rows($query);

if($rows == 1){
  header("Location:advanced.html");
}else{
  echo "name and password is invalid";

}
 mysqli_close($conn);



/*$userName= stripcslashes($userName);
$password= stripcslashes($password);

mysql_connect("localhost","root","", "login");


$result=mysql_query("select * from user where userName= '$userName' and password = '$password'") or die("fail to query databse".mysql_error());

$row= mysql_fetch_array($result);

if($row['userName']== $userName && $row['password'] == $password){
  echo "Login sucess !!!".$row['userName'];

}else{
  echo "failed to login";

} */
 ?>
