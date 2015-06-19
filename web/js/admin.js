/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function() {
    var $container = $('div#clicsape_bundle_clothebundle_category_sizes');
    var $lienAjout = $('<a href="#" id="ajout_size" class="btn">Ajouter une taille</a>');
    
    $container.append($lienAjout);
     // On ajoute un nouveau champ à chaque clic sur le lien d'ajout.
    $lienAjout.click(function(e) {
      ajouterSize($container);
      e.preventDefault(); 
      return false;
    });

    var index = $container.find(':input').length;

    function ajouterSize($container) {
      var $prototype = $($container.attr('data-prototype').replace(/__name__label__/g, 'Size' + (index+1))
                                                          .replace(/__name__/g, index));
      ajouterLienSuppression($prototype);
      $container.append($prototype);
      index++;
    }

    // La fonction qui ajoute un lien de suppression d'une catégorie
    function ajouterLienSuppression($prototype) {
      $lienSuppression = $('<a href="#" class="btn btn-danger">Supprimer</a>');
      $prototype.append($lienSuppression);
      $lienSuppression.click(function(e) {
        $prototype.remove();
        e.preventDefault(); 
        return false;
      });
    }
});

