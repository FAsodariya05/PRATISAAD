<?php
$userid=$_POST['uid'];
$passwd=$_POST['pass'];
if($userid=="zeelpbarot@gmail.com" && $passwd=="1234567890"){
    setcookie('uid',$userid);
    header("location: dashboard.php");
}else{
    echo "Wrong User id and Password.";
}
?>