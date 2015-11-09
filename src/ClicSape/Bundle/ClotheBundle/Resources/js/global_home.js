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