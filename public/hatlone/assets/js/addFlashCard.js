var count = 3;

function addFlashCard() {
  count = count + 1;
  $("#flashCard").append("<div class='row flashCardAdded mb-3'><div class='col-lg-4'><div class='flashcard-container'><div class='flashcard'><div class='question'><div class='p-2'><i class='bi bi-upload'></i></div><div class='content'>Add text</div></div><div class='answer'><div class='p-2'><i class='bi bi-upload'></i></div><div class='content'>Text 1</div></div></div></div><i class='bi bi-trash delete'></i></div>  <div class='col-lg-4 cardTwo'><div class='flashcard-container'><div class='flashcard'><div class='question'><div class='p-2'><i class='bi bi-upload'></i></div><div class='content'>Add text</div></div><div class='answer'><div class='p-2'><i class='bi bi-upload'></i></div><div class='content'>Text 2</div></div></div></div><i class='bi bi-trash delete'></i></div>"
  +"</div>");
}

function deleteELement(e, item) {
  e.preventDefault();
  $(item).parent().fadeOut('200', function() { 
    $(item).parent().remove();
  });
}

$(function() {
 
   $("#add-card").on('click', function(e){
     e.preventDefault();
     addFlashCard()
   });

  $("#flashCard").on('click', '.removeItemElement', function(e){
    var item = this; 
    deleteELement(e, item)
  })

});
