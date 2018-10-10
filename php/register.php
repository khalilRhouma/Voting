<?php
// Start the session
session_start();
 if(isset($_SESSION['login'])){ //if login in session is not set
    header("Location: afficher_projets.php");
}
?>

<?php

include("connection.php");


if ((!empty($_POST['nom'])) && (!empty($_POST['email'])) && (!empty($_POST['password'])) && (!empty($_POST['password2']))){

    if ( !($_POST['password']== $_POST['password2'])) 
    echo "passwords must be equals";
    /*
    * TODO some verification
    */

    
else {
    try{
        $nom = $_POST['nom'];
        $email =$_POST['email'];
        $password=$_POST['password'];
        $sql = "INSERT INTO users VALUES ('', '$nom' ,'$email', '$password', '', '', now())";
        // use exec() because no results are returned
        $conn->exec($sql);
        echo " sucesufly registred";
        }
        catch(PDOException $e)
        {
        echo $sql . "<br>" . $e->getMessage();
        }
}
}
   else {
       echo "all champs must be remplied";
   }
   


//close connection
$conn = null;
?>