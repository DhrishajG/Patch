<?php
include_once ("config.php");
$user=$_GET['username'];
$email=$_GET['email'];
$pwd=$_GET['pwd'];
$repwd=$_GET['repwd'];

$row=$link->query("select * from `user` where username='$user'");
/*check whether username is repeated*/
if ($row->rowCount()){
    $flag=1;/*username already exist*/
}else if ($pwd!=$repwd){
   $flag=2;/*passwords rntered are not same*/
}else{/*insert informations into database*/
	$hpwd=password_hash($pwd, PASSWORD_DEFAULT);
    $row=$link->exec("insert into`user`( `username`,  `pwd`,`email`) values ('$user','$hpwd','$email')");
    session_start();
    $_SESSION['username']=$user;
    $_SESSION['email']=$email;
    $flag=3;/*sign up successfully*/
}
echo $flag;