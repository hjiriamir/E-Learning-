 
function addLanguage() {
    const languagesContainer = document.getElementById("languagesContainer");
    const clonedLanguages = languagesContainer.firstElementChild.cloneNode(true);
    languagesContainer.appendChild(clonedLanguages);
    const clonedLanguageSelect = clonedLanguages.querySelector("[name='selected_language[]']");
    const clonedLevelSelect = clonedLanguages.querySelector("[name='selected_level[]']");
    clonedLanguageSelect.addEventListener("change", function() {
        const selectedLanguage = clonedLanguageSelect.value;
        const levels = levelsByLanguage.find(item => item.idLangage === selectedLanguage)?.levels || [];
        // Clear previous options
        clonedLevelSelect.innerHTML = "";
        // Add new options
        for (const level of levels) {
            const option = document.createElement("option");
            option.value = level.idNiveau;
            option.text = level.label;
            clonedLevelSelect.appendChild(option);
        }
    });
}

function addanotherLanguage() {
const container = document.getElementById('languageContainer');

// Create row div
const rowDiv = document.createElement('div');
rowDiv.classList.add('row');
container.appendChild(rowDiv);

// Create first column div
const col1Div = document.createElement('div');
col1Div.classList.add('col');
rowDiv.appendChild(col1Div);

// Create language label
const languageLabel = document.createElement('label');
languageLabel.textContent = 'Languages spoken';
languageLabel.classList.add('label2');
col1Div.appendChild(languageLabel);

// Create language input
const languageInput = document.createElement('input');
languageInput.classList.add('form-control');
languageInput.setAttribute('name', 'newlanguage[]');
languageInput.setAttribute('type', 'text');
languageInput.setAttribute('placeholder', 'Language');
col1Div.appendChild(languageInput);

// Create second column div
const col2Div = document.createElement('div');
col2Div.classList.add('col');
rowDiv.appendChild(col2Div);

// Create level label
const levelLabel = document.createElement('label');
levelLabel.textContent = 'Level';
levelLabel.classList.add('label2');
col2Div.appendChild(levelLabel);

// Create level input
const levelInput = document.createElement('input');
levelInput.classList.add('form-control');
levelInput.setAttribute('name', 'newlevel[]');
levelInput.setAttribute('type', 'text');
levelInput.setAttribute('placeholder', 'Level');
col2Div.appendChild(levelInput);
}
$(document).ready(function() {
    $('#myForm').on('submit', function(event) {
            event.preventDefault(); // Prevent form submission

            var currentContainer = $('.propos');

            // Serialize form data
            var formData = $(this).serialize();

            // Send AJAX request
            $.ajax({
                url: '/user/save_proposuser', 
                type: 'POST',
                data: formData,
                success: function() {
                           $('#successModal').modal('show');
                    // Clear form fields
                     $('#myForm')[0].reset();
                },
                error: function() {
                    // Show error message
                   var errorAlert = $('<div>').addClass('alert alert-danger').attr('role', 'alert').text('An error occurred while submitting the form.');
                       currentContainer.append(errorAlert);
                }
            });
        });
    });