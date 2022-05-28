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
    <link rel='stylesheet' href='servizi.css'>
    <script src='servizi.js' defer></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>HomeWork1</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Radio+Canada:wght@700&display=swap" rel="stylesheet">
    </head>
    <body>
        <header>
            <nav>
                <div class="sinistra"><a href= "http://localhost/hw1/home_session.php">Vaine </a></div>
                <div class="links">
                <a id="benvenuto"> I nostri servizi </a>
                <a href='http://localhost/hw1/booking.php'>Prenota una camera</a>
                <a href= "http://localhost/hw1/reservation_page.php">Le tue prenotazioni</a>
                <a href="http://localhost/hw1/logout.php">Logout</a>
                </div>
                </nav>
        </header>
        <section id="prima">
          <div class="container"> </div>
            <div class="text_container">
                <div class="contenuto1"> </div>
                <div class="contenuto2"> </div>
            </div>
        </section>
    <section id="seconda">
          <div class="container"> </div>
        <div class="text_container">
            <div class="contenuto1"> </div>
            <div class="contenuto2"> </div>
        </div>
    </section>
    <section id="terza">
          <div class="container">
         <h3>Inserisci qui la parola chiave 'Alcoholic' o 'Non_Alcoholic' per scoprire i nostri cocktail alcolici e analcolici migliori! </h3>
              <form name="form">
              <label> <input type='text' name='search'></label><input id="button" type='submit' value="Cerca" >
              </form>
            </div>
    </section>
    <footer>
    <span class="sinistra"><a href= "http://localhost/hw1/home_session.php">Vaine </a></span>
            <div class="links">
            <a href='http://localhost/hw1/booking.php'>Prenota una camera</a>
            <a href= "http://localhost/hw1/reservation_page.php">Le tue prenotazioni</a>
            <a href="http://localhost/hw1/logout.php">Logout</a>
        </div> 
    </footer>
</body>
</html>