function addQa() {
    const qaContent = document.querySelector(".modal .qa");

    const countQa = qaContent.children.length;

    const questionQa = document.createElement("div");

    questionQa.innerHTML = `
        <div class="row mt-5">
            <div class="col-lg-4 mb-3 questions">
                <span class="title">Question ${countQa + 1}</span>
                <i class="bi bi-trash"></i>
            </div>
            <div class="col-lg-8">
                <textarea class="rounded-1" placeholder="Enter Question..." rows="2"></textarea>
                <textarea class="rounded-1 mt-3" placeholder="Enter Right Answer..." rows="2"></textarea>
                <textarea class="rounded-1 mt-3" placeholder="Enter Justification..." rows="2"></textarea>
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
                <a href="" class="float-end rounded-0 save">Save</a>
            </div>
        </div>
    `;

    qaContent.appendChild(questionQa);
}