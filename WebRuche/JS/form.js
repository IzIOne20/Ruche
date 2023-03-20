function ouvrirForm() {
    document.getElementById("formCo").style.visibility = "visible";
    document.getElementById("flou").style.visibility = "visible";
    document.body.style.overflow = "hidden";
}

function fermerForm() {
    document.getElementById("formCo").style.visibility = "hidden";
    document.getElementById("flou").style.visibility = "hidden";
    document.body.style.overflow = "visible";
}