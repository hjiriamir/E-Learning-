var countSection = 5;

function element() {
  countSection = countSection + 1;
  $("#sections").append("<div class='sectionAdded'><div class='assSectionStep' tabindex='1'>"+countSection+"</div><input placeholder='Add a title...'> <span class='removeItemElement'><a class='btn border-0'>"
   +"<i class='bi bi-trash'></i></a></span><div class='row'><div class='col-lg-6'></div><div class='col-lg-4'><span class='confirm2'>Confirm</span></div></div></div>");
}

function deleteELement(e, item) {
  e.preventDefault();
  $(item).parent().fadeOut('200', function() { 
    $(item).parent().remove();
  });
}

$(function() {
 
   $("#add-items").on('click', function(e){
     e.preventDefault();
     element()
   });

  $("#sections").on('click', '.removeItemElement', function(e){
    var item = this; 
    deleteELement(e, item)
  })

});