<?php

include("connection.php");


if(!empty($_POST['team']))
    $team = $_POST['team'] ;
else $team="team5";

if(!empty($_POST['nomProjets']))
    $nomProjets = $_POST['nomProjets'] ;
else $nomProjets="projet5";

if(!empty($_POST['description']))
    $description = $_POST['description'] ;
else  $description="qjhd kjqjskdh jqkjkhdjkshkj dq";


try{
$sql = "INSERT INTO projets VALUES ( '','$nomProjets' ,'$team', '$description','')";
// use exec() because no results are returned
$conn->exec($sql);
echo "New record created successfully";
}
catch(PDOException $e)
{
echo $sql . "<br>" . $e->getMessage();
}

//close connection
$conn = null;
?>