/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function() {
    //Initialisation de la page :
    //On cache la div chargement
    $('.loader').hide();
    //On ajoute la suppression d'une entity dans les list avec un dialog
    $('button#delete').on( "click",function(){
        $this = $(this);
        $.confirm({
            title: false,
            keyboardEnabled: true,
            content: "Etes-vous sûr de vouloir supprimer cette élément?",
            confirm: function() {
                deleteEntity($this);
            },
            cancel: function() {
                // nothing to do
            }
        });
    });
    
    $('button#delete').on( "click",function(){
        $this = $(this);
        $.confirm({
            title: false,
            keyboardEnabled: true,
            content: "Etes-vous sûr de vouloir supprimer cette élément?",
            confirm: function() {
                deleteEntity($this);
            },
            cancel: function() {
                // nothing to do
            }
        });
    });
    
    // Formulaire de recherche pour les list
    $('button#filter').on("click",function(){
        $input = $(this).prev();  
        if($input.is(':hidden')){
            $input.show();
        } else {
            if($input.val() !== ''){
                url = $input.attr('data-url');
                filter = $input.attr('data-filter');
                value = $input.val();
                filterList($('tbody'),url,filter,value);
            } else{
                $input.hide();
            }
        }
        
    });
    
    // Formulaire de recherche pour les list
    $('button#refresh').on("click",function(){
        refresh($('tbody'),$(this).attr('data-url'));        
    });
    
    // Formulaire de recherche pour les list
    $('button#filterSelect').on("click",function(){
        url = $(this).attr('data-url');
        entity = $(this).attr('data-entity');
        entityJoin = $(this).attr('data-entity-join');
        $.alert({
            title:'Filtre',
            content: '<div class="loader-dialog"></div><table class="table table-hover table-select" ></table>',
            onOpen: function(){
                $table = this.$b.find('.table');
                createSelectTable(url,$table);
            },
            onClose: function(){
                
            },
            onAction: function(){
                
            },
            confirmButton: 'Recherche',
            confirm: function(){
                console.log('confirm');
                $inputs = this.$b.find('input:checked');
                if($inputs){
                    var data = '[';
                    $inputs.each(function(index,element){
                        console.log(index);
                        console.log(element);
                        val = $(element).attr('value');
                        if(index === 0){
                            data +='"'+ val+'"';
                        } else {
                            data += ',"'+ val+'"' ;
                        }
                    });
                    data += ']';
                    console.log(data);
                    filterJoinList($('tbody'),entity,entityJoin,data);
                }
            }
        });
        
    });
});