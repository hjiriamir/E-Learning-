function addTF() {
    const TFContent = document.querySelector(".modal .qTF");

    const countTF = TFContent.children.length;

    const questionTF = document.createElement("div");

    questionTF.innerHTML = `
        <div class="row mt-5">
          <div class="col-lg-4 mb-3">
            <span class="title">Question ${countTF + 1}</span>
            <i class="bi bi-trash"></i>
          </div>
          <div class="col-lg-8">
            <textarea class="rounded-1" placeholder="Enter Question..." rows="2"></textarea>
            <div class="d-flex mt-3">
              <button class="border-0 rounded-1 true">True</button>
              <button class="border-0 rounded-1 false">False</button>
            </div>
            <textarea class="rounded-1 mt-4" placeholder="Justification" rows="2"></textarea>
            <p class="fw-bold" style="font-size: 15px;">Skills asked about</p>
            <div class="boxSkill">
              <label>
                <input type="checkbox" />
                <span class="seat_button">Book</span>
              </label>
              <label>
                <input type="checkbox" />
                <span class="seat_button">Linux</span>
              </label>
              <label>
                <input type="checkbox" />
                <span class="seat_button">Art</span>
              </label>
              <label>
                <input type="checkbox" />
                <span class="seat_button">Development</span>
              </label>
              <label>
                <input type="checkbox" />
                <span class="seat_button">Software</span>
              </label>
              <label>
                <input type="checkbox" />
                <span class="seat_button">PHP</span>
              </label>
              <label>
                <input type="checkbox" />
                <span class="seat_button">Design</span>
              </label>
              <label>
                <input type="checkbox" />
                <span class="seat_button">Software</span>
              </label>
              <label>
                <input type="checkbox" />
                <span class="seat_button">PHP</span>
              </label>
              <label>
                <input type="checkbox" />
                <span class="seat_button">Design</span>
              </label>
              <label>
                <input type="checkbox" />
                <span class="seat_button">Art</span>
              </label>
              <label>
                <input type="checkbox" />
                <span class="seat_button">Development</span>
              </label>
              <label>
                <input type="checkbox" />
                <span class="seat_button">Software</span>
              </label>
              <label>
                <input type="checkbox" />
                <span class="seat_button">PHP</span>
              </label>
              <span class="fw-bold">5 skills selected</span>
            </div>
          </div>
        </div>
    `;

    TFContent.appendChild(questionTF);
}