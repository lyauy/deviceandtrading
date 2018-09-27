<div id="id01" class="modal">
  
  <form class="modal-content animate" action="http://localhost/Location/userfile/actions/action_page.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container">
      <label for="uname"><b>Adresse E-mail</b></label>
      <input class="FormCo" type="text" placeholder="Entrez votre adresse Email" name="email" required>

      <label for="psw"><b>Mot de passe</b></label>
      <input class="FormCo" type="password" placeholder="Entrez votre mot de passe" name="password" required>
  
      <button class="button" type="submit">Se connecter</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Se rappeler de moi
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="button cancelbtn">Cancel</button>
      <span class="psw">Nouvel utilisateur ? <a href="http://localhost/Location/userfile/views/create_user_form.php">S'inscrire</a></span>
    </div>
  </form>
</div>