$(document).ready(function() {

    // Charger le tableau
    $.post("tableinitiale.php", function(reponse) {
        $("#tableDiv").html(reponse);
    });

// alimenter 
  alimenter();

    // Supprimer
    $(document).on("click", ".suppBtn", function() {

        let id = $(this).data("id");

        let choix = confirm("Voulez-vous vraiment supprimer cet élément ?");

        if (choix == true) {
            $.post("supp_exe.php", {id: id}, function(rep) {
                $("#donnees").replaceWith(rep);
            });
        }
    });
  $(document).on("click", "a", function() {
      $.post("tableinitiale.php", function(reponse) {
        $("#tableDiv").html(reponse);
    });
    });
});
   


function alimenter(){
$("#btn").click(function(){
   let titre = $("#titre").val();
    let auteur = $("#auteur").val();
    let date = $("#date").val();
   $.post("alimenterTable.php",{titre: titre , auteur :auteur,date:date  },function(rep){
      $("#donnees").append(rep);

   }); 

      

});
}; 


