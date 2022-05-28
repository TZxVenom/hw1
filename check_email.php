<?php
    include 'dbconfig.php';
    
    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
    $email = mysqli_real_escape_string($conn, $_GET["q"]);
    $query = "SELECT email FROM users WHERE email = '$email'";
    $res = mysqli_query($conn, $query);
    echo json_encode(array('exists' => mysqli_num_rows($res) > 0 ? true : false));
    mysqli_close($conn);
?>