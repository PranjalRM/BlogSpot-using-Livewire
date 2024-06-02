<script>
function deletePost(postId) 
{
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            // Send an AJAX request to the delete route
            $.ajax({
                url: "{{ route('posts.delete', $post->id) }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    // Handle successful deletion
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your post has been deleted.",
                        icon: "success"
                    });
                    // Update the page or reload as needed
                },
                error: function(error) {
                    // Handle deletion errors
                    Swal.fire({
                        title: "Error!",
                        text: "Failed to delete post.",
                        icon: "error"
                    });
                }
            });
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            Swal.fire({
                title: "Cancelled",
                text: "Your post is safe :)",
                icon: "error"
            });
        }
    })
}
</script>
