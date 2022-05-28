<?php
session_start();
if(!isset($_SESSION['username']))
{
    header("Location: login_session.php");
    exit;
}

$a = $_GET['q'];
$curl = curl_init();
$url = "https://www.thecocktaildb.com/api/json/v1/1/filter.php?a=" .$a;
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl);
echo($result);
curl_close($curl);

?>