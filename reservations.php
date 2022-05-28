<?php
include 'dbconfig.php';
session_start();
if(!isset($_SESSION['username']))
{
    header("Location: login_session.php");
    exit;
}

$conn = mysqli_connect($dbconfig['host'],$dbconfig['user'],$dbconfig['password'],$dbconfig['name']) or die(mysqli_error($conn));
$query = "SELECT name,surname,email,nome_camera,n_camere_prenot,check_in,check_out,n_persone,prezzo_tot FROM booked_rooms JOIN users ON booked_rooms.user_id=users.id  WHERE user_id='".$_SESSION['user_id']."'";  
$res = mysqli_query($conn, $query) or die("Errore: ".mysqli_error($conn));
$elementi = array();

while($row = mysqli_fetch_object($res))
{
    $elementi[]= $row;
}
mysqli_free_result($res);
mysqli_close($conn);
echo json_encode($elementi);
?>