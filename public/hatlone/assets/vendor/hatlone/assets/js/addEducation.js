function addAnotherEducation() {
    const educationContainer = document.getElementById('education-container');
    const educationCountInput = document.getElementById('educationCount');
    const educationCount = parseInt(educationCountInput.value);
  
    const newEducation = document.createElement('div');
    newEducation.classList.add('row', 'education-container');
    newEducation.innerHTML = `
      <h5>Education</h5>
  
      <label for="" class="label2">University</label><br>
      <input name="university${educationCount + 1}[]" type="text" placeholder="E.g. Mount Royal University"><br>
  
      <label for="" class="label2">Degree</label><br>
      <input name="degree${educationCount + 1}[]" type="text" placeholder="E.g. Bachelor's degree in English"><br>
  
      <div class="accordion" id="accordionCourses">
          <div class="row">
              <h2 class="accordion-header" id="headingOne${educationCount + 1}">
                  <label class="label2">Degree type</label>
                  <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse${educationCount + 1}" type="button">
                      Choose degree type ...
                  </button>
              </h2>
              <div class="accordion-item rounded-0">
                  <div id="collapse${educationCount + 1}" class="collapse" aria-labelledby="headingOne${educationCount + 1}" data-bs-parent="#accordionCourses">
                      <div class="accordion-body">
                          <input class="form-check-input" type="radio" name="degreeType${educationCount + 1}[]" id="deg1${educationCount + 1}" value="1">
                          <label class="mb-2" for="deg1${educationCount + 1}">Degree 1</label><br>
  
                          <input class="form-check-input" type="radio" name="degreeType${educationCount + 1}[]" id="deg2${educationCount + 1}" value="2">
                          <label class="mb-2" for="deg2${educationCount + 1}">Degree 2</label><br>
  
                          <input class="form-check-input" type="radio" name="degreeType${educationCount + 1}[]" id="deg3${educationCount + 1}" value="3">
                          <label class="mb-2" for="deg3${educationCount + 1}">Degree 3</label><br>
                      </div>
                  </div>
              </div>
          </div>
  
          <div class="row Specialization-wrapper">
              <label for="" class="label2">Specialization</label><br>
              <input name="specialization${educationCount + 1}[]" type="text" placeholder="E.g. Teaching English as a Foreign"><br>
          </div>
  
          <div class="row">
              <div class="col">
                  <h2 class="accordion-header" id="headingOne${educationCount + 1}">
                      <label class="label2">Years of study</label>
                      <div class="collapsed" data-bs-toggle="collapse">
                          <select class="form-select select-accordion collapsed" name="debutYearEdu${educationCount + 1}[]" id="debutYearEdu${educationCount + 1}">
                              <option class="accordion-button collapsed" value="">Debut</option>
                          </select>
                      </div>
                  </h2>
              </div>
  
              <div class="col">
                  <h2 class="accordion-header acc3" id="headingOne${educationCount + 1}">
                      <label class="label2"></label>
                      <div class="collapsed" data-bs-toggle="collapse">
                          <select class="form-select select-accordion collapsed" name="finYearEdu${educationCount + 1}[]" id="finYearEdu${educationCount + 1}">
                              <option class="accordion-button collapsed" value="">Fin</option>
                          </select>
                      </div>
                  </h2>
              </div>
          </div>
  
          <div class="row">
              <div class="diploma-wrapper">
                  <div class="diplomaBox d-flex">
                      <i class="bi bi-file-earmark-text"></i>
                      <p>
                          <span>Get a "Diploma verified" badge</span><br>
                          Upload your diploma to boost your credibility! Our team will review
                          it and add the badge to your profile. Once reviewed,
                          your file will be deleted.
                      </p>
                  </div>
                  <div class="upload-diploma d-flex">
                      <button class="upload-btn-2" type="button" onclick="document.getElementById('file-uploader-diploma${educationCount + 1}').click();">Upload</button>
                      <p>JPG or PNG format; maximum size of 20MB.</p>
                      <input id="file-uploader-diploma${educationCount + 1}" type="file" class="file-uploader pull-left" style="display: none;" name="diploma${educationCount + 1}[]" accept=".jpg,.png">
                  </div>
              </div>
          </div>
      </div>
    `;
  
                          educationContainer.appendChild(newEducation);
  
                          // Increment education count
                          educationCountInput.value = educationCount + 1;
  
                          // Initialize dynamic year select elements
                          
                          var currentYear = new Date().getFullYear();
                          var debutYearSelect = document.getElementById(`debutYearEdu${educationCount + 1}`);
                          for (var year = currentYear - 1; year >= 1900; year--) {
                              var option = new Option(year, year);
                              debutYearSelect.appendChild(option);
                          }
  
                          // Populate options for Finyear
                          var finYearSelect = document.getElementById(`finYearEdu${educationCount + 1}`);
                          for (var year = currentYear; year >= 1900; year--) {
                              var option = new Option(year, year);
                              finYearSelect.appendChild(option);
                          }
  }
  function saveEducation() {
    let educationContainers = document.querySelectorAll('#educations, #education-container');
  
    if (educationContainers.length === 0) {
      alert('No education data to save.');
      return;
    }
  
    const formData = new FormData();
  
    educationContainers.forEach(function (container) {
      const universityInput = container.querySelector('input[name^="university"]');
      const degreeInput = container.querySelector('input[name^="degree"]');
      const specializationInput = container.querySelector('input[name^="specialization"]');
      const degreeTypeInput = container.querySelector('input[name^="degreeType"]:checked');
      const debutYearSelect = container.querySelector('select[name^="debutYearEdu"]');
      const finYearSelect = container.querySelector('select[name^="finYearEdu"]');
      const diplomaInput = container.querySelector('input[name^="diploma"]');
  
      if (universityInput === null || degreeInput === null || specializationInput === null ||
        degreeTypeInput === null || debutYearSelect === null || finYearSelect === null) {
        alert('Please fill in all education fields.');
        return;
      }
  
      const university = universityInput.value.trim();
      const degree = degreeInput.value.trim();
      const specialization = specializationInput.value.trim();
      const degreeType = degreeTypeInput.value;
      const debutYear = debutYearSelect.value.trim();
      const finYear = finYearSelect.value.trim();
      const diploma = diplomaInput.files[0];
  
      if (!university || !degree || !specialization || !degreeType || !debutYear || !finYear) {
        alert('Please fill in all education fields.');
        return;
      }
  
      const education = {
        university: university,
        degree: degree,
        specialization: specialization,
        degreeType: degreeType,
        debutYear: debutYear,
        finYear: finYear,
      };
  
      formData.append('educations[]', JSON.stringify(education));
      formData.append('diploma[]', diploma); // Append diploma file to the form data
    });
  
    if (!formData.get('educations[]') || formData.get('educations[]').length === 0) {
      alert('Please fill in all education fields.');
      return;
    }
  
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '/user/save_education_data');
    xhr.onload = function () {
      if (xhr.status === 200) {
        //alert('Education saved successfully.');
        $('#successModal').modal('show');
      } else {
        alert('Failed to save education data. Please try again.');
      }
    };
    xhr.send(formData);
  }
  