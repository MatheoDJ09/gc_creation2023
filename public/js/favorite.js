if($('.bt-like').length > 0 ){
    $('.bt-like').on("click", function(event){
        event.stopPropagation();
        let bt = $(this);
        let url = "";
        if($(this).hasClass('fa-regultar')){
            url = "/favorite";
        }else{
            url = "/remove-favorite";
        }

        // On récupere l'id
        let id = $(this).attr('data-id');
        // On récupere la requete ajax
        $.ajax({
            url:'/favorite',
            type: 'POST',
            data:{id: id},
        }).done(function(response){
            if($(bt).hasClass('fa-regular')){
            $(bt).removeClass('fa-regular');
            $(bt).addClass('fa-regular');
            }else{
                $(bt).removeClass('fa-solid');
                $(bt).addClass('fa-regular');
            }
        });
    });
}