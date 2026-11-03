<?php
/*J'ai rencontré un problème lors de l'utilisation de la balise `<a>` 
pour supprimer un élément. En effet, lorsque je clique sur le lien de suppression, 
je suis automatiquement redirigée vers une autre page au lieu de rester sur la page actuelle. 
Malgré mes tentatives avec jQuery , je n'ai pas réussi à résoudre ce problème. 
C'est pourquoi j'ai choisi d'utiliser la balise `<button>` à la place de `<a>` 
afin d'effectuer la suppression tout en restant sur la même page.*/
require_once("connexion.php");
$id=$_POST["id"];
$sql=$conn->prepare("DELETE FROM exercice WHERE id=?;");
$sql->execute([$id]);




$resultat=$conn->query("SELECT *FROM exercice ;");

  echo " <tbody id='donnees'>";
while($exercice=$resultat->fetch(PDO::FETCH_ASSOC)){
    echo "<tr>";
        echo "<td>". $exercice["id"]  ."</td>"  ;
        echo "<td>". $exercice["titre"] ."</td>"  ;
        echo "<td>". $exercice["auteur"] ."</td>"  ;
        echo "<td>". $exercice["date_creation"] ."</td>"  ; 
        echo "<td>";
          echo "<a href='modif_exe.php?id=".$exercice["id"]."'>Modifier</a>";
      echo "  <button  class='suppBtn' data-id='".$exercice["id"]."'>Supprimer</button>";
       echo"  </td>";
        echo "</tr>" ; 
}
echo "</tbody>";



?>