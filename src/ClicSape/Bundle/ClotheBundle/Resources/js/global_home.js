/* 
 * 
 * 
 * Author     : Johan Dumouchel
 */
function ajoutParamHref($a,text){
    if( $a.attr('href') !== undefined ){
        href = $a.attr('href');
        $a.attr('href', href + '/' + text );
    }
}
function removeParamHref($a){
    if( $a.attr('href') !== undefined ){
        var regex = new RegExp('(.*)/(\\d*)$');
        var result = $a.attr('href').match(regex);
        $a.attr('href',result[1]);
        console.log(result[1]);
    }
}