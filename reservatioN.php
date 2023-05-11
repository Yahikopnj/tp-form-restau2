<?php


//recup valeur form
// // $nom =$_POST["nom"];
// $prenom =$_POST["prenom"];
$email =$_POST["mail"];
$mdp =$_POST["mdp"];
$date =$_POST["date"];
// $age =$_POST["age"];
$tel =$_POST["tel"];
// $adresse =$_POST["adresse"];
// $cpltadresse =$_POST["cpltadresse"];
// $postal =$_POST["postal"];
$time = $_POST["time"];
$perso = $_POST["personne"];
$terrasse = $_POST["terrasse"];
$terrasse = (int)$terrasse;
// var_dump($terrasse);
//connexion bdd
$host = "localhost";
$dbname= "restaurantform";
$port="3306";


$addresseDeLaBdd = "mysql:host=".$host.";dbname=".$dbname.";port=".$port.";charset=utf8";

if ($terrasse == "interieur"){
    $terrasse = false;
    } else{
      $terrasse = true;
    }

try{
    //essaie de te connecter en utilisant PDO
    $connexion = new PDO($addresseDeLaBdd, "root","");

    //prepapre ma requete pour inserer donnée
    $requete = $connexion->prepare("INSERT INTO reservation (`mail`, `mdp`, `tel`, `date`,
    `heure`, `personne`,`terasse`)

     VALUES ( ?, ?, ?, ?, ?,?,?)");

    //remplace les ? de la requete par la valeur de chaque variable
    $requete->bindParam(1, $email);
    $requete->bindParam(2, $mdp);
    $requete->bindParam(3, $tel);
    $requete->bindParam(4, $date);
    $requete->bindParam(5, $time);
    $requete->bindParam(6, $perso);
    $requete->bindParam(7, $terrasse);
    // $requete->bindParam(7, $tel);

    //execute la requete
    $requete->execute();
}catch(PDOException $exception){
    echo $exception->getMessage();
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>réservation</title>
    <link rel="stylesheet" href="reservAtIoN.css">
</head>
<body>
    <div id="divphpp">
        <p id="phpb">
            Votre <span class="res">réservation</span> est validé avec <span class="res">succès !</span>
        </p>
    </div>
</body>
</html>