
//Fonction pour supprimer une entity et sa ligne dans le tableau 
function deleteEntity($button){
    $('.loader').show();
    var regex = new RegExp('(\\w+)?_(\\d+)');
    var result = $button.attr('data-entity').match(regex);
    var url = 'delete';
    var $row = $button.closest("tr");
    $.ajax({
        url: url,
        type: 'POST',
        dataType : 'json',
        data: 'id='+result[2],
        success : function(result, statut){
            //gérer la gestion des droit admin
            $row.remove();
        },
        error : function(resultat, statut, erreur){
            alert('une erreur est survenue!');
        },
        complete : function(resultat, statut){
            $('.loader').hide();
        }
    });
}

//Fonction pour initialiser les champs multiple d'un formulaire
function initMultiField(idContainer,idLinkAdd,entityWording){
    var $container = $('div#'+idContainer);
    var $linkAdd = $('<a href="#" id="add_'+idLinkAdd+'" class="btn">Ajouter une '+entityWording+'</a>');
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

function checkMultiField(idContainer){
        $divs = $('div[id^='+idContainer+'_]');
        for(i = 0; i < $divs.length; i++)
            addLinkRemove($($divs[i]).parent("div"));
}

function filterList($content,url,filter,value){
    param = jsonParamFilter(filter,value);
    request = $.ajax({
        url: url,
        type: 'POST',
        data: param
    });    
    request.done(function(data){
       $content.html(data);
    });
    request.error(function(data){
        return 'Problem';
    });
    request.complete(function(){
        $('.loader').hide();
    });
}

function jsonParamFilter(filter,value){
    return param = $.parseJSON('{"filter" : {"'+filter+'" : "'+value+'"}}');
}

function getUrlFilter(entity){
    return '/admin/criteria/'+entity;
}