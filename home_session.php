<?php
session_start();
if(!isset($_SESSION['username']))
{
    header("Location: login_session.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>HomeWork1</title>
        <link rel="stylesheet" href="home_session.css">
        <script src='home_session.js' defer></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Radio+Canada:wght@700&display=swap" rel="stylesheet">
    </head>
    <body>
        <header>
          <nav>
            <div class="sinistra"><a href= "http://localhost/hw1/home_session.php">Vaine </a></div>
            <div class="links">
                <a id="benvenuto"> Benvenuto <?php echo $_SESSION["username"]; ?>! 
                <a href="http://localhost/hw1/servizi.php">I nostri servizi</a>
                <a href='http://localhost/hw1/booking.php'>Prenota una camera</a>
                <a href= "http://localhost/hw1/reservation_page.php">Le tue prenotazioni</a>
                <a href="http://localhost/hw1/logout.php">Logout</a>
            </div>
            </nav>
        </header>
        <section id="prima">
            <div> </div>
            <div class="container"></div>
        </section>
        <section id="seconda">
            <div class="container">
                <div class="contenuto"> </div>
            </div>
        </section>
        <section id="terza">
            <div class="container_reversed">
                <div class="contenuto"> </div> 
            </div>
        </section>
        <section id="quarta">
            <div class="container">
                <div class="contenuto"> </div>
            </div>
        </section>
        <div id="overlay"> </div>
        <footer>
            <div class="links">
                <a href="http://localhost/hw1/servizi.php">I nostri servizi</a>
                <a href= "http://localhost/hw1/booking.php">Prenota una camera</a>
                <a href= "http://localhost/hw1/reservation_page.php">Le tue prenotazioni</a>
                <a href="http://localhost/hw1/logout.php">Logout</a>
            </div>
        </footer>
    </body>
</html>