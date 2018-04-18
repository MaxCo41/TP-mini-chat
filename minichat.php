

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mini-chat</title>
</head>
<body>
    <form action="minichat_post.php" method="POST">
        <label>Pseudo: <input type="text" name="name" value="name" id="name"></label>
            <br>
        <label>Message: <input type="text" name="message" value="Entrez votre message ici" id="message"></label>
            <br>
        <input type="submit" value="Envoyer">
    </form>

<?php
//Connexion à la base donnée
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','');
    
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
// Récupération des 10 derniers messages
$reponse = $bdd->query('SELECT name, message FROM user');

// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
while ($donnees = $reponse->fetch())
{
	echo '<p><strong>' . htmlspecialchars($donnees['name']) . '</strong> : ' . htmlspecialchars($donnees['message']) . '</p>';
}

$reponse->closeCursor();

?>
    
</body>
</html>