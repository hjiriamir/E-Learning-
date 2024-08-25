function addMch() {
    const mchContent = document.querySelector(".modal .qMch");

    const countMch = mchContent.children.length;

    const questionMch = document.createElement("div");

    questionMch.innerHTML = `
            <div class="row mt-5">
                <div class="col-lg-4 mb-3">
                    <span class="title">Question ${countMch + 1}</span>
                    <i class="bi bi-trash"></i>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-10">
                            <textarea class="rounded-1" placeholder="Enter Question..." rows="2"></textarea>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-2 my-2">
                            <input class="form-input" type="checkbox">
                        </div>
                        <div class="col-10">
                            <input class="rounded-1 wrongAnswer" placeholder="Wrong Answer" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-10">
                            <textarea class="rounded-1 mt-4" placeholder="Justification" rows="2"></textarea>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-2 my-2">
                            <input class="form-input" type="checkbox">
                        </div>
                        <div class="col-10">
                            <input class="rounded-1 rightAnswer" placeholder="Right Answer" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-10">
                            <textarea class="rounded-1 mt-4" placeholder="Justification" rows="2"></textarea>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-2 my-2">
                            <input class="form-input" type="checkbox">
                        </div>
                        <div class="col-10">
                            <input class="rounded-1 wrongAnswer" placeholder="Wrong Answer" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-10">
                            <textarea class="rounded-1 mt-4" placeholder="Justification" rows="2"></textarea>
                        </div>
                    </div>
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

    mchContent.appendChild(questionMch);
}