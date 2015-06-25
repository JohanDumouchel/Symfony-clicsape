/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function() {
    var $container = $('div#category_type_sizes');
    var $lienAjout = $('<a href="#" id="ajout_size" class="btn">Ajouter une taille</a>');
    
    $container.append($lienAjout);
     // On ajoute un nouveau champ à chaque clic sur le lien d'ajout.
    $lienAjout.click(function(e) {
      ajouterPrototype($container,'Size');
      e.preventDefault(); 
      return false;
    });
});

