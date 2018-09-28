<?php include_once($_SERVER['DOCUMENT_ROOT'] . '/Location/include.php');

	 $objid = $_GET['id_objet'];
	 var_dump($objid);
	 $req = $conn->query("SELECT * FROM objet");
	 $objets = getObjet($req);

	 foreach ($objets as $objet){
	  if($objet->id_objet == $objid)
	      $req = $conn->exec("DELETE FROM objet WHERE id_objet = '$objid'");
	 }
	 
	
	header("location: http://localhost/Location/objetfile/views/show_object_list.php"); 
?>