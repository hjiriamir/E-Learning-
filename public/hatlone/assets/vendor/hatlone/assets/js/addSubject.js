$(document).ready(function() {
    $('#TutoringForm').submit(function(event) {
        event.preventDefault(); // Prevent form submission

        var currentContainer = $('.subject-container');

        // Serialize form data
        var formData = $(this).serialize();

        // Send AJAX request
        $.ajax({
            url: '/user/save_tutoring_subjects', 
            type: 'POST',
            data: formData,
            success: function() {
                // Show success message
                $('#successModal').modal('show');
                // Clear form fields
                //$('#TutoringForm')[0].reset();
                
            },
            error: function() {
                // Show error message
                var errorMessage = $('<p>').text('An error occurred while submitting the form.');
                currentContainer.append(errorMessage);
            }
        });
    });
});