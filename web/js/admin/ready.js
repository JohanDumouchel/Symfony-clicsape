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
                filterList($('tbody'),url,filter,value);
            } else{
                $input.hide();
            }
        }
        
    });
    
    // Formulaire de recherche pour les list
    $('button#filterSelect').on("click",function(){
        $.dialog({
            title:'toto',
            content: "Etes-vous sûr de vouloir supprimer cette élément?<br><button type=\"button\" class=\"examplebutton\">I'm alive!</button>",
            onOpen: function(){
        console.log('after the modal is opened');
        // find the input element and attach events to it.
        // NOTE: `this.$b` is the jquery-confirm's content DIV.
        this.$b.find('button.examplebutton').click(function(){
            console.log('action');
        });
    },
    onClose: function(){
        console.log('before the modal is closed');
    },
    onAction: function(){
        console.log('Any of confirm or cancel was clicked');
    }
        });
        
    });
});