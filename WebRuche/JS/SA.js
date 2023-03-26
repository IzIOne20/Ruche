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