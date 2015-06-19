/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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


