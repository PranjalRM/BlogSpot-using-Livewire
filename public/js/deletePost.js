window.addEventListener('deleteConfirmation', event => {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, Delete"
      }).then((result) => {
        if (result.isConfirmed) {
            Livewire.dispatch('deleteConfirmed')
        }
      })
});

window.addEventListener('postDeleted', event => {
    Swal.fire(
        "Deleted!",
        "Your file has been deleted.",
        "success"
      )
});
