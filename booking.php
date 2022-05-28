<?php
include 'dbconfig.php';

session_start();
if(!isset($_SESSION['username']))
{
    header("Location: login_session.php");
    exit;
}

if(!empty($_POST['camera']) && !empty($_POST['check-in']) && !empty($_POST['check-out'])&& !empty($_POST['persone']) && !empty($_POST['numero_camere']))
{
    $error= array();
    $conn = mysqli_connect($dbconfig['host'],$dbconfig['user'],$dbconfig['password'],$dbconfig['name']) or die(mysqli_error($conn));
    $query = "SELECT n_disponibili FROM rooms WHERE tipo='".$_POST['camera']."'";
    $query2 = "SELECT prezzo_€ FROM rooms WHERE tipo='".$_POST['camera']."'";
    $res = mysqli_query($conn,$query);
    $res2 = mysqli_query($conn, $query2);
    $row = mysqli_fetch_row($res2);

    if(mysqli_num_rows($res) > 0)
        {
        $camera = $_POST['camera'];
        $n_camere = $_POST['numero_camere'];
        $id = $_SESSION['user_id'];
        $check_in = $_POST['check-in'];
        $check_out = $_POST['check-out'];
        $n_persone = $_POST['persone'];
        $prezzo_tot = $row['0'] * $n_camere;
        
        $query3 = " INSERT INTO booked_rooms(nome_camera, n_camere_prenot, user_id, check_in, check_out, n_persone, prezzo_tot) VALUES ('$camera', '$n_camere', '$id', '$check_in', '$check_out', '$n_persone', $prezzo_tot)";
    
        if(mysqli_query($conn, $query3)) 
            {
            $query4 = "UPDATE rooms SET n_disponibili = n_disponibili - ' $n_camere' WHERE tipo='$camera'";
            mysqli_query($conn, $query4);
            mysqli_close($conn);
            header("Location: reservation_page.php");
            exit;
            } else
                {
                    $error[] = "Errore di connessione al database";
                    echo "<h1 style='color:red; position:absolute; top:20vh; left: 25vw;'>" . "Il numero di stanze selezionato per il tipo di camera non è disponibile!" . "</h1>";
                }
        } 
}
?>

<!DOCTYPE html>
<html>
    <head>
    <link rel='stylesheet' href='booking.css'>
    <script src='booking.js' defer></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Radio+Canada:wght@700&display=swap" rel="stylesheet">
    </head>
    <body>
        <header>
            <nav>
                <div class="sinistra"><a href= "http://localhost/hw1/home_session.php">Vaine </a></div>
                <div class="links">
                <a id="benvenuto">Prenota la tua camera </a> 
                <a href="http://localhost/hw1/servizi.php">I nostri servizi</a>
                <a href= "http://localhost/hw1/reservation_page.php">Le tue prenotazioni</a>
                <a href="http://localhost/hw1/logout.php">Logout</a>
                </div>
                </nav>
        </header>
        <section>
          <div class="container">
                <div class="titolo"> 
                    <h1> Le nostre camere </h1>
                </div>
                <div class="contenuto"> 
                    <h2> Benchmark </h2> <h3>A partire da €80 a notte </h3>
                    <p> Adatta per una persona, ma abbastanza spaziosa per due, la camera Benchmark dispone di un letto a una piazza e mezzo, armadio, una soffice poltrona e scrivania con sedia in legno. (5 camere in totale)</p>
                    <h2> The Sovereign </h2> <h3>A partire da €150 a notte </h3>
                    <p> Che siate una coppia o viaggiate da soli, The Sovereign vi aspetta per i vostri momenti di svago. Dispone di un morbido letto matrimoniale, mobili da cucina per due persone, comò, armadio e divano di velluto. (5 camere in totale) </p>
                    <h2> Diamond </h2> <h3>A partire da €300 a notte </h3>
                    <p> Con due letti matrimoniali che possono ospitare fino a quattro persone, la doppia standard è tutt'altro. Dispone di mobili da cucina per lavorare o pranzare/cenare, due armadi e un divanetto accogliente. (3 camere in totale)</p>
                    <h2> Aspire </h2> <h3>A partire da €200 a notte </h3>
                    <p> Disponiamo di tre diverse suite, ognuna con una camera da letto con letto matrimoniale, zona soggiorno separata, con set da pranzo e divano letto, ampio bagno con vasca idromassaggio e terrazza privata. (3 camere in totale) </p>
          </div>
    </section>
    <section class="booking">
        <div class="container2">
            <form name='booking' method='post' class="form">
                <div class="camera">
                    <label for="camera" class="input-label">Scegli la camera </label>
                    <select name="camera" class="options" id="camera">  
                        <option value=""> --Seleziona la camera-- </option>
                        <option value="Benchmark">Benchmark</option>
                        <option value="The Sovereign">The Sovereign</option>
                        <option value="Diamond">Diamond</option>
                        <option value="Aspire">Aspire</option>
                    </select>
                </div>
                <div class="check-in">
                    <label for="check-in" class="input-label">Check-in </label>
                    <input type="date" class="input" name="check-in">
                    <span class="sotto">Data errata</span>
                </div>
                <div class="check-out">
                    <label for="check-out" class="input-label">Check-out </label>
                    <input type="date" class="input" name="check-out">
                    <span class="sotto">Data errata</span>
                </div>
                <div class="persone">
                    <label for="persone" class="input-label">Persone </label>
                    <select class="options" name="persone" id="persone">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="8">8</option>
                        <option value="10">10</option>
                        <option value="12">12</option>
                    </select>
                    <span class="sotto">Controlla bene i numeri</span>
                </div>
                <div class="numero_camere">
                    <label for="numero_camere" class="input-label">Numero camere </label>
                    <select class="options" name="numero_camere" id="numero_camere">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    <span class="sotto">Controlla bene i numeri</span>
                </div>
                <p>
                    <label>&nbsp;<input id='submit' type='submit' value="Prenota" ></label>
                </p>
            </form>
        </div>
    </section>
    <footer>
    <span class="sinistra"><a href= "http://localhost/hw1/home_session.php">Vaine </a></span>
            <div class="links">
            <a href="http://localhost/hw1/servizi.php">I nostri servizi</a>
            <a href= "http://localhost/hw1/reservation_page.php">Le tue prenotazioni</a>
            <a href="http://localhost/hw1/logout.php">Logout</a>
        </div> 
    </footer>
</body>
</html>