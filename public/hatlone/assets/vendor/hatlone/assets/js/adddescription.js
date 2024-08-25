$(document).ready(function() {
    $('#descriptionForm').submit(function(event) {
        event.preventDefault(); // Prevent form submission

        var currentContainer = $('.description-container');

        // Serialize form data
        var formData = $(this).serialize();

        // Send AJAX request
        $.ajax({
            url: '/user/save_description',
            type: 'POST',
            data: formData,
            success: function() {
              
                // Clear form fields
                // $('#descriptionForm')[0].reset();  
                // Show success message
                $('#successModal').modal('show');
            },
            error: function() {
                // Show error message
                alert('An error occurred while submitting the form!');
            }
        });
    });
});