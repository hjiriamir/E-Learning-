document.getElementById('videoForm').addEventListener('submit', function(event) {
    event.preventDefault();

    // Get the form data
    var formData = new FormData(this);


    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/user/save_video', true); 
    xhr.onload = function() {
        if (xhr.status === 200) {
            // Handle the successful form submission
            var response = JSON.parse(xhr.responseText);
            if (response.status === 'Success') {
                // Form submission was successful
                $('#successModal').modal('show');
            } else {
                // Form submission encountered an error
                console.error('Error submitting form:', response.error);
                alert('Error submitting form!');
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