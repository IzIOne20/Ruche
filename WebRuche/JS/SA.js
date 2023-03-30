let formValide = false; // définit sur false pour empêcher le form de se validé

function confirmationdeconnexion(){

    Swal.fire({
        title: 'Etes vous sur de vouloir vous déconnecter ?',
        text: "Vous allez être déconnecté",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'me déconnecter',
        cancelButtonText: 'Non'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.replace('deconnexion.php');
        }
      })
}

function confirmationSupprUser(form)
{
  Swal.fire({
    title: 'Voulez vous vraiment supprimer cet utilisateur ?',
    text: "Vous ne pourrez pas revenir en arrière",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    cancelButtonText: 'Non revenir en arrière',
    confirmButtonText: 'Oui, Supprimer'
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire(
        'Supprimer !',
        'utilisateur bien supprimer.',
        'success'
      ).then(function() { // fonction qui attend qu'on clique sur 'ok' pour éxécuter le formulaire
        formValide = true; // on passe sur 'true' pour autoriser le form à s'éxécuter
        form.submit(); // on éxécute le form
      });
    }
  })
}