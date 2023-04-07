function ouvrirForm() {
    window.scrollTo(0, 0); // retour en haut de la page quand la fonction est appeller
    document.getElementById("formCo").style.visibility = "visible"; // le formCo devient visible
    document.getElementById("flou").style.visibility = "visible"; // le flou devient visible
    document.body.style.overflow = "hidden"; // la barre de scroll devient cacher
}


// Dans cette fonction on inverse ce qu'il y a dans la fonction "ouvrirForm"
function fermerForm() {
    document.getElementById("formCo").style.visibility = "hidden";
    document.getElementById("flou").style.visibility = "hidden";
    document.body.style.overflow = "visible";
}