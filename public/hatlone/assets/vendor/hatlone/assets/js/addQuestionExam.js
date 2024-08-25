var countExam = 3;

function addQuestionnsExam() {
  countExam = countExam + 1;
  $("#questionsExam").append("<div class='questionsAdded row mb-2'><div class='d-flex test col-lg-3'><span class='titleQuestion'>Question</span>"+countExam+"</div> <div class='QuestionsExam col-lg-8'><textarea class='rounded-1' placeholder='Enter Question...' rows='2'></textarea><input class='form-input' type='checkbox'><input class='rounded-1 wrongAnswer' placeholder='Wrong Answer' /><textarea class='rounded-1 mt-4' placeholder='Justification' rows='2'></textarea><input class='form-input' type='checkbox'><input class='rounded-1 rightAnswer' placeholder='Right Answer' /><textarea class='rounded-1 mt-4' placeholder='Justification' rows='2'></textarea><input class='form-input' type='checkbox'><input class='rounded-1 wrongAnswer' placeholder='Wrong Answer' /><textarea class='rounded-1 mt-4' placeholder='Justification' rows='2'></textarea></div><div class='row sillsAsked'><div class='col-lg-4'></div><div class='col-lg-8'><p class='mt-3'>Skills asked about</p><div class='boxSkill'><label><input type='checkbox' /><span class='seatButton'>Book</span></label><label><input type='checkbox' /><span class='seatButton'>Linux</span></label><label><input type='checkbox' /><span class='seatButton'>Art</span></label><label><input type='checkbox' /><span class='seatButton'>Development</span></label><label><input type='checkbox' /><span class='seatButton'>Software</span></label><label><input type='checkbox' /><span class='seatButton'>PHP</span></label><label><input type='checkbox' /><span class='seatButton'>Design</span></label><label><input type='checkbox' /><span class='seatButton'>Software</span></label><label><input type='checkbox' /><span class='seatButton'>PHP</span></label><label><input type='checkbox' /><span class='seatButton'>Design</span></label><label><input type='checkbox' /><span class='seatButton'>Art</span></label><label><input type='checkbox' /><span class='seatButton'>Development</span></label><label><input type='checkbox' /><span class='seatButton'>Software</span></label><label><input type='checkbox' /><span class='seatButton'>PHP</span></label><span class='fw-bold'>5 skills selected</span></div></div></div> <span class='removeItemElement'><a class='border-0'>"
+"<i class='bi bi-trash'></i></a></span></div>");
}

function deleteELement(e, item) {
  e.preventDefault();
  $(item).parent().fadeOut('200', function() { 
    $(item).parent().remove();
  });
}

$(function() {
 
   $("#add-questions-exam").on('click', function(e){
     e.preventDefault();
     addQuestionnsExam()
   });

  $("#questionsExam").on('click', '.removeItemElement', function(e){
    var item = this; 
    deleteELement(e, item)
  })

});