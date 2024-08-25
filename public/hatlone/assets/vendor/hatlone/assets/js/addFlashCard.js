function newFlashCard() {
    const flashCard = document.getElementById('flash-card');
    const newCard = document.createElement('div');
    newCard.classList.add('new_flashCard');
    newCard.innerHTML = '<div class="row mb-2"><div class="col-lg-6 flashCard mb-3"><div class="card flash_card"><div class="cardContent"><div class="front"><i class="bi bi-upload p-2"></i><div class="text" style="font-weight: 500;">Add text</div></div><div class="back"><i class="bi bi-upload p-2"></i><input class="text text-center border-0" type="text" style="background-color: #aaa;" placeholder="Texte 1"></div></div></div><i class="bi bi-trash"></i></div><div class="col-lg-6 flashCard"><div class="card flash_card"><div class="cardContent"><div class="front"><i class="bi bi-upload p-2"></i><div class="text" style="font-weight: 500;">Add text</div></div><div class="back"><i class="bi bi-upload p-2"></i><input class="text text-center border-0" type="text" style="background-color: #aaa;" placeholder="Texte 2"></div></div></div><i class="bi bi-trash"></i></div></div>';
    flashCard.appendChild(newCard);
}