<?php

require_once("connexion.php");
$sql= "SELECT * FROM exercice ";
$resultat= $conn->query($sql);
$exercices=$resultat->fetchAll(PDO::FETCH_ASSOC);
 echo "<table id='tble'>
        <tr>
            <th>id</th>
            <th>titre</th>
            <th>auteur</th>
            <th>date_creation</th>
            <th>Action </th>

        </tr>";
        echo " <tbody id='donnees'>";
      
foreach($exercices as $exercice){
      echo "<tr>"; 
        echo "<td>". $exercice["id"] ."</td>"  ;
        echo "<td>". $exercice["titre"] ."</td>"  ;
        echo "<td>". $exercice["auteur"] ."</td>"  ;
        echo "<td>". $exercice["date_creation"] ."</td>"  ; 
        echo "<td>";
      
      echo "<a  href='modif_exe.php?id=".$exercice["id"]."'>Modifier</a>";
      echo "  <button  class='suppBtn' data-id='".$exercice["id"] ."'>Supprimer</button>";
      
       echo"  </td>";
        echo "</tr>" ; 
    
       
}   

echo "</tbody>";
 echo "</table>";
?>