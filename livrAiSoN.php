<?php


//recup valeur form

$email =$_POST["mail"];
$mdp =$_POST["mdp"];
$adresse =$_POST["adresse"];
$tel =$_POST["tel"];
$heure = $_POST["heure"];
$complement = $_POST["complement"];
$postal = $_POST["postal"];
$ville = $_POST["ville"];
$plat = $_POST["plat"];



//connexion bdd
$host = "localhost";
$dbname= "restaurantform";
$port="3306";


$addresseDeLaBdd = "mysql:host=".$host.";dbname=".$dbname.";port=".$port.";charset=utf8";

// if ($terrasse == "interieur"){
//     $terrasse = false;
//     } else{
//       $terrasse = true;
//     }

try{
    //essaie de te connecter en utilisant PDO
    $connexion = new PDO($addresseDeLaBdd, "root","");

    //prepapre ma requete pour inserer donnée
    $requete = $connexion->prepare("INSERT INTO livraison (`mail`, `mdp`, `adresse`, `complement`,
    `postal`, `ville`,`plat`,`tel`,`heure`)

     VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    //remplace les ? de la requete par la valeur de chaque variable
    $requete->bindParam(1, $email);
    $requete->bindParam(2, $mdp);
    $requete->bindParam(3, $adresse);
    $requete->bindParam(4, $complement);
    $requete->bindParam(5, $postal);
    $requete->bindParam(6, $ville);
    $requete->bindParam(7, $plat);
    $requete->bindParam(8, $tel);
    $requete->bindParam(9, $heure);
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
    <title>Votre commande</title>
    <link rel="stylesheet" href="livraisoN.css">
</head>
<body id="bodyphp">
    <div id="divphp">
<p id="pphp">Félicitation votre commande est en préparation</p>
    </div>
    <script src="./livraiSoN.js"></script>
</body>
</html>