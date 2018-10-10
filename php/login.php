<?php
// Start the session
session_start();
 if(isset($_SESSION['login'])){ //if login in session is not set
    header("Location: afficher_projets.php");
}

include("connection.php");
if (isset($_POST['email']) && isset($_POST['password']))
{
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ? ");
    $stmt->execute([$_POST['email']]);
    $user = $stmt->fetch();

    
    if ($user && $_POST['password']==$user['password'])
    {
        session_start();
        $_SESSION['login']="logedin";
        header("Location: afficher_projets.php");

    } else {
        echo "invalid";
    }
}
else {
    echo "all champs must be remplied !!!";
}


?>


