var count = 3;

function addElement() {
  count = count + 1;
  $("#test66").append("<div class='lectureAdded mb-5'><i class='fa-solid fa-book'></i> <span class='titleLecture'>Lecture</span>"+count+"  <input type='text' placeholder='Add a title...'> <span class='removeItemElement'><a class='btn border-0'>"
   +"<i class='bi bi-trash'></i></a></span><button class='addContent border-0 bg-white'><i class='bi bi-plus-square-fill'></i><span>Add Content</span></button><button class='contentElement btn mt-1'>Confirm</button></div>");
}

function deleteELement(e, item) {
  e.preventDefault();
  $(item).parent().fadeOut('200', function() { 
    $(item).parent().remove();
  });
}

$(function() {
 
   $("#tttt").on('click', function(e){
     e.preventDefault();
     addElement()
   });

  $("#test66").on('click', '.removeItemElement', function(e){
    var item = this; 
    deleteELement(e, item)
  })

});



