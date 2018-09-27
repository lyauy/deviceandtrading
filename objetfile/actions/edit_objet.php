<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/Location/include.php');

	$userid = getAuthUserId($conn);

	if(!isset($_POST['livraison'])){
			$livraison = '0';
		} else {
			$livraison = $_POST['livraison'];			
		}

	$idobj = trim($_POST['objSeria'],"/");
	$newObjet = new Objet(null, $_POST['nom'], $_POST['typeobjet'], null, $_POST['prix'], 1, $livraison, $_POST['commentaire'], $userid);

	$req = $conn->exec("UPDATE objet SET nom = '$newObjet->nom', typeobjet = '$newObjet->typeobjet', prix = '$newObjet->prix', disponibilite = '$newObjet->disponibilite', livraison = '$newObjet->livraison', id_user = '$newObjet->id_user', commentaire = '$newObjet->commentaire' WHERE id_objet = '$idobj'");
	header("Location: http://localhost/Location/objetfile/views/show_object_list.php");
?>