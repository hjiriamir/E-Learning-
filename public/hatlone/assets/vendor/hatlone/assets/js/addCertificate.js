function addAnotherCertificate() {
    const certificationContainer = document.getElementById('certification-container');
    const certificationCountInput = document.getElementById('certificationCount');
    const certificationCount = parseInt(certificationCountInput.value);

    const newCertificate = document.createElement('div');
    newCertificate.classList.add('row', 'teaching-container');
    newCertificate.innerHTML = `
        <h5>Teaching certification</h5>
        <div class="accordion" id="accordionCourses">
        <!-- Subject section -->
        <div class="row">
            <h2 class="accordion-header" id="headingOne">
            <label class="label2">Subject</label>
            <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse${certificationCount + 1}">
                Choose subject ...
            </button>
            </h2>
            <div class="accordion-item rounded-0">
            <div id="collapse${certificationCount + 1}" class="collapse" aria-labelledby="heading${certificationCount + 1}" data-bs-parent="#accordionCourses">
                <div class="accordion-body">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="subject${certificationCount + 1}[]" id="sub1${certificationCount + 1}" value="1">
                    <label class="form-check-label" for="sub1${certificationCount + 1}">Information retrieval</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="subject${certificationCount + 1}[]" id="sub2${certificationCount + 1}" value="2">
                    <label class="form-check-label" for="sub2${certificationCount + 1}">Programmation OO</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="subject${certificationCount + 1}[]" id="sub3${certificationCount + 1}" value="3">
                    <label class="form-check-label" for="sub3${certificationCount + 1}">Gaming</label>
                </div>
                </div>
            </div>
            </div>
        </div>

        <!-- Certificate section -->
        <div class="row">
            <label for="" class="label2">Certificate</label>
            <input name="certificate${certificationCount + 1}[]" type="text"><br>

            <label for="" class="label2">Description</label>
            <input name="description${certificationCount + 1}[]" type="text"><br>

            <label for="" class="label2">Issued by</label>
            <input name="issued_by${certificationCount + 1}[]" type="text"><br>
        </div>

        <!-- Years of study section -->
        <div class="row">
        <div class="col">
            <h2 class="accordion-header" id="headingOne">
            <label class="label2">Years of study</label>
            <div class="collapsed" data-bs-toggle="collapse">
                <select class="form-select select-accordion collapsed" name="Debutyear${certificationCount}[]" id="Debutyear${certificationCount}">
                <option class="accordion-button collapsed" value="">Debut</option>
                </select>
            </div>
            </h2>
        </div>
        <div class="col">
            <h2 class="accordion-header acc2" id="headingOne">
            <label class="label2"></label>
            <div class="collapsed" data-bs-toggle="collapse" data-bs-target="#collapse6">
                <select class="form-select select-accordion collapsed" name="Finyear${certificationCount}[]" id="Finyear${certificationCount}">
                <option class="accordion-button collapsed" value="">Fin</option>
                </select>
            </div>
            </h2>
        </div>
        </div>
        </div>`;

    certificationContainer.appendChild(newCertificate);

    // Update the certification count input value
    certificationCountInput.value = certificationCount + 1;
     // Populate options for Debutyear
        var currentYear = new Date().getFullYear();
        var debutYearSelect = document.getElementById(`Debutyear${certificationCount}`);
        for (var year = currentYear - 1; year >= 1900; year--) {
            var option = new Option(year, year);
            debutYearSelect.appendChild(option);
        }

        // Populate options for Finyear
        var finYearSelect = document.getElementById(`Finyear${certificationCount}`);
        for (var year = currentYear; year >= 1900; year--) {
            var option = new Option(year, year);
            finYearSelect.appendChild(option);
        }
    }function saveCertificate() {
        let certificationContainers = document.querySelectorAll('#certification, #certification-container');

        if (certificationContainers.length === 0) {
            alert('No certificates to save.');
            return;
        }

        const certificates = [];

        certificationContainers.forEach(function (container) {
            const subject = container.querySelector(`input[name^="subject"]:checked`);
            const certificateInput = container.querySelector(`input[name^="certificate"]`);
            const descriptionInput = container.querySelector(`input[name^="description"]`);
            const issuedByInput = container.querySelector(`input[name^="issued_by"]`);
            const debutYear = container.querySelector(`select[name^="Debutyear"]`);
            const finYear = container.querySelector(`select[name^="Finyear"]`);

            if (subject === null || certificateInput === null || descriptionInput === null ||
            issuedByInput === null || debutYear === null || finYear === null) {
            alert('Please fill in all certificate fields.');
            return;
            }

            const certificate = {
            subject: subject.value || '',
            certificate: certificateInput.value.trim(),
            description: descriptionInput.value.trim(),
            issuedBy: issuedByInput.value.trim(),
            debutYear: debutYear.value.trim(),
            finYear: finYear.value.trim()
            };

            certificates.push(certificate);
        });

        if (certificates.length === 0) {
            alert('Please fill in all certificate fields.');
            return;
        }

        const xhr = new XMLHttpRequest();
        xhr.open('POST', '/user/save_certification_data'); // Update the endpoint URL accordingly
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.onload = function () {
            if (xhr.status === 200) {
            // alert('Certificates saved successfully.');
            // Clear the input fields or perform any other actions as needed
            $('#successModal').modal('show');
            } else {
            alert('Failed to save certificates. Please try again.');
            }
        };
        xhr.send(JSON.stringify(certificates));
    }