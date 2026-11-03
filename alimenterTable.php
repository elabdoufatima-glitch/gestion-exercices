<?php 
try{
    require_once("connexion.php");
    }
   

catch(Exception $e){
    die("erreur :".$e->getMessage());
}

$titre= $_POST["titre"] ?? "";
$auteur= $_POST["auteur"] ?? "";
$date= $_POST["date"] ?? "";



$sql="INSERT INTO exercice (titre,auteur,date_creation)VALUES (?,?,?);";
$requet=$conn->prepare($sql);

$requet->execute([$titre,$auteur,$date]);
$resultat=$conn->query("SELECT MAX(id) FROM exercice;"); 
$dernier_id = $resultat->fetchColumn();



echo "<tr>";
        echo "<td>". $dernier_id ."</td>"  ;
        echo "<td>". $titre ."</td>"  ;
        echo "<td>". $auteur."</td>"  ;
        echo "<td>". $date."</td>"  ; 
        echo "<td>";
          echo "<a href='modif_exe.php?id=".$dernier_id."'>Modifier</a>";
       echo" <button  class='suppBtn' data-id='$dernier_id'>Supprimer</button>";
       echo"  </td>";
echo "</tr>" ; 



?>