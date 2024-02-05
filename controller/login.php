 <?php
session_start();
require('../db/database.php');

$db = new Database();


$username = $_POST['username'];
$password = $_POST['password'];
$db->query('SELECT * FROM admins WHERE username=:username AND password=MD5(:passwird)');
$db->bind('username',$username);
$db->bind('password',$password);
$admin = $db->single();
if(@$admin ){
    $_SESSION['username'] = $_SESSION['username'];
    $_SESSION['jk'] = $_SESSION['jk'];
    $_SESSION['status'] = $_SESSION['status'];
    $_SESSION['islogin'] =  true ;
    header("Location: ../index.php");

} else {
    header("Location:../login.php");
}