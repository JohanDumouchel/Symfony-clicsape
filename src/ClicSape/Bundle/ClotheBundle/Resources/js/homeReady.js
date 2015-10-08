$(document).ready(function() {
    
    // Formulaire de recherche pour les list
    $('button#gender').on("click",function(){
        $(this).toggleClass('active');
        gender = $(this).attr("data-gender");
        $button = $(this);
        $list = $('div#content-list > ul > li');
        $activeButtons = $('button#gender.active');
        listGender = 'div#content-list > ul > li.' + gender ;
        
        if($(this).hasClass('active') && $('button#gender.active').length < 2) {
            $list.hide();
            $(listGender).show();
        } else if($activeButtons.length === 1 ) {
            $list.hide();
            othergender = $('button#gender.active').attr("data-gender");
            listGender = 'div#content-list > ul > li.' + othergender ;
            $(listGender).show();
        } else if($activeButtons.length === 2 ) {
            $list.hide();
            $(listGender).show();
            $activeButtons.each(function(){
                if($(this).get(0) !== $button.get(0)){
                    $(this).removeClass('active');
                }
            });
        } else {
            $('div#content-list > ul > li').show(); 
        }
    });    
    // 
    $('#menu-icon').on("click", function (e) {
        e.preventDefault();
        $('body').toggleClass('with-menu');
    });

    /* Je veux pouvoir masquer le menu si on clique sur le cache */
    $('#hide-site').on("click", function (e) {
        $('body').removeClass('with-menu');
    });
});
