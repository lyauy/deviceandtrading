<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/Location/include.php');

	$userid = getAuthUserId($conn);

	if(!isset($_POST['livraison'])){
			$livraison = '0';
		} else {
			$livraison = $_POST['livraison'];			
		}

	$idobj = trim($_POST['objSeria'],"/");
	var_dump($idobj);
	$newObjet = new Objet(null, $_POST['nom'], $_POST['typeobjet'], null, $_POST['prix'], 1, $livraison, $_POST['commentaire'], $userid);
	var_dump($newObjet);

/*	$req = $conn->exec("UPDATE objet SET nom = '$newObjet->nom', typeobjet = '$newObjet->typeobjet', prix = '$newObjet->prix', disponibilite = '$newObjet->disponibilite', livraison = '$newObjet->livraison', id_user = '$newObjet->id_user', commentaire = '$newObjet->commentaire' WHERE id_objet = '$idobj'");*/

		$req = $conn->prepare("UPDATE objet SET nom = ?, typeobjet = ?, prix = ?, disponibilite = ?, livraison = ?, id_user = ?, commentaire = ? WHERE id_objet = ?");
		
		$req->bindParam(1, $newObjet->nom);
		$req->bindParam(2, $newObjet->typeobjet);
		$req->bindParam(3, $newObjet->prix);
		$req->bindParam(4, $newObjet->disponibilite);
		$req->bindParam(5, $newObjet->livraison);
		$req->bindParam(6, $newObjet->id_user);
		$req->bindParam(7, $newObjet->commentaire);
		$req->bindParam(8, $idobj);


		$req->execute();



	header("Location: http://localhost/Location/objetfile/views/show_object_list.php");
?>