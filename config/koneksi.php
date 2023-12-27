<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$host="localhost"; 
$user="root"; 
$password=""; 
$database="ppob"; 
$conn=mysqli_connect($host,$user,$password,$database) or die(mysqli_error());
//cek koneksi 
if($conn){ 
//echo "berhasil koneksi"; 
}else{ 
echo "gagal koneksi"; 
} 
?>