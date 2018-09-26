
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
            var prix = $('#prix').val();
            var livraison;
            var commentaire = $('#commentaire').val();

            if($('#livraison').val() == null){
                livraison = '0';
            }
            else {
                livraison = $('#livraison').val();
            }

    		console.log(nom, typeobjet, image, prix, livraison, commentaire);

         	if(nom == '' || typeobjet == '' || image == '' || prix == '')
         	{
         		alert("Tous les champs n'ont pas été saisis");
         	}
         	else
         	{
                sendData(nom, typeobjet, image, prix, livraison, commentaire);
            }
    
	});

    function sendData(nom, typeobjet, image, prix, livraison, commentaire) {

            $.ajax({
                url: './create_object.php',
                dataType: 'json',
                type: 'post',
                async:false,
                data: {'nom':nom,'typeobjet':typeobjet,'image':image,'prix':prix,'livraison':livraison,'commentaire':commentaire},
                success: function(data) {
                    alert("Requête soumise");
                },
                error: function() {

                    alert('MDRRRRRRRRRRR !');
                    window.location.href = "./create_object.php";

                }
            });
    }
});


