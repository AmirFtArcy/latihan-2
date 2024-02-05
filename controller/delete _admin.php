<?php
require("../db/datatbase.php");
$db = new Database();
$username = $_GET['username'];
$db->query('DELETE FROM admins WHERE username=:username');
$db-bind(':username',$username);
$db->execute();
header("Location:../data_admin.php");




?>