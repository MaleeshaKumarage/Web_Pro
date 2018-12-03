<?php

$userName= $_POST['userName'];
$email= $_POST['email'];
$password= $_POST['password'];
$designation= $_POST['designation'];
$linkedinUrl= $_POST['linkedinUrl'];

if(!empty($userName) || !empty($email) || !empty($password)|| !empty($designation)|| !empty($linkedinUrl)){
  $host= "localhost";
  $dbUsername="root";
  $dbPassword="";
  $dbname="signupdetails";

  //create a connections
$conn=new mysqli($host,$dbUsername,$dbPassword,$dbname);
if(mysqli_connect_error()){
  die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());

}else{
  $SELECT = "SELECT email from useraccounts where email=? Limit 1";
  $INSERT = "INSERT INTO useraccounts(userName,email,password,designation,linkedinUrl) values(?,?,?,?,?)";

//prepare statements
$stmt= $conn->prepare()$SELECT);
$stmt->bind_param("S",$email);
$stmt->execute();
$stmt->bind_result($email);
$stmt->store_result();
$rnum=$stmt->num-rows;

if($rnum==0){
  $stmt->close();
  $stmt=$conn->prepare($INSERT);
  $stmt->bind_param("sssss",$userName,$email,$password,$designation,$linkedinUrl);
  $stmt-> execute();
echo "New record insered sucessfully";
}else{
  echo "someone already resistered using this email";

}
$stmt->close();
$conn->close();

}


}
else{
  echo "All feilds are required";
  die();

}


 ?>
