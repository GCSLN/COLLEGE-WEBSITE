<?php

$uname = $_POST['uname'];
$newmail = $_POST['newmail'];
$pswd = $_POST['pswd'];





if (!empty($uname) || !empty($newmail) || !empty($pswd))
{

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "user";



// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
  $SELECT = "SELECT newmail From register Where newmail = ? Limit 1";
  $INSERT = "INSERT Into reg (uname , newmail ,pswd)values(?,?,?)";

//Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $newmail);
     $stmt->execute();
     $stmt->bind_result($newmail);
     $stmt->store_result();
     $rnum = $stmt->num_rows;

     //checking username
      if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sss", $uname, $newmail ,$pswd);
      $stmt->execute();
      echo "New record inserted sucessfully";
     } else {
      echo "Someone already register using this email";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>