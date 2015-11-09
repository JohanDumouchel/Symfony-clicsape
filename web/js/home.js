/* 
 * Fonction global 
 * 
 * Author     : Johan Dumouchel
 */

/*
 * function to init gender buttons.
 * 
 * get the gender activated and 
 * change the category menu and links.
 * 
 */
function initMenu(button){
    if(button.hasClass('active')){
        //data of the selected gender
        gender = button.attr("data-gender");
        idGender = button.attr("data-id");
        list = 'div#content-list > ul > li';
        listGender = list + '.' + gender ;

        $(list).hide();
        $(listGender).show();
        $(list + ' a').each(function(){
            ajoutParamHref($(this),idGender);
        });
    }
}
/*
 * Add a text to a link
 */
function ajoutParamHref($a,text){
    if( $a.attr('href') !== undefined ){
        href = $a.attr('href');
        $a.attr('href', href + '/' + text );
    }
}
/*
 * Remove the last parameter of link 
 */
function removeParamHref($a){
    if( $a.attr('href') !== undefined ){
        var regex = new RegExp('(.*)/(\\d*)$');
        var result = $a.attr('href').match(regex);
        $a.attr('href',result[1]);
        console.log(result[1]);
    }
}
/* 
 * Javascript Home
 * 
 * Author     : Johan Dumouchel
 */
$(document).ready(function() {
    
    // nav gender button init
    $('button#gender').each(function(){
        initMenu($(this));
    });
    
    // nav gender button handle
    $('button#gender').on("click",function(){
        $(this).toggleClass('active');
        //data of the selected gender
        gender = $(this).attr("data-gender");
        idGender = $(this).attr("data-id");
        $button = $(this);
        list = 'div#content-list > ul > li';
        $activeButtons = $('button#gender.active');
        listGender = list+'.' + gender ;
        
        // this gender become active 
        if($(this).hasClass('active') && $('button#gender.active').length < 2) {
            $(list).hide();
            $(listGender).show();
            $(list + ' a').each(function(){
                ajoutParamHref($(this),idGender);
            });
        } else if($activeButtons.length === 2 ) {
            // this gender become active and we have to desactive the other
            $(list).hide();
            $(listGender).show();
            $(list + ' a').each(function(){
                removeParamHref($(this));
                ajoutParamHref($(this),idGender);
            });
            $activeButtons.each(function(){
                if($(this).get(0) !== $button.get(0)){
                    $(this).removeClass('active');
                }
            });
        } else {
            $(list).show();
            $(list + ' a').each(function(){
                removeParamHref($(this));
            });
        }
    });    
    // 
    $('#menu-icon').on("click", function (e) {
        e.preventDefault();
        $('body').toggleClass('with-menu');
        $('body').toggleClass('scrollY');
    });

    /* Je veux pouvoir masquer le menu si on clique sur le cache */
    $('#hide-site').on("click", function (e) {
        $('body').removeClass('with-menu');
    });
    
    if($('.menu-list').attr('data-gamme') !== undefined){
        $aMenu = $('.menu-list').find('a');
        $idGamme = $('.menu-list').attr('data-gamme');
        $aMenu.on("click",function(e){
            e.preventDefault();
            href = $(this).attr('href') + '?idGamme=' + $idGamme ;
            window.location.href = href ;
        });
    }
    
});
