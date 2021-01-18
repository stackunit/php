<?php
require_once 'config.php';
if(isset($_POST['login']))
{
   extract($_POST);
   $query="SELECT * FROM `student` WHERE `email`='$uemail' and `password`='$upass'";
   $data=mysqli_query($dbcon,$query);
   $res=mysqli_fetch_array($data);
   //print_r($res);
   if(empty($uemail) and empty($upass))
   {
       $msg="Please Enter <b>Email</b> Id And <b>Password</b>";
   }
   else if(empty($uemail))
   {
    $msg="Please Enter <b>Email</b> Id";
   }
   else if(empty($upass))
   {
    $msg="Please Enter <b>Password</b>";
   }
   else
   {
       if($res['email']==$uemail and $res['password']==$upass)
       {
           header("location:admin.php");
       }
   }
}
?>
<title>Contact App</title>
<form method="post">
    <p><input type="email" name="uemail" placeholder="Enter Email Id"></p>
    <p><input type="password" name="upass" placeholder="Enter Password"></p>
    <p><input type="submit" name="login" value="User Login"></p>
</form>
<p><?php echo @$msg;?></p>
