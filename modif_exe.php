      
  <!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="style.css">

    <title>Modifier un exercice</title>
</head>

<body>
    <fieldset class="form-modif">
        <legend>Ajouter un exercice</legend>
    <form action="" method="post">

        <label >Titre</label>
        <input type="text"  name ="nouveau_titre" required>
        <br>
        <label >Auteur</label>
        <input type="text" name="nouveau_auteur" required>
        <br>
        <label>Date</label>
        <input type="date" name="nouveau_date" required>
        <br>
        <button type="submit" id="modifBtn">Modifier</button>

    </form>
   </fieldset>

</body>
</html>
<?php

require_once("connexion.php");

$id = (int) $_GET["id"];

if (isset($_POST["nouveau_titre"])) {

    $nouveau_titre = $_POST["nouveau_titre"];
    $nouveau_auteur = $_POST["nouveau_auteur"];
    $nouveau_date = $_POST["nouveau_date"];

    $sql = $conn->prepare(
        "UPDATE exercice
         SET titre = ?, auteur = ?, date_creation = ?
         WHERE id = ?"
    );

    $sql->execute([
        $nouveau_titre,
        $nouveau_auteur,
        $nouveau_date,
        $id
    ]);

  




}

?>
