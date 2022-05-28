<?php
include 'dbconfig.php';

if(!empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['username'])&& !empty($_POST['email'])
&& !empty($_POST['password'])&& !empty($_POST['password_confirm']))
{
    $error= array();
    $conn = mysqli_connect($dbconfig['host'],$dbconfig['user'],$dbconfig['password'],$dbconfig['name']) or die(mysqli_error($conn));
    
    if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $_POST['username']))
    {
        $error[] = "Username non valido";
    }
    else{
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $query = "SELECT username FROM users WHERE username='".$username."'";
        $res = mysqli_query($conn,$query);
        if(mysqli_num_rows($res) > 0)
        {
            $error[]= "Username già esistente";
        }
    }

    if(strlen($_POST['password']) < 8)
    {
        $error[] = "Caratteri password non sufficienti";
    }
    if(strcmp($_POST['password'], $_POST["password_confirm"]) != 0)
    {
        $error[] = "Le password non coincidono";
    } 

if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
    {
        $error[] = "Email non valida";
    } else {
        $email = mysqli_real_escape_string($conn, strtolower($_POST['email']));
        $res = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");
        if (mysqli_num_rows($res) > 0) {
            $error[] = "Email già utilizzata";
        }
    }

if(count($error) == 0)
    {
    $name= mysqli_real_escape_string($conn, $_POST['name']);
    $surname= mysqli_real_escape_string($conn, $_POST['surname']);
    $password= mysqli_real_escape_string($conn, $_POST['password']);
    $password = password_hash($password, PASSWORD_BCRYPT);
    
    $query = "INSERT INTO users(username, password, name, surname, email) VALUES('$username', '$password', '$name', '$surname', '$email')";
    
    if(mysqli_query($conn, $query)) {
       
        $_SESSION['username']= $_POST['username'];
        $_SESSION['user_id'] = mysqli_insert_id($conn);
        mysqli_close($conn);
        header("Location: login_session.php");
        exit;
    } else
        {
        $error[] = "Errore di connessione al database";
        }
    }
}
?>

<html>
    <head>
        <link rel='stylesheet' href='signup.css'>
        <script src='signup.js' defer></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Radio+Canada:wght@700&display=swap" rel="stylesheet">
    </head>
    <body>
        <main>
        <div id=container> 
            <div id='immagine'> <img src = https://i.pinimg.com/originals/f3/ce/eb/f3ceebbc677cf8e84479e7a3c7d57867.jpg></div>
            <div id='testo'> <h1>Benvenuto al Vaine</h1><br><p>Riempi i campi per iscriverti al sito</p></div>
            <div id='form'>
                <form name='signup' method='post'>
                    <p>
                        <span>Iscrizione</span>
                    </p>
                    <div class="name">
                        <label>Nome  <input type='text' name='name'></label>
                        <span class="sotto">Nome mancante</span>
                    </div>
                    <div class="surname">
                        <label>Cognome <input type='text' name='surname'></label>
                        <span class="sotto">Cognome mancante</span>
                    </div>    
                    <div class="username">
                        <label>Nome utente <input type='text' name='username'></label>
                        <span class="sotto">Nome utente non disponibile</span>
                    </div>
                    <div class="email">
                        <label>Email <input type='text' name='email'></label>
                        <span class="sotto">Indirizzo email non valido</span>
                    </div>
                    <div class="password">
                        <label> Password <input type='password' name='password'></label>
                        <span class="sotto">Inserisci almeno 8 caratteri</span>
                    </div>
                    <div class="password_confirm">
                        <label> Conferma Password <input type='password' name='password_confirm'></label>
                        <span class="sotto">Le password non coincidono</span>
                    </div>
                    <p>
                        <label>&nbsp;<input id='submit' type='submit' value="Registrati" ></label>
                    </p>
                    <div class="signup">Hai un account? <a href="login_session.php">Accedi</a>
                </form>
            <div>
        </div> 
        </main>
    </body>
</html>
