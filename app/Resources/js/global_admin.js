// Fonction qui ajoute les champs de saisie
function ajouterPrototype($container,entityWording) {
    // A faire : récupérer les div pour récupérer l'index
    var regexIndex = new RegExp($container.attr('id')+'_(\\d+)');
    //g -> global permet de récupérer plusieurs occurence
    var index = 1;
    var divs = $container.find('div');
    //boucle pour récupérer la plus haute valeur d'index de champs ajouter
    for (i = 0; i < divs.length; i++) {
        if($(divs[i]).attr('id')){
            if($(divs[i]).attr('id').match(regexIndex) !== null){
                result = $(divs[i]).attr('id').match(regexIndex);
                (result[1]>index)? index = result[1] : index;
                index++;
            }
        }
    }
    var $prototype = $($container.attr('data-prototype').replace(/__name__label__/g, entityWording)
                                                        .replace(/__name__/g, index));
    ajouterLienSuppression($prototype);
    $container.append($prototype);
    index++;
}
// La fonction qui ajoute un lien de suppression d'une catégorie
function ajouterLienSuppression($prototype) {
    $lienSuppression = $('<button class="btn btn-danger">Supprimer</button>');
    $prototype.append($lienSuppression);
    $lienSuppression.click(function(e) {
        $prototype.remove();
        e.preventDefault(); 
        return false;
    });
}


