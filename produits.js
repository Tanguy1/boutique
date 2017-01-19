function filtrage(){
    alert('ok');
 $('#listeProduits').load('_ajaxFiltrerProd.php', $('form').serialize());   
}

$( function(){ //Exécuté qd tt doc est chargé
    
    $('#filtrer').click(filtrage);
} );