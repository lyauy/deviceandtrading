
   $(document).ready(function() {
        console.log( "ready!" );
        var $form = $('#create_objet'); 

        $('#envoyer').on('click', function() {
        $form.trigger('submit');
        return false;
    });
        $form.on('submit', function(){  
        var nom = $('#nom').val();
        var typeobjet = $('#typeobjet').val();
        var image = $('#image').val();
        var livraison = $('#livraison').val();
        var nombre = $('#nombre').val(); 
        var commentaire = $('#commentaire').val();
		
     	if(nom == '' || typeobjet == '' || image == '' || livraison == '' || nombre == '')
     	{
     		alert("Tous les champs n'ont pas été saisis");
     	}
     	else
     	{
            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: new FormData(this),
                dataType: 'json',
                cache : false,
                processData : false,
                contentType : false,
                success: function(data) {
                    alert("Requête soumise");
                },
                error: function() {
                    alert('Objet créé !');
                    window.location.href = "./Accueil.php";

                }
            });
        }
        return false;
    
	});
});


