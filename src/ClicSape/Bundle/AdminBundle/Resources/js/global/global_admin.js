/*
 * Fonction initialisation du lien pour ajouter un élément 
 * de formulaire relié à une entitée et pouvant apparaitre plusieur ou zéro fois.
 * 
 */
$(document).ready(function() {
    //Initialisation de la page :
    //On cache la div chargement
    $('.loader').hide();
    //On ajoute la suppression d'une entity dans les list
    $('button#delete').on( "click",function(){
        $('.loader').show();
        var regex = new RegExp('(\\w+)?_(\\d+)');
        var result = $(this).attr('data-entity').match(regex);
        var url = 'delete';
        console.log(url);
        $.ajax({
            url: url,
            type: 'POST',
            dataType : 'json',
            data: 'id='+result[2],
            success : function(result, statut){
                console.log('success');
                console.log(result);
            },
            error : function(resultat, statut, erreur){
                console.log('error');
                $('.loader').hide();
            },
            complete : function(resultat, statut){
                console.log('ok');
                $('.loader').hide();
            }
        });
    });
    
    function initMultiField($idContainer,idLinkAdd,entityWording){
        var $container = $('div#'+$idContainer);
        var $linkAdd = $('<a href="#" id="add_'+idLinkAdd+'" class="btn">Ajouter une taille</a>');
        console.log($container,$linkAdd);
        $container.append($linkAdd);
         // On ajoute un nouveau champ à chaque clic sur le lien d'ajout.
        $linkAdd.click(function(e) {
          addPrototype($container,entityWording);
          e.preventDefault(); 
          return false;
        });
    }

    // Fonction qui ajoute les champs de saisie
    function addPrototype($container,entityWording) {
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
        addLinkRemove($prototype);
        $container.append($prototype);
        index++;
    }
    // La fonction qui ajoute un lien de suppression d'une catégorie
    function addLinkRemove($prototype) {
        $lienSuppression = $('<button class="btn btn-danger">Supprimer</button>');
        $prototype.append($lienSuppression);
        $lienSuppression.click(function(e) {
            $prototype.remove();
            e.preventDefault(); 
            return false;
        });
    }
    
});


