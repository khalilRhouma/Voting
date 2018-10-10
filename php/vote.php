<?php

include("connection.php");


$idProjet = $_GET["projet"] ;
$idUser = $_GET['user'];

try{
   


    //get user active
    $sql2 = "select * from users WHERE id=".$idUser;
    $stmt2 = $conn->query($sql2);
    $user = $stmt2->fetch();

    //check if user isVoted
    if ($user["vote"]==0)
        {$isVoted =false;}
    else $isVoted =true ; 

if ($user && $isVoted==false){ 
    
    /*
    * TODO add session user validation 
    *
    */

    //add vote=1 
    $sql = "UPDATE users SET vote=1 , projet=".$idProjet.  " WHERE id=".$idUser;
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    //add votes ++ 
    $sql3 = "UPDATE projets SET votes=votes+1 WHERE id=".$idProjet;
    $stmt3 = $conn->prepare($sql3);
    $stmt3->execute();
     echo $stmt3->rowCount() . " records of projets UPDATED successfully";
}
else echo "you are voted !!";

    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>