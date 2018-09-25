<div id="form_create_object">
<p>Déposer un objet</p>
<form id="create_objet" action="./create_object.php" method="post">
  <fieldset>
    <legend>Object information:</legend>
    Nom:<br>
    <input id="nom" type="text" name="nom">
    <br>
    Catégorie:<br>
    <select id="typeobjet" name="typeobjet">
        <option value="pc_portable">Ordinateur portable</option>
        <option value="smartphone">Smartphone</option>
        <option value="tablette">Tablette</option>
    </select>
    <br>
    Image:<br>
    <input type="file" id="image" name="image" accept="image/png, image/jpeg, image/jpg" />
    <br><br>
    Livraison possible:<br>
    <input type="checkbox" id="livraison" name="livraison" value="1" checked />
    <br>
    Nombre:<br>
    <input id="nombre" type="number" name="nombre">
    <br><br>
    Commentaire:<br>
    <textarea id="commentaire" rows="10" cols="50" id="commentaire" name="commentaire"></textarea>
    <br>
    <input id="envoyer" type="submit" value="Submit">
  </fieldset>
</form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="postjson.js"> </script>
</div>