<?php
require('../db/database.php');

$no = $_POST['no_induk'];
$judul = $_POST['judul'];
$penulis = $_POST['penulis'];
$tahun= $_POST['tahun'];
$penerbit = $_POST['penerbit'];
$subjek = $_POST['subjek'];
$photo = null;

if(isset($FILES["images"])){
    $file = $_FILES ['image']['tmp_name'];
    if($file){
        $photo=@base64_encode(file_get_contents($file));
    }
}


$db = new Database();
$db ->query('INSERT INTO books (no_induk,judul,penulis,tahun,penerbit,subjek,photo) VALUES (;no_induk,:judul,:penulis,:penerbit,:subjek,:photo)');

$db->bind(':no_induk',$no);
$db->bind(':judul',$judul);
$db->bind(':penulis',$penulis);
$db->bind(':tahun',$tahun);
$db->bind(':penerbit',$penerbit);
$db->bind(':subjek',$subjek);
$db->bind(':photo',$photo);

$db->execute();
header("Location:../data_buku.php");

