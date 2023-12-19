<?php
session_start();

include("logindb.php");
if($_SERVER['REQUEST_METHOD'] == "POST")
{
  $Email = $_POST["email"];
  $Password = $_POST["pass"];
  $Newname = $_POST["newname"];
  $email= $_POST["newmail"];
  $password= $_POST["password"];

  if(!empty($email) && !empty(password) &&!is_numeric($email))
  {
    $query = "insert into form (email, pass, newname, newmail, password) values ('$Email, $Password, $Newname, $email, $password)";


    mysqli_query($con, $query);
    echo "<script type='text/javascript'> alert('successfully registered')</script>";


  }
  else
  {
    echo "<script type='text/javascript'> alert('please enter some valid information')</script>";

}
}
?>










