
//Delete an entity and remove it 
function deleteEntity($button){
    $('.loader').show();
    var regex = new RegExp('(\\w+)?_(\\d+)');
    var result = $button.attr('data-entity').match(regex);    
    var url = setUrlAdmin('delete',result[1]);
    var $row = $button.closest("tr");
    $.ajax({
        url: url,
        type: 'POST',
        dataType : 'json',
        data: 'id='+result[2],
        success : function(result, statut){
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
//construct the url base from the current url
function setUrlAdmin(dest,entity){
    var url = window.location.href;
    var regex = new RegExp('(.*admin/)?');
    var result = url.match(regex);
    return result[1]+entity+'/'+dest;
}

//Initialyze multiple field in Symfony Form
function initMultiField(idContainer,idLinkAdd,entityWording){
    var $container = $('div#'+idContainer);
    var $linkAdd = $('<a href="#" id="add_' + idLinkAdd + '" class="btn">Ajouter une ' + entityWording + '</a>');
    $container.append($linkAdd);
     // On ajoute un nouveau champ à chaque clic sur le lien d'ajout.
    $linkAdd.click(function(e) {
      addPrototype($container,entityWording);
      e.preventDefault(); 
      return false;
    });
}

// Add a prototype of field to create an entity
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

// Add a button to remove multiple entity field
function addLinkRemove($prototype) {
    $lienSuppression = $('<button class="btn btn-danger">Supprimer</button>');
    $prototype.append($lienSuppression);
    $lienSuppression.click(function(e) {
        $prototype.remove();
        e.preventDefault(); 
        return false;
    });
}

// Check multiple entity field to add over a button "addLinkRemove" 
function checkMultiField(idContainer){
        $divs = $('div[id^='+idContainer+'_]');
        for(i = 0; i < $divs.length; i++)
            addLinkRemove($($divs[i]).parent("div"));
}

// Get entity list from a filter
function filterList($content,url,filter,value){
    $('.loader').show();
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

// Remove all filter and refresh list content
function refresh($content,url){
    $('.loader').show();
    request = $.ajax({
        url: url,
        type: 'POST'
    });    
    request.done(function(data){
       $content.html(data);
    });
    request.error(function(data){
        $content.html('aucun contenu trouvé');
    });
    request.complete(function(){
        $('.loader').hide();
    });
}

// add a filter paremeter  in a json object
function jsonParamFilter(filter,value){
    return param = $.parseJSON('{"filter" : {"'+filter+'" : "'+value+'"}}');
}

// Get entity list from a filter select
function filterJoinList($content,entity,entityJoin,data){
    $('.loader').show();
    var param = $.parseJSON('{"entityJoin":"' + entityJoin + '",' + '"data" :' + data + '}');
    url = 'filter';
    console.log(param);
    
    request = $.ajax({
        url: url,
        type: 'POST',
        dataType: 'html',
        data: param
    });    
    request.done(function(data){
       $content.html(data);
    });
    request.error(function(data){
        $content.html('aucun contenu trouvé');
    });
    request.complete(function(){
        $('.loader').hide();
    });
}

// Init a entity list of join entity to filter the list
function createSelectTable(url,$content){
    $('.loader-dialog').show();
    request = $.ajax({
        url: url,
        type: 'POST',
        dataType: 'html'
    });    
    request.done(function(data){
       $content.html(data);
    });
    request.error(function(data){
        $content.html('aucun contenu trouvé');
    });
    request.complete(function(){
        $('.loader-dialog').hide();
    });

}
