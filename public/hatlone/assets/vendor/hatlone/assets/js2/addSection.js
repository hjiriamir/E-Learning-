var countSection = 0;
var htmlcode='';
function gen_code() {
  htmlcode='<input class="radioClass" type="radio" name="tabs" id="tab5" />'+
'<div class="section5 d-flex">'+
'<label for="tab5" class="sectionBox d-flex">'+
    '<span class="order">'+countSection+'</span>'+
    '<span class="addTitle" id="titre_sec" contenteditable>Add a title...</span>'+
'</label>'+
'<i class="bi bi-trash delete sectionTrash"></i>'+
'</div>'+
'<button class="btn confirm mt-2 showDescription" id="blueConfirm">Confirm</button>'+
'<script>document.getElementById("blueConfirm").onclick = function(){ document.getElementById("changeConfirm").style.color = "#02377D";}'+
'</script><script>$(".showDescription").click(function() {$("#target-1").show();});</script>'+
'<div class="boxSection">'+
'<div class="topBox card oo border-0 pb-5">'+
    '<textarea id="target-1" class="rounded-1 p-3" placeholder="Description..." rows="5"></textarea>'+
    '<button class="btn border-0 d-flex clickExcel">'+
        '<div id="changeConfirm" class="mt-3">'+
            '<i class="bi bi-plus-circle-fill" ></i>'+
            'Add Lecture'+
        '</div>'+
    '</button>'+
    '<div class="dat item mt-3">'+
        '<div>'+
            '<i class="fa-solid fa-book"></i>'+
            '<span class="lecture">Lecture 1</span>'+
            '<input type="text" placeholder="Add a title...">'+
            '<a class="btn border-0">'+
                '<i class="bi bi-trash delete"></i>'+
            '</a>'+
        '</div>'+
        '<div class="row mt-2">'+
            '<div class=" col-lg-5"></div>'+
            '<div class=" col-lg-2">'+
                '<button class="btn conf" id="icon">Confirm</button>'+
            '</div>'+
            '<div id="hiddenDiv">'+
                '<textarea class="rounded-1 p-3 mt-3" placeholder="Description..." cols="85" rows="5"></textarea>'+
                '<div class="d-flex">'+
                    '<div class="boxSkill mt-4">'+
                        '<label>'+
                          '<input type="checkbox" />'+
                          '<span class="seatButton">Book</span>'+
                        '</label>'+
                        '<label>'+
                          '<input type="checkbox" />'+
                          '<span class="seatButton">Linux</span>'+
                        '</label>'+
                        '<label>'+
                          '<input type="checkbox" />'+
                          '<span class="seatButton">Development</span>'+
                        '</label>'+
                        '<label>'+
                          '<input type="checkbox" />'+
                          '<span class="seatButton">Software</span>'+
                        '</label>'+
                        '<label>'+
                          '<input type="checkbox" />'+
                          '<span class="seatButton">PHP</span>'+
                        '</label>'+
                        '<span class="fw-bold">5 skills selected</span>'+
                      '</div>'+
                '</div>'+
                '<button class="border-0 add_content bg-white mt-3" id="confirmChange">'+
                    '<i class="bi bi-plus-square-fill"></i>'+
                    'Add Content'+
                '</button>'+
            '</div>'+
        '</div>'+
        '<script>$(".dat").hide() jQuery(".clickExcel").on("click",function(){jQuery(".dat").toggle();})</script>'+
      '</div>'+
      '<script>$(function() { $("#hiddenDiv").hide();$("#icon").click(function() {$("#hiddenDiv").show();})})</script>'+
    '</div>'+
  '</div>';
}


function element() {
  countSection = countSection + 1;
  //gen_code();
  //$("#sections").append(htmlcode);
  $("#sections").append("<div class='sectionAdded'><div class='assSectionStep' tabindex='1'>"+countSection+"</div><input id='titre"+countSection+"' placeholder='Add a title...'> <span class='removeItemElement'><a class='btn border-0'>"
   +"<i class='bi bi-trash'></i></a></span><div class='row'><div class='col-lg-6'></div><div class='col-lg-4' id='idconfirmbtn' ><button class='btn border-0 bg-white' ><span class='confirm2'>Confirm</span></button></div></div></div>");
   //document.getElementById("changeConfirm").style.color = '#02377D';
  // $('.showDescription').click(function() {
    //$('#target-1').show();
//});
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
  });
 
});

$(document).ready(function(){
  $("#blueConfirm").click(function(){
    //var titre = document.getElementById('titre_sec');
    var titre =$('#titre_sec').text();
    var descript = document.getElementById('target-1');
    //console.log(titre);
    //console.log(descript.value);
    //var titre=document.getElementsByName("title")[0].value;
                //console.log(titre);
                $.ajax({  
                    url:        '/cours/Add_sec',  
                    type:       'POST',   
                    dataType:   'json',
                    data: {'titre': titre },                    
                    success: function(data, status) {                         
                       console.log(data);   
                      // document.getElementById("blueConfirm").onclick = function(){
                        document.getElementById("changeConfirm").style.color = '#02377D';
                      //}
                      //$('.showDescription').click(function() {
                        $('#target-1').show();
                      //  });
                        document.getElementById("blueConfirm").disabled = true;
                        console.log(document.getElementById("blueConfirm"));
                    },  
                    error : function(xhr, textStatus, errorThrown) {
                       console.log(xhr)
                    }  
                 });
  })
  $("#icon").click(function(){
    //var titre = document.getElementById('titre_sec');
    var titre =document.getElementById('titre_lecture').value;
    var descript = document.getElementById('target-1').value;
    console.log(titre);
    console.log(descript);
    console.log('descript.value');
    $.ajax({  
        url:        '/cours/Add_sec',  
        type:       'POST',   
        dataType:   'json',
        data: {'titre_lecture': titre, 'description': descript},                    
        success: function(data, status) {                         
            console.log(data);
        },  
        error : function(xhr, textStatus, errorThrown) {
            console.log(xhr)
        }  
      });
  })
});