document.addEventListener('DOMContentLoaded', function() {
    // Photo input change event handler
    document.getElementById('file-uploader').addEventListener('change', function(event) {
        var photoPath = URL.createObjectURL(event.target.files[0]);
        console.log('Photo Path:', photoPath);
        document.getElementById('show_photo').src = photoPath;
        document.getElementById('show_photo_profile').src = photoPath;
    });
});
document.getElementById('photoForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the default form submission

    // Get the form data
    var formData = new FormData(this);
    // Make an AJAX request to submit the form data
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/user/save_photo', true); 
    xhr.onload = function() {
        if (xhr.status === 200) {
            // Handle the successful form submission
            var response = JSON.parse(xhr.responseText);
            if (response.status === 'Success') {
                // Form submission was successful
            
                // alert('Form submitted successfully!');
                $('#successModal').modal('show');
            } else {
                // Form submission encountered an error
                var errorMessage = $('<p>').text('An error occurred while submitting the form.');
                currentContainer.append(errorMessage);
                console.error('Error submitting form:', response.error);
            }
        } else {
            // Handle the AJAX request error
            console.error('AJAX request failed:', xhr.status);
        }
    };
    xhr.onerror = function() {
        // Handle the AJAX request error
        console.error('AJAX request failed');
    };
    xhr.send(formData);
});
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