var count = 3;

function addElement() {
  count = count + 1;
  $("#elements").append("<div class='lectureAdded mb-5'><i class='fa-solid fa-book'></i> <span class='titleLecture'>Lecture</span>"+count+"  <input type='text' placeholder='Add a title...'> <span class='removeItemElement'><a class='btn border-0'>"
   +"<i class='bi bi-trash'></i></a></span><div class='row'><div class='col-lg-6'></div><div class='col-lg-2'><button class='btn confirmation mt-1'>Confirm</button></div></div><div class=''><button class='border-0 addContent bg-white'><i class='bi bi-plus-square-fill'></i><span>Add Content</span></button></div></div>");
}

function deleteELement(e, item) {
  e.preventDefault();
  $(item).parent().fadeOut('200', function() { 
    $(item).parent().remove();
  });
}

$(function() {
 
   $("#add-todo-item").on('click', function(e){
     e.preventDefault();
     addElement()
   });

  $("#elements").on('click', '.removeItemElement', function(e){
    var item = this; 
    deleteELement(e, item)
  })

});
