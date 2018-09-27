<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/Location/include.php');

$userid = getAuthUserId($conn);

if(isset($_POST['ok'])) 
{ 

	$folder = $_SERVER['DOCUMENT_ROOT'] . '/Location/images/'; 
	$image = $_FILES['image']['name']; 
	$path = $folder . $image ; 
	$target_file=$folder.basename($_FILES["image"]["name"]);
	 
	$imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);

	$allowed=array('jpeg','png' ,'jpg'); $filename=$_FILES['image']['name']; 
	$ext=pathinfo($filename, PATHINFO_EXTENSION);

	if(!in_array($ext,$allowed) ) 
	{ 
		echo "Sorry, only JPG, JPEG, PNG & GIF  files are allowed.";
	}
	else
	{ 
		move_uploaded_file( $_FILES['image'] ['tmp_name'], $path); 
		$nom = $_POST['nom'];
		$typeobjet = $_POST['typeobjet'];
		$prix = $_POST['prix'];
		if(!isset($_POST['livraison'])){
			$livraison = '0';
		} else {
			$livraison = $_POST['livraison'];			
		}

		$commentaire = $_POST['commentaire'];

		$newObjet = new Objet(null, $nom, $typeobjet, $image, $prix, 1, $livraison, $commentaire, $userid);

		$newObjet->objetToDB($conn);
	} 
} 



/*$uploads_dir = "./images/";
$uploads_base = basename($_FILES['image']['name']);

$upload_idk=$uploads_dir.$uploads_base;
move_uploaded_file($_FILES["image"]["tmp_name"], $uploads_dir . $uploads_base);*/



//redirectObjet();


?>