<div id="form_create_object">
<p>Déposer un objet</p>
<form action="./create_object.php" method="post">
  <fieldset>
    <legend>Object information:</legend>
    Nom:<br>
    <input type="text" name="nom">
    <br>
    Catégorie:<br>
    <select name="typeobjet">
        <option value="pc_portable">Ordinateur portable</option>
        <option value="smartphone">Smartphone</option>
        <option value="tablette">Tablette</option>
    </select>
    <br>
    Image:<br>
    <input type="file" id="image" name="image" accept="image/png, image/jpeg" />
    <br><br>
    Livraison possible:<br>
    <input type="checkbox" id="livraison" name="livraison" value="livraison" checked />
    <br>
    Nombre:<br>
    <input type="number" name="nombre">
    <br><br>
    Commmentaire:<br>
    <textarea rows="10" cols="50" id="commentaire" name="commentaire"></textarea>
    <br>
    <input type="submit" value="Submit">
  </fieldset>
</form>

</div>