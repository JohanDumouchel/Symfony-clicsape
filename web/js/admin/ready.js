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
            text: "Etes-vous sûr de vouloir supprimer cette élément?",
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
                $('.loader').show();
                console.log(url);
                $request = redirectFilter(url,filter,value);
                console.log($request);
//                $request.success(function(data){
//                    
//                });
//                $request.complete(function(){
//                    console.log('complet');
//                    $('.loader').hide();
//                });
//                $table = $content.find('div#admin-body > tbody');
//                console.log($table);
            } else{
                $input.hide();
            }
        }
        
    });
});