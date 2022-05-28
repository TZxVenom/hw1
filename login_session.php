<?php
include 'dbconfig.php';
session_start();
if(!empty($_POST['username']) && !empty($_POST['password']))
{
    $conn = mysqli_connect($dbconfig['host'],$dbconfig['user'],$dbconfig['password'],$dbconfig['name']) or die(mysqli_error($conn));
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $query = "SELECT id, username, password FROM users WHERE username='$username'";
    $res = mysqli_query($conn,$query);
    if(mysqli_num_rows($res) > 0)
    {
        $entry = mysqli_fetch_assoc($res);

        if (password_verify($_POST['password'], $entry['password']))
        {
            $_SESSION['username']= $entry['username'];
            $_SESSION['user_id'] = $entry['id'];
            header("Location: home_session.php");
            mysqli_free_result($res);
            mysqli_close($conn);
            exit;
        }
    }

    echo "<h1 style='color:red; position:absolute; top:20vh; left: 25vw;'>" . "Username e/o password errati!" . "</h1>";
}
    else if (isset($_POST["username"]) || isset($_POST["password"])) {
    $error = "Inserisci username e password.";
}
?>

<html>
    <head>
        <link rel='stylesheet' href="login_session.css">
        <script src='login_session.js' defer></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Radio+Canada:wght@700&display=swap" rel="stylesheet">
    </head>
    <body>
        <main>
        <div id=overlay> <span id="benvenuto">Bentornato!</span> <br> Inserisci le tue credenziali per accedere al sito
        </div>
            <form name='login_form' method='post'>
            <p>
                    <span>Login</span>
            </p>    
            <div class="username">
                    <label>Username <input type='text' name='username'></label>
            </div>
            <div class="password">
                    <label>Password <input type='password' name='password'></label>
            </div>
            <p>
                <label>&nbsp;<input id='submit' type='submit' value='Accedi'></label>
            </p>
            <div class="signup">Non hai un account? <a href="signup.php">Iscriviti</a>
            </form>
        </main>
    </body>
</html>
