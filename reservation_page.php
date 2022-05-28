<?php
include 'dbconfig.php';
session_start();
if(!isset($_SESSION['username']))
{
    header("Location: login_session.php");
    exit;
}
$conn = mysqli_connect($dbconfig['host'],$dbconfig['user'],$dbconfig['password'],$dbconfig['name']) or die(mysqli_error($conn));
$query = "SELECT name,surname FROM users JOIN booked_rooms ON user_id WHERE user_id='".$_SESSION['user_id']."'";  
$res = mysqli_query($conn, $query);

if(mysqli_num_rows($res) === 0) {
    echo "<h1 style='color:red; position:absolute; top:30vh; left:30vw;'>" . "Non risultano prenotazioni a tuo nome!" . "</h1>";
}
    mysqli_free_result($res);
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="reservation_page.css">
        <script src='reservation_page.js' defer></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Radio+Canada:wght@700&display=swap" rel="stylesheet">
    </head>
    <body>
        <header>
          <nav>
            <div class="sinistra"><a href= "http://localhost/hw1/home_session.php">Vaine </a></div>
            <div class="links"> 
                <a class="centro">Le tue prenotazioni</a>
                <a href= "http://localhost/hw1/booking.php">Prenota una camera</a>
                <a href="http://localhost/hw1/logout.php">Logout</a>
            </div>
            </nav>
        </header>
        <section id="prima">
        </section>
        <footer>
            <span class="sinistra"><a href= "http://localhost/hw1/home_session.php">Vaine </a></span>
            <div class="links">
                <a href= "http://localhost/hw1/booking.php">Prenota una camera</a>
                <a href="http://localhost/hw1/logout.php">Logout</a>
            </div>
        </footer>
    </body>
</html>