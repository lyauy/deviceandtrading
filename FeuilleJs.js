// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

  document.getElementById("Deconnexion").onclick = function () {
        alert('Déconnexion de votre session');
    };